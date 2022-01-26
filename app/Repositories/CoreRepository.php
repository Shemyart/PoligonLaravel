<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        //Можно и так
        //$this->model = new $this->getModelClass();
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */

    abstract protected function getModelClass();

    /**
     * @return Model|Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
