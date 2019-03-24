<?php

namespace Xolens\PgLaraenquiry\App\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Route;

class PgLaraenquiryRouter
{  
    public static function get(){
        return function(){
            Route::get('{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetController@paginate');
            Route::get('{subroute}/single/{id}','\Xolens\PgLaraenquiry\App\Api\Controller\GetController@get');

            Route::post('{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\PostController@create');
            Route::post('{subroute}/single','\Xolens\PgLaraenquiry\App\Api\Controller\PostController@update');
            Route::post('{subroute}/delete','\Xolens\PgLaraenquiry\App\Api\Controller\PostController@delete');

            Route::get('group/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@groupBy');
            Route::get('form/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@formBy');
            Route::get('field/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@fieldBy');
            Route::get('participant/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@participantBy');
            Route::get('tablefield/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@tablefieldBy');
            Route::get('section/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@sectionBy');
            Route::get('enquiry/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@enquiryBy');
            Route::get('sectionfield/{id}/{subroute}/index','\Xolens\PgLaraenquiry\App\Api\Controller\GetByController@sectionfieldBy');

            Route::post('{baseroure}/{id}/{subroute}/index', '\Xolens\PgLaraenquiry\App\Api\Controller\PostByController@createBy');
            Route::post('{baseroure}/{id}/{subroute}/single', '\Xolens\PgLaraenquiry\App\Api\Controller\PostByController@updateBy');
        };
    }
}
