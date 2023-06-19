<?php

namespace Modules\Base\Traits;


use Illuminate\Support\Facades\Route;

trait CustomRoute
{
    public function resourceRoutes()
    {
//        Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
        Route::macro('resourceRoutes', function ($resource, $controller, $function = null) {
            Route::resource($resource, $controller);
            Route::get("trash/$resource", "$controller@trash")->name("$resource.trash");
            Route::match(["POST", "patch"], "$resource/restore", "$controller@restore")->name("$resource.restore");
            Route::match(["post", "patch"], "$resource/force-delete", "$controller@forceDelete")->name("$resource.forceDelete");
            Route::match(["get", "patch"], "export/$resource", "$controller@genrate_export")->name("$resource.genrate-export");
            Route::match(["post", "patch"], "file-import/$resource", "$controller@genrateImport")->name($resource . '-file-import');
            Route::match(["get", "patch"], "example-import/$resource", "$controller@ImportExample")->name($resource . '-example-import');
            Route::match(["post", "patch"], 'delete-group', "$controller@deleteGroup")->name('delete-group');
//            Route::match(["get", "patch"], "search/$resource", "$controller@search")->name("$resource.search");
            Route::match(["post", "patch"], "delete-group/$resource", "$controller@deleteGroup")->name("$resource.delete-group");
            Route::match(["post", "patch"], "search/$resource", "$controller@search")->name("$resource.search");

            if (is_callable($function))
                Route::group(['prefix' => $resource], function () use ($function, $controller, $resource) {
                    call_user_func($function, $controller, $resource);
                });
            return $this;
        });
    }

    public function reportsRoutes()
    {
        Route::macro('reportsRoutes', function ($controller = "ReportController") {
            Route::get("reports", "$controller@index")->name('reports.index');
            Route::get("reports", "$controller@create")->name('reports.create');
            Route::post("reports", "$controller@store")->name('reports.store');
            return $this;
        });
    }

    public function settingsRoutes()
    {
        Route::macro('settingsRoutes', function ($controller = "SettingController") {
            Route::get('settings', "$controller@create")->name('settings.create');
            Route::post('settings', "$controller@store")->name('settings.store');
            return $this;
        });
    }


    public function authRoutes()
    {
        Route::macro('authRoutes', function ($guard = 'web') {
            Route::get('login', "AuthController@showLoginForm")->name('login-form');
            Route::post('login', "AuthController@login")->name('login');
            Route::post('/logout', "AuthController@logout")->name('logout');
            return $this;
        });
    }

    public function calendarRoutes()
    {
        Route::macro('calendarRoutes', function ($controller = 'MainController') {
            Route::get('calendar/events', "$controller@events")->name('calendar.index');
            Route::post('calendar/add-event', "$controller@addEvent")->name('calendar.event');
            Route::post('calendar/delete-event/{id}', "$controller@deleteEvent");
            return $this;
        });
    }
}
