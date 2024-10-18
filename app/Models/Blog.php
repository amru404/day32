<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User\User;

class Blog extends Model
{
    use HasFactory;
    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['judul', 'user_id', 'kategori', 'tag', 'konten','created_at'];

    
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
