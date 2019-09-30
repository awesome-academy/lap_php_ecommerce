<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'product_id',
        'parent_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
