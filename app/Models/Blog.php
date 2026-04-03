<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'image',
        'body',
    ];

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
