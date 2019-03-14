<!--ログインされているか、を判別するblade(デフォルト画面）-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <!--ログインされているか識別-->
                    <!--@if (session('status'))-->
                    @if (Auth::check())
                    <!--もしログインしていたら-->
                    <!--自分のプロフィール画面へ-->
                    <!--どうやらここから遷移するとブートストラップが崩れる模様(未だ解決できず)-->
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        
                    @else
                    <!--もしログインしてなかったら-->
                    <!--ログイン画面へ-->
                    <a href="/auth/login">login</a>
                    <a href="/auth/register">signup</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
