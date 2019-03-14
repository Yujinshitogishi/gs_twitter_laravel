 <!--タイムライン画面-->
  @extends('layouts.app')

    @section('content')
    
    <div>
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')
        <!--もしついーとがあったら-->
        <div class="mt-5 container">
            @foreach ($user_lists as $user_list)
            <div id="candidates" class="card-deck">
                <div class="card">
                    <div class="card-header">
                    <!--username部分-->
                        {{$user_list->id}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <!--ツイート内容部分-->
                            <a href="/user/{{$user_list->id}}">{{ $user_list->name }}</a>
                            <footer class="blockquote-footer"><cite title="Source Title">{{ $user_list->created_at }}</cite></footer>
                       </blockquote>
                    </div>
                </div>
            </div>
           @endforeach 
        </div> 
        @endsection