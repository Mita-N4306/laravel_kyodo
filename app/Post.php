<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable=[
    'title',
    'body',
    'user_id',
    'image',
  ];

  public function user() {
    return $this->belongsTo(User::class); //リレーションの設定
  }

  public function comments() {
    return $this->hasMany(Comment::class);
  }
}
