<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('sns.index');
    }
    public function create(Request $request) {
        $body = $request->get("body");
        
        return response()->json([
            'status' => true
        ]);
    }

    public function delete() {

    }
}
