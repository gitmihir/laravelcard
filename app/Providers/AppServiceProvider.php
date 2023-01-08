<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\Smtp;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $smtp = Smtp::first();
        if ($smtp) {
            $data = [
                'driver' => $smtp->sg_smtp_driver,
                'host' => $smtp->sg_smtp_host,
                'port' => $smtp->sg_smtp_port,
                'encryption' => $smtp->sg_smtp_encryption,
                'username' => $smtp->sg_smtp_username,
                'password' => $smtp->sg_smtp_password,
                'from' => [
                    'address' => $smtp->sg_smtp_from_address,
                    'name' => $smtp->sg_smtp_from_name,
                ]
            ];
            Config::set('mail', $data);
        }
    }
}