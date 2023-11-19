<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //追加
use App\Comment; //追加
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::with('user')->orderBy('created_at','desc')->paginate(5);
      $user = auth()->user();
      return view('welcome',['posts'=>$posts,'user'=>$user,]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       $post=Post::findOrFail($id);
       $this->authorize('edit-post',$post);
       if(\Auth::id() === $post->user_id){
        $inputs=$request->validate([
         'title'=>'required|max:255',
         'body'=>'required|max:2000',
         'image'=>'image|max:1024',
        ]);
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->body = $request->input('body');

        if($request->hasFile('image'))
        {
          $imagePath = $request->file('image')->store('post.store');
          $post->image = $imagePath;
        }
        $post->save();
       }
       return view('post.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,$id)
    {
      $post=Post::findOrFail($id);
      $this->authorize('edit-post',$post);
      $inputs=$request->validate([
        'title'=>'required|max:255',
        'body'=>'required|max:2000',
        'image'=>'image|max:1024',
      ]);
      $post->title=$inputs['title'];
      $post->body=$inputs['body'];

      if(request('image')){
        $original=request()->file('image')->getClientOriginalName();
        $name=date('Ymd_His').'_'.$original;
        $file=request()->file('image')->move('storage/images',$name);
        $post->image=$name;
      }
      $post->save();
      return redirect()->route('post.show',$post)->with('message','投稿を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post=Post::findOrFail($id);
      $this->authorize('delete-post',$post);
      if(\Auth::id()===$post->user->id){
        $post->delete();
        $post->comments()->delete();
      }
      return redirect()->route('post.index')->with('message','投稿を削除しました');
    }

    public function mypost()
    {
      $user=auth()->user()->id;
      $posts=Post::where('user_id',$user)->orderBy('created_at','desc')->get();
      return view('post.mypost',['posts'=>$posts,'user'=>$user]);
    }

    public function mycomment()
    {
      $user=auth()->user()->id;
      $comments=Comment::where('user_id',$user)->orderBy('created_at','desc')->get();
      return view('post.mycomment',['comments'=>$comments,'user'=>$user]);
    }
}
