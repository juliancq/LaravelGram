<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function show(User $user){

        $following = (auth()->user()) ? auth()->user()->following->contains($user->profile->id) : null;
        
        return view('profiles/show', compact('user', 'following'));
    }

    public function edit(User $user){

        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'title' => 'required',
            'description' => '',
            'url' => 'url',
            'image' => 'image'
        ]);


        if(request('image')){

            $imagePath = request('image')->store('profile', 'public');

            $img = Image::make(public_path("storage/".$imagePath))->fit(1000,1000);
            $img->save();
            
            $data = array_merge($data, ['image' => $imagePath,]);
        }
        
        auth()->user()->profile->update($data);

        return redirect("/profile/". $user->id);
    }
}
