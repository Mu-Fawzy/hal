<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'post_type',
        'mata_key',
        'mata_description',
        'featured_post',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_post','post_id','category_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function allComments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopePage($query)
    {
        return $query->where('post_type', 'page');
    }
    public function scopePost($query)
    {
        return $query->where('post_type', 'post');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->translatedFormat('d M ,Y');
    }

}


