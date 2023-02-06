<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
}
