@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
@stop
@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> 帖子 /
                    @if($topic->id)
                        修改 #{{$topic->id}}
                    @else
                        创建
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="title-field">标题</label>
                	<input class="form-control" type="text" name="title" id="title-field"
                    value="{{ old('title', $topic->title ) }}" />
                </div>
                <div class="form-group">
                	<label for="body-field">帖子</label>
                	<textarea id="editor" name="body" id="body-field" class="form-control" rows="3">
                        {{ old('body', $topic->body ) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="category_id-field">所属栏目</label>
                    <select name="category_id" class="form-control">
                        @foreach($category as $cate)
                           <option
                           {{$cate->id == $topic->category_id ? "selected" : ""}}
                              value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>

                </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>
    <script>
        var editor = new Simditor({
            textarea: document.getElementById('editor'),
            upload: {
                url: '{{ route('topics.upload_img') }}',
                params: { _token: '{{ csrf_token() }}' },
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            pasteImage: true,
        });
    </script>
@stop