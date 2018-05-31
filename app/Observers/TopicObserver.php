<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        $topic->body = clean($topic->body);
        $topic->excerpt = make_excerpt($topic->body,'user_topic_body');
    }

    public function updating(Topic $topic)
    {
        //
    }
}