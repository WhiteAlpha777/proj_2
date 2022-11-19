<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();

        return view('posts', compact('posts'));
    }
    public function create()
    {
        $postArr = [
        [
            'title' => 'title of post from phpstorm',
            'content'=>'some interesting content',
            'image'=> 'imageblabla.jpg',
            'likes'=> 20,
            'is_published'=> 1

        ],
        [
            'title' => 'another title of post from phpstorm',
            'content'=>'another some interesting content',
            'image'=> 'another imageblabla.jpg',
            'likes'=> 50,
            'is_published'=> 1

        ]];
        /*Post::create(['title' => 'another title of post from phpstorm',
            'content'=>'another some interesting content',
            'image'=> 'another imageblabla.jpg',
            'likes'=> 50,
            'is_published'=> 1
        ]);
        dd('created');*/
        foreach ($postArr as $item)
            Post::create($item);
    }
    public function update(){
        $post = Post::find(5);
        $post->update([
            'title' => 'updated another title of post from phpstorm',
            'content'=>'updated another some interesting content',
            'image'=> 'updated another imageblabla.jpg',
            'likes'=> 1000,
            'is_published'=> 0]);
        //dd('updated');
    }
    public function delete(){
        /*
        $post = Post::find(2);
        $post->delete();*/
        //dd('deleted');
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }
    public function firstOrCreate(){
        /*
        $post = Post::find(2);
        $post->delete();*/
        //dd('deleted');
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'some post',
            'content'=>'some content',
            'image'=> 'some imageblabla.jpg',
            'likes'=> 5000,
            'is_published'=> 1
        ];

        $post = Post::firstOrCreate(
            ['title' => 'some title phpstorm'],
            [
                'title' => 'some title phpstorm',
                'content'=>'some content',
                'image'=> 'some imageblabla.jpg',
                'likes'=> 5000,
                'is_published'=> 1
            ]
        );
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        /*
        $post = Post::find(2);
        $post->delete();*/
        //dd('deleted');
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'updateorcreate some post',
            'content'=>'updateorcreate some content',
            'image'=> 'updateorcreate some imageblabla.jpg',
            'likes'=> 4500,
            'is_published'=> 0
        ];

        $post = Post::updateOrCreate(
            ['title' => 'some title not phpstorm'],
            [
                'title' => 'some title not phpstorm',
                'content'=>'its not update some content',
                'image'=> 'updateorcreate some imageblabla.jpg',
                'likes'=> 4500,
                'is_published'=> 0
            ]
        );
        dump($post->title);
        dd('updated or created');
    }
}
