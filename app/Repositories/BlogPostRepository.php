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

}
