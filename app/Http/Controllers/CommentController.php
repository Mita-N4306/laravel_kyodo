<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $inputs=request()->validate([
        'body'=>'required|max:1500',
        'image'=>'image|max:1024',
      ]);
      $comment=Comment::create([
        'body'=>$inputs['body'],
        'user_id'=>auth()->user()->id,
        'post_id'=>$request->post_id,
      ]);
      if($request->hasFile('image')){
        $original=request()->file('image')->getClientOriginalName();
        $name=date('Ymd_Hits').'_'.$original; //秒まで含めた日時
        $path = 'public/images/' . $name;
        request()->file('image')->move(public_path('storage/images'), $name);
        $comment->image=$name;
      }
      $comment->save();
      return redirect()->route('post.show',$comment->post_id)->with('message','コメントを投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
      return view('comment.edit',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
      $inputs=request()->validate([
        'body'=>'required|max:1500',
        'image'=>'image|max:1024',
      ]);
      $comment->update(['body'=>$request->input('body')]);
      if ($request->hasFile('image')) {
        $original = $request->file('image')->getClientOriginalName();
        $name = date('Ymd_His') . '_' . $original;
        $path = 'public/images/' . $name;
        request()->file('image')->move(public_path('storage/images'), $name);
        $comment->image = $name;
    }
      $comment->save();
      return redirect()->route('post.show',$comment->post_id)
      ->with('message','コメントが更新されました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
      $comment->delete();
      return redirect()->back()->with('message','コメントを削除しました');
    }
}
