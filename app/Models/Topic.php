<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeWithOrder($query,$order){
        switch ($order) {
            case 'rencent':
                $query->rencent();
                break;

            default:
                $query->rencentReplied();
                break;
        }
        return $query->with('user','category');
    }
    public function scopeRencent($query){
        return $query->orderBy('created_at','desc');
    }
    public function scopeRencentReplied($query){
        return $query->orderBy('updated_at','desc');
    }
}
