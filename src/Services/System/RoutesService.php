<?php

namespace Oukuyun\Admin\Services\System;

use Oukuyun\Admin\Models\System\Routes;
use Illuminate\Support\Arr;
use Oukuyun\Admin\Http\Responses\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Route;
use Auth;

/**
 * Class RoutesService.
 */
class RoutesService
{
    /** 
     * \App\Repositories\System\RoutesRepository
     * @access protected
     * @var RoutesRepository
     * @version 1.0
     * @author Henry
    **/
    protected $RoutesRepository;
    public $routes;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Routes $Routes)
    {
        $this->RoutesRepository = $Routes;
    }
    
    public function getMenu() {
        $this->routes = $this->RoutesRepository->getRoutes();
        return $this;
    }

    public function getRouteLayer() {
        $default = ["Admin.dashboard"];
        $currentRouteName   =   Route::currentRouteName();
        $regex = '/create|edit/i';
        if(preg_match($regex,$currentRouteName)) {
            array_push($default,preg_replace($regex,'index',$currentRouteName));
        }
        array_push($default,$currentRouteName);
        return $default;
    }

    /**
     * 產生左側選單
     * @return array
     */
    public function makeMenu() {
        $this->user = Auth::user();
        $this->perimissions = $this->PermissionsRepository->getPermissions($this->user->uuid)->pluck('method')->toArray();
        return $this->routes->map(function($item) {
            if($item->parent_id == 0) {
                return [
                    'item'  => $item->toArray(),
                    'children' => $this->routes->filter(function($child) use ($item){
                        if($child->parent_id == $item->id && (in_array($child->link,$this->perimissions)||$this->user->isSuperAdmin() ) ) {
                            return [
                                'item' => $child->toArray(),
                            ];
                        }
                    })->toArray()
                ];
            }
        })->filter(function($item) {return $item!=null;});
    }

}