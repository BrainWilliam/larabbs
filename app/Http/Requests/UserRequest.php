<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
          'email' => 'required|email|unique:users,email,'.Auth::id(),
          'introduction' => 'max:80',
          'avatar'=>'mimes:jpg,png,bmp,gif,jpeg|dimensions:min_width=200,min_height=200'
        ];
    }

    public function messages(){
        return [
            'name.unique'=>'用户名已经被占用，请重新填写',
            'name.regex'=>'用户名不符合规范',
            'name.between'=>'用户名介于3-25之间',
            'name.required'=>'用户名必填',
            'avatar.mimes'=>'请上传正确的图片！',
            'avatar.dimensions'=>'叔叔，你像素咋这么渣！'
        ];
    }
}
