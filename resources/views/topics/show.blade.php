@extends('layouts.app')
@section('title', $topic->title)
@section('description', $topic->excerpt)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-md-3">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="text-center">作者：{{ $topic->user->name }}</div>
                    <div class="meida">
                        <div class="align-center">
                            <a href="{{ route('users.show',$topic->user->id) }}" title="">
                                <img class="thumbnail img-responsive" src="{{ $topic->user->avatar }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-14 col-sm-6 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $topic->title }}</h1>
                </div>
                <div class="panel-body">
                    <label>帖子内容</label>
                    <div style="width: 80%">
                        <p style="width: 80%">
                            {!! $topic->
                            body!!}
                        </p>
                    </div>
                    <label>所属栏目</label>
                    <p>{{ $topic->category->name }}</p>
                    <div class="article-meta text-center">
                        {{ $topic->created_at->diffForHumans() }}
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"> </span>
                        {{ $topic->reply_count }}
                    </div>
                </div>
            </div>

            <div class="operate">
                <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-default btn-sm" role="button">
                    <i class="glyphicon glyphicon-edit"> </i>
                    编辑
                </a>
                <a href="#" class="btn btn-default btn-sm" role="button">
                    <i class="glyphicon glyphicon-trash"> </i>
                    删除
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
