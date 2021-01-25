<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    if ($this->app->isLocal()) {
      $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
      $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
    }
    $this->app->register(TelescopeServiceProvider::class);
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Validator::extend(
      'exists_or_null',
      function ($attribute, $value, $parameters)
      {
        if($value == 0 || is_null($value)) {
          return true;
        } else {
          $validator = Validator::make([$attribute => $value], [
            $attribute => 'exists:' . implode(",", $parameters)
          ]);
          return !$validator->fails();
        }
      }
    );
  }
}
