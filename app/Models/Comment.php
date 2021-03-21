<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->translatedFormat('d M, Y فى H:i');
    }
}
