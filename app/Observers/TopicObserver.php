<?php

namespace App\Observers;

use App\Models\Topic;
use App\Jobs\TranslateSlug;
use Illuminate\Support\Facades\DB;


// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        //防止xss攻击
        $topic->body = clean($topic->body);
        //生成摘要
        $topic->excerpt = make_excerpt($topic->body);

    }
    public function saved(Topic $topic){
         //根据帖子标题生成slug seo友好的方式
        dispatch(new TranslateSlug($topic));
    }

    public function updating(Topic $topic)
    {
        //
    }
    public function deleted(Topic $topic){
        Db::table('replies')->where('topic_id',$topic->id)->delete();
    }





}