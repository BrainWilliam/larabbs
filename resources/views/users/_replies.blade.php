@if(count($replies))
<ul class="list-group">
    @foreach($replies as $reply)
    <li class="list-group-item">
        <a href="{{route('topics.show',['id'=>$reply->topic_id])}}" title="">
            {{$reply->topic->title}}
        </a>
        <div class="reply-content" style="margin: 6px 0;">
                {!! $reply->content !!}
            </div>

            <div class="meta">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 回复于
                {{ $reply->created_at->diffForHumans() }}
            </div>
    </li>
    @endforeach
</ul>
{{ $replies->appends(Request::only('tag'))->render() }}
@else
 <div class="empty-block">暂无数据 ~_~ </div>
@endif