<?php

namespace App\Providers;

use Overtrue\EasySms\EasySms;
use Illuminate\Support\ServiceProvider;

class EasySmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     * 【刘天晨】您的验证码是1234。如非本人操作，请忽略本短信
     * try {
    $sms->send(15002699246, [
        'content'  => '【刘天晨】您的验证码是1234。如非本人操作，请忽略本短信',
    ]);
} catch (\GuzzleHttp\Exception\ClientException $exception) {
    $response = $exception->getResponse();
    $result = json_decode($response->getBody()->getContents(), true);
    dd($result);
}
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EasySms::class, function ($app) {
            return new EasySms(config('easysms'));
        });
        $this->app->alias(EasySms::class, 'easysms');
    }
}
