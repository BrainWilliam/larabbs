<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;

class UsersController extends Controller
{
    public function store(UserRequest $request){
        $verification_key = $request->verification_key;
        $cache_key = \Cache::get($verification_key);
        if(!$cache_key){
            return $this->response->error('验证码已经失效',422);
        }
        if(!hash_equals($cache_key['code'],$request->verification_code)){
            return $this->response->errorUnauthorized('验证码错误');
        }
        $user = User::create([
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'phone'=>$cache_key['phone']
        ]);
        \Cache::forget($verification_key);
        return $this->response->created();

    }
}
