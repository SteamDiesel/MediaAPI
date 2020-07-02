<?php

namespace App\Http\Controllers;

use App\Post;
use App\Providers\NovaServiceProvider;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $nova_user = in_array(Auth::user()->email, [
            "jason.lloyd.law@gmail.com",
                "toby@tigelectrical.com",
                "tashmpc81@hotmail.com"
                // Remember to update the NovaServiceProvider gate array if you change this array.
        ]);
        
        if($nova_user){
            return redirect('/nova');
        } 

        $posts = Post::where(['user_id' => Auth::id()])->orderBy('updated_at', 'desc')->get();
        
        return view('home', compact('posts'));
    }
}
