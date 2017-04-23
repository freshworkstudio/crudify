<?php

namespace Crudify;
/**
 * Created by PhpStorm.
 * User: eaguad
 * Date: 21-04-17
 * Time: 21:20
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

abstract class Crud
{
    const DEFAULT_ROUTES = [
        'store'
    ];
    protected $model;
    protected $name;
    protected $routes;
    protected $customFunctions = [];

    /**
     * Crud constructor.
     */
    public function __construct() {
        Route::resource($this->name, get_called_class(), ['only' => self::DEFAULT_ROUTES]);
//        dd(Route::get())
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function beforeStore(Request $request) {
        return $request->all();
    }

    protected function afterStore($obj) {
        return $obj;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request) {
        $params = $this->beforeStore($request);

        $obj = new $this->model();
        $obj->fill($params);
        $obj->save();

        return $this->afterStore($obj);
    }

}