<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=['body','user_id','comment_id'];
    public function comments(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}