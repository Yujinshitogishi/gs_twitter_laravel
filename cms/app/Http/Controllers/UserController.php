<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tweet;
use App\User;
use App\Like;
use App\Follow;
use DB;


class UserController extends Controller
{
    protected $user;
    public function userpage(User $user) {
 
      $follow_check = DB::table('follows')
            ->where('follows.user_id','=',Auth::user()->id)
            ->where('follows.follow_id','=',$user->id)
            ->get();
       
        $tweets = Tweet::all()
                ->where('user_id','=',$user->id)
                ->sortByDesc('id');
        $likechecks = DB::table('likes')
                ->where('likes.user_id','=',Auth::user()->id)
                ->get();

    return view('user', [
        'tweets' => $tweets,
        'user_info'=> $user,
        'check' => $follow_check,
        'likechecks' => $likechecks
     ]);
    }
  
    public function logout(\Iluminate\Http\Request $request){
        $this->guard()->logout();
        $request()->session()->invalidate();
    }
    
    
    public function unfollow(Request $request){
        $follows = new Follow;
        $follows->user_id = Auth::user()->id; 
        $follows->follow_id = $request->follow;
        $follows->when($request->follow_check == '0',function($f) use ($request){
            return $f->where('follows.user_id','=',Auth::user()->id)
                     ->where('follows.follow_id','=',(int)$request->follow)
                     ->delete();
        });
        return redirect('/user/'.$request->follow);
    }
    
    public function follow(Request $request){
        $follows = new Follow;
        $follows->user_id = Auth::user()->id; 
        $follows->follow_id = $request->follow;
        $follows->save();
        return redirect('/user/'.$request->follow);
    }
    
    public function user_list(){
        $user_lists = DB::table('users')->get();
        return view('user_list',[
            'user_lists' => $user_lists
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
