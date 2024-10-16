<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'comment_id',
        'created_at',
        'updated_at',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
