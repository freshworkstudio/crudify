<?php
/**
 * Created by PhpStorm.
 * User: eaguad
 * Date: 21-04-17
 * Time: 21:20
 */

namespace Crudify;

use Illuminate\Support\Facades\Route;

class Crud
{
    // class
    protected $model;
    protected $name;
    protected $routes;
    protected $customFunctions = [];


    public function __construct() {

        // public routes

        foreach($this->routes as $route) {
            Route::resource($this->name, get_called_class());
        }

        foreach($this->customFunctions as $route) {
            Route::resource($this->name, get_called_class());
        }
    }

    protected function beforeCreate() {
        //
    }

    protected function afterCreate() {

    }

    protected function create() {
        $this->beforeCreate();

        $obj = new $this->model();

        $attrs = $obj->getAttributes();

        foreach($attrs as $attr) {
            $obj[$attr] = $params[$attr];
        }

        $obj->save();

        $this->afterCreate();
    }

}