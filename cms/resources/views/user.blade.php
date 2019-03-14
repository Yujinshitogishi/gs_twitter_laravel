<!--ユーザーページのblade-->
@extends('layouts.app')

@section('content')

<div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{$user_info->name}}</h1>
            <p class="lead">This is an introduction sentence.</p> 
    @if($user_info->id == Auth::user()->id)
    @elseif(count($check) > 0)
        <form action="{{url('/user/unfollow')}}" method="POST" class="form-horizontal">
        {{csrf_field()}}
            <input type="hidden" name="follow_check" id="follow_check" value="0">
            <input type="hidden" name="follow" id="follow" value="{{$user_info->id}}">
            <button class="btn btn-lg btn-primary btn-block">Follow中</button>
    @elseif(count($check) == 0)
        <form action="{{url('/user/follow')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="follow_check" id="follow_check" value="1">
            <input type="hidden" name="follow" id="follow" value="{{$user_info->id}}">
            <button class="btn btn-lg btn-primary btn-block">Followする</button>
    @endif
     </div>
    </div>
    </form>
   
      <div>
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')
       
        <!--テーブルのツイート有無-->
        <!--@if (count($tweets) > 0)-->
        <div class="mt-5 container">
           @foreach ($tweets as $tweet)   
            <div id="candidates" class="card-deck">
                <div class="card">
              
                    <div class="card-header">
                        <!--username部分-->
                        {{$tweet->user->name}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                             <!--ツイート内容部分-->
                            <p>{{$tweet->tweets_content}}</p>
                            <!--時間？表示部分-->
                    <form action="{{url('/user_like')}}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <!--{{$tweet->like}}-->
                        <cite title="Source Title">
                            <input type="hidden" name="like" id="like" value="{{$tweet->id}}"/>
                            <button type="submit" class="btn btn-primary">LIKE{{$tweet->like->count()}}</button>
                        </cite>      
                    </form>
                
                       </blockquote>
                    </div>
                </div>
            </div>
           @endforeach 
        </div> 
  </div>
  <!--@endif-->
     @endsection