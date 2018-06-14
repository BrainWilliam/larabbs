<?php

namespace App\Http\Controllers\Api;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CaptchaRequest;

class CaptchasController extends Controller
{
    public function store(CaptchaRequest $request,CaptchaBuilder $captchaBuilder){
        $phone = $request->phone;
        $key = 'captcha_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        $captcha = $captchaBuilder->build();
        \Cache::put($key,['phone'=>$phone,'code'=>$captcha->getPhrase()],$expiredAt);
        $result = [
            'captcha_key'=>$key,
            'expired_at'=>$expiredAt->toDatetimeString(),
            'captcha_image_content'=>$captcha->inline(),
        ];
        return $this->response->array($result)->setStatusCode(201);
    }
}
