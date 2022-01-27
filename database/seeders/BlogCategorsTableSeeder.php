<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Заводим массив категорий*/
        $categories = [];
        /*Создаем элемент без категории*/
        $cName = 'без категории';
        $categories[]=[
            'title'     => $cName,
            'slug'      => str_slug($cName),
            'parent_id' => 0,
        ];
        /*Через цикл заполняем */
        for($i=2; $i<=11; $i++){
            $cName = 'Категория #'.$i;
            $parentId = ($i>4)? rand(1,4):1;

            $categories[]=[
                'title'        => $cName,
                'slug'         => str_slug($cName),
                'parent_id'    => $parentId,
            ];
        }

        \DB::table('blog_categors')->insert($categories);

    }
}
