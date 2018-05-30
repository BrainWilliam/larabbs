<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                   'title'=>'required|min:2',
                   'body'=>'required|min:3',
                   'category_id'=>'required|numeric'
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
           'title.required'=>'标题不能为空',
           'body.required'=>'帖子不能为空',
           'category_id.required'=>'标题不能为空',
           'category_id.numeric'=>'标题必须为数字'
        ];
    }
}
