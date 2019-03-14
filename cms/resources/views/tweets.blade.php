<!--ツイート投稿するblade-->
@extends('layouts.app')

@section('content')

 <!-- Bootstrapの定形コード… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
        @include('common.errors')
    <!--ツイート投稿フォーム-->
    <form action = "{{url('/timelines')}}" method="POST" class="form-horizontal">
         {{csrf_field()}}
    <div class="container">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Text</label>
        <textarea class="form-control" id="tweets_content" rows="3" name="tweets_content"></textarea>
        </div>
        @if(count($check) == null)
        <input type="hidden" name="follow" id="follow" value="{{$value}}">
        @endif
        <button type="submit" class="btn btn-primary">Tweet</button>
    </form>
    </div>

    @endsection