<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];

  //コメント機能

  public function tweet()
  {
    return $this->belongsTo(Tweet::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function getAllOrderByUpdated_at()
  {
    return self::orderBy('updated_at', 'DESC')->get();
  }

  public static function getCommentList($id)
  {
    ddd($id);
    return self::orderBy('updated_at', 'DESC')->get();
  }

}
