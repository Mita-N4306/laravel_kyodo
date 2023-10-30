<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //追加

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('created_at','desc')->get();
      $user = auth()->user();
    //   return view('post.index',compact('posts','user')); compact関数
      return view('post.index',['posts'=>$posts,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーションの実装(パターン1)
        // $data = $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'body' => ['required', 'string', 'max:1025'],
        //     'image' => ['image', 'max:1024'],
        // ]);

        // $post = new Post();
        // $post->title = $data['title'];
        // $post->body = $data['body'];
        // $post->user_id = auth()->user()->id;
        // $post->save();
        // return redirect()->route('post.create')->with('message', '投稿を作成しました');

        //バリデーションの実装(パターン2)
    //    $rules = [
    //     'title'=>'required|string|max:255',
    //     'body'=>'required|string|max:1000',
    //     'image'=>'image|max:1024',
    //    ];
    //    $validator=Validator::make($request->all(),$rules);
    //    if($validator->fails()){
    //     return back()
    //      ->withErrors($validator)
    //      ->withInput();
    //    }else{
    //     $post = new Post();
    //     $post->title = $request->title;
    //     $post->body = $request->body;
    //     $post->user_id = auth()->user()->id;
    //     $post->save();
    //     return redirect()->route('post.create')->with('message','投稿を作成しました');
    //     }

        $inputs=$request->validate([
        'title'=>'required|max:255',
        'body'=>'required|max:2000',
        'image'=>'image|max:1024',
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=auth()->user()->id;
        if(request('image')){
           $original = request()->file('image')->getClientOriginalName();
           $name = date('Ymd_His').'_'.$original; //秒まで含めた日時
           request()->file('image')->move('storage/images', $name);
        //    request()->file('image')->storeAs('public/images',$name); storeAsメソッド
           $post->image = $name;
        }
        $post->save();
        return redirect()->route('post.create')->with('message','投稿を送信しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      return view('post.show',['post'=>$post]);
    //   return view('post.show',compact('post')); コンパクト関数
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
