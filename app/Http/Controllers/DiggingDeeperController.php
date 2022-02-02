<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    public function collections()
    {
        $result=[];

        $eloquentCollection = BlogPost::withTrashed()->get();
        $collection = collect($eloquentCollection->toArray());

        //Первый элемент коллекции
        $result['first'] = $collection->first();
        //Последний элемент коллекции
        $result['last'] = $collection->last();
/*
        $result['where']['data'] = $collection->where('category_id', 10)
            ->values()
            ->keyBy('id');
        dd($result);
*/
        dd($collection);
    }
}
