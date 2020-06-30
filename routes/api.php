<?php


use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/data', function(Request $request){

    request()->validate([
        'size' => 'nullable|string|max:10'
    ]);
    if($request->size){
        $size = $request->size;
    } else {
        $size = '';
    }
    

    $posts = Post::all()->sortByDesc('updated_at');
    
    foreach ($posts as $post){
        
        $stack = array();
        $media = $post->getMedia();
        foreach ($media as $image){
            array_push($stack, $image->getUrl($size));
        }
        $post->images = $stack;
    }
    
    return response()->json([
          "posts" => $posts
    ], 200);
});