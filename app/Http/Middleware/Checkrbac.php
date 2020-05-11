<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin\Role;

class Checkrbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		//中间件类似于基础控制器，所以所有的写法就像写基础控制器一样，具体操作php artisan make:middleware Checkrbac,地址在\app\Http\Middleware，接着去kernal.php 去注册,同时去路由添加自己新添加的中间件
		//phpinfo();测试自己添加的中间件是否生效
		
		//找到当前角色所拥有的权限
		
		$role_id=Auth::user()->role_id;
		if($role_id != 1){
			//如果不是超级管理员
			$ac=Role::where('id','=',$role_id)->value('auth_ac');
			//首页的ac也可以被任何角色访问
			$ac.='IndexController@index,IndexController@welcome';
			$ac=strtolower($ac);
			$route=Route::currentRouteAction();
			//分割$route
			$route_arr=explode('\\',$route);
			$current_ac=strtolower(end($route_arr));
			if(strpos(','.$ac.',',','.$current_ac.',') ===false){
				exit('<h1>您没有权限访问</h1>');
			}
		}
        return $next($request);
    }
}
