<?php

namespace App\Enums;

enum Gender: int
{
    case Male = 1;
    case Female = 2;

    /**
     * ラベルを返す
     */
    public function label(): string
    {
        return match($this) {
            self::Male => '♂',     // オス
            self::Female => '♀',   // メス
        };
    }

    /**
     * 選択肢の配列を返す
     */
    public static function options(): array
    {
        return [
            self::Male->value => self::Male->label(),
            self::Female->value => self::Female->label(),
        ];
    }
}
