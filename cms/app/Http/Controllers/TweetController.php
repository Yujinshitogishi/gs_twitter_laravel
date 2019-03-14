<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Tweet;
 use App\User;
 use App\Follow;
 use App\Like;
 use Auth;
 use Validator;
 use DB;
 
class TweetController extends Controller
{
    
    // public function TweetController(){
    //     return view('welcome');
    // }
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(Request $request){
        return view('tweets',[
            // 'tweets' => $tweets
        ]);
    }
    

    public function tweetpost(Request $request){
        $validator = Validator::make($request->all(),[
            'tweets_content' => 'required|max:140',
        ]);
        
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $tweets = new Tweet;
        $tweets->user_id = Auth::user()->id;
        $tweets->tweets_content = $request->tweets_content;
        $tweets->save();
        
        $follows = new Follow;
        if ($request->filled('follow')) {
            $follows->user_id = Auth::user()->id; 
            $follows->follow_id = $request->follow;
            $follows->save();
               }
      
        return redirect('/timelines');
    }

    public function ownfollowcheck(){
        $check = DB::table('follows')
            ->where('follows.user_id','=',Auth::user()->id)
            ->where('follows.follow_id','=',Auth::user()->id)
            ->get();
        $value = Auth::user()->id;
       
        return view('tweets', [
            'check' => $check,
            'value' => $value
        ]);
    }


    public function timeline() {
        $tweets = Tweet::all()->sortByDesc('id');

        return view('timelines', [
            'tweets' => $tweets
        ]);
    }
    
    public function like(Request $request){
    $like_check = DB::table('tweets')
            ->join('likes','likes.tweet_id','=','tweets.id')
            ->where('tweets.id','=',$request->like)
            ->where('likes.user_id','=',Auth::user()->id)
            ->get();

    if($like_check->count() > 0){
        $like_delete = DB::table('likes')
                    ->where('user_id','=',Auth::user()->id)
                    ->where('tweet_id','=',$request->like)
                    ->delete();
    }else{
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->tweet_id = $request->like;
        $like->save();    
        }
        
      return back();
    }
    

 
}