<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Gender;
use Carbon\Carbon;

class Cat extends Model
{
    /**
     * キャストの定義
     */
    protected $casts = [
        'gender' => Gender::class,
    ];

    /**
     * 年齢を取得する
     */
    public function getAgeAttribute()
    {
        if (!$this->date_of_birth) {
            return null;
        }

        return Carbon::parse($this->date_of_birth)->age;
    }

    /**
     * ブログとのリレーション
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
