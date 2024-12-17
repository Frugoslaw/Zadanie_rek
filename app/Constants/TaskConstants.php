<?php

namespace App\Constants;

class TaskConstants
{
    public const PRIORITY = [
        'low' => 'Niski',
        'medium' => 'Średni',
        'high' => 'Wysoki',
    ];

    public const STATUS = [
        'to-do' => 'Do zrobienia',
        'in progress' => 'W trakcie',
        'done' => 'Zrobione',
    ];

    public static function prioritiesKeys(): string
    {
        return implode(',', array_keys(self::PRIORITY));
    }

    public static function statusKeys(): string
    {
        return implode(',', array_keys(self::STATUS));
    }
}
