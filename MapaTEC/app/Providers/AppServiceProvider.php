<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Create extra validation functions here
        Validator::extend('is_itesm_mail', function($attribute, $value, $parameters, $validator){
            //Split string
            $email = explode("@",$value);
            $mailname = $email[0];
            $mailend = $email[1];

            if(strcmp($mailend, 'itesm.mx') == 0){
              //The mail is valid
              return true;
            }
            else{
              //The mail is not valid
              return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
