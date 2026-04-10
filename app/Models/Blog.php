<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'image',
        'body',
    ];

    /**
     * ユーザとのリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * カテゴリーとのリレーション
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 猫とのリレーション
     */
    public function cats()
    {
        return $this->belongsToMany(Cat::class)->withTimestamps();
    }
}
