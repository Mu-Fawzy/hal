<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'approved',
        'parent_id',
        'user_id'
    ];
    
    public function commentable()
    {
        return $this->morphTo();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
}
