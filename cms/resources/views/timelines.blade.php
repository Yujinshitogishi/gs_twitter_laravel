  <!--タイムライン画面-->
  @extends('layouts.app')

    @section('content')
    
     
    <div>
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')
          <!--もしついーとがあったら-->
        @if (count($tweets) > 0)
        
        <div class="mt-5 container">
            @foreach ($tweets as $tweet)
            @for($i=0; $i<$tweet->follow->count(); $i++)
            @if($tweet->follow[$i]->user_id == Auth::user()->id)
            
            <div id="candidates" class="card-deck">
                <div class="card">
                    <div class="card-header">
                    <!--username部分-->
                    <a href="/user/{{$tweet->user_id}}">{{$tweet->user->name}}</a>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <!--ツイート内容部分-->
                            <p>{{ $tweet->tweets_content }}</p>
                
                
                <form action="{{url('/tweet_like')}}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <!--{{$tweet->like}}-->
                        <cite title="Source Title">
                            <input type="hidden" name="like" id="like" value="{{$tweet->id}}"/>
                            <button type="submit" class="btn btn-primary">LIKE{{$tweet->like->count()}}</button>
                        </cite>      
                </form>
                <footer class="blockquote-footer"><cite title="Source Title">{{ $tweet->created_at }}</cite></footer>
                        </blockquote>
                    </div> 
                </div>
            </div>
           @endif 
           @endfor
           @endforeach 
        </div> 
        
        @endif
        @endsection