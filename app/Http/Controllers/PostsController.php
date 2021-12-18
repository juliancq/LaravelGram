<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        $feed = [];

        foreach(auth()->user()->following as $follow){

            foreach($follow->user->posts as $post){

                array_push($feed, $post);
            }
        }

        return view('posts/index', compact('feed'));
    }

    public function show(Post $post){
        
        return view('posts/show',compact('post'));
    }

    public function create(){

        return view('posts/create');
    }

    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $img = Image::make(public_path("storage/".$imagePath))->fit(1200,1200);
        $img->save();

        auth()->user()->posts()->create([

            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }


}
