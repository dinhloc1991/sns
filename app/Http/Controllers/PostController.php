<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use DB;

class PostController extends Controller
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

    public function index() {
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name')
            ->orderBy('posts.created_at', 'desc')->get();

        return view('sns.index', ['posts' =>  $posts]);
    }
    public function create(Request $request) {
        $body = $request->get("body");
        
        $userId = Auth::id();
        $post = new Post();
        $post->user_id = $userId;
        $post->body = $body;
        $post->save();

        return response()->json([
            'status' => true
        ]);
    }

    private function list() {
        
    }

    public function delete(Request $request) {
        $postId = $request->get("id");
        DB::table('posts')->where([
            'id' => $postId,
            "user_id" => Auth::id()
        ])
        ->delete();
        return response()->json([
            'status' => true
        ]);
    }
}
