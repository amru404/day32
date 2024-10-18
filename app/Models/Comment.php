<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User\User;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'blog_id',
        'user_id',
    ];

    // Relasi dengan model Blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
