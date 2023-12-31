<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class UsersController extends Controller
{
  public function index()
  {
    $users=User::orderBy('id','desc')->paginate(10);
    return view('welcome',['users'=>$users]);
  }

  public function show($id)
  {
    $user=User::findOrFail($id);
    $posts=$user->posts()->orderBy('id','desc')->paginate(10);
    $data=['user'=>$user,'posts'=>$posts,];
    return view('users.show',$data);
  }
}
