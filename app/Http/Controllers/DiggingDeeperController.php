<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateCatalog\GenerateCatalogMainJob;
use App\Jobs\ProcessVideoJob;
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

    public function processVideo()
    {
        ProcessVideoJob::dispatch()
            //Отсрочка выполнения задания от момента помещения в очередь.
            //Не влияет на паузу между попытками выполнить задачу.
            //->delay(10)
            //->noQueue('name_of_queue')
        ;
    }

    public function prepareCatalog()
    {
        GenerateCatalogMainJob::dispatch();
    }
}
