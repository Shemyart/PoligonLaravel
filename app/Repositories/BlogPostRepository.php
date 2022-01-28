<?php

namespace App\Repositories;
use App\Models\BlogPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @return LenghtAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
          'id',
          'title',
          'slug',
          'is_published',
          'published_at',
          'user_id',
          'category_id',
        ];
        $result = $this->startConditions()
                        ->select($columns )
                        ->orderBy('id', 'DESC')
                        ->with(['category', 'user'])
                        ->with(['user:id,name'])
            //Можно и так
                //->with(['category'=>function($query){$query->select(['id', 'title'])}]);},])
                        ->paginate(25);
        return $result;
    }
    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) as id_title',
        ]);
        // $results[] = $this->startConditions()->all();
        /* $results[] = $this
             ->startConditions()
             ->select('blog_categories.*', \DB::raw('CONCAT(id, ". ", title) AS id_title'))
             ->toBase()
             ->get();*/
        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;


    }




}
