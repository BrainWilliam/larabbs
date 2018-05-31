<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //防止xss攻击
        $topic->body = clean($topic->body);
        //生成摘要
        $topic->excerpt = make_excerpt($topic->body);
        //根据帖子标题生成slug seo友好的方式
        $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
    }

    public function updating(Topic $topic)
    {
        //
    }
}