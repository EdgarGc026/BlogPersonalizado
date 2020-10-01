<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller{
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){
        //guardar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //trabajar con la imagen
        if($request->file('file')){
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        //retornar
        return back()->with('status', 'Creado con éxito');
    }

    
    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    
    public function update(PostRequest $request, Post $post){

        //dd($request->all());
        //editamos todo
        $post->update($request->all());

        //eliminamos la imagen por la nueva.
        if($request->file('file')){

            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        return back()->with('status','Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post){
        //eliminar la imgane
        Storage::disk('public')->delete($post->image);
        $post->delete();

        return back()->with('status', 'Eliminado con exito');
    }
}
