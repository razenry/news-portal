<?php

namespace App;

enum AspirationType: string
{
    case Blog = 'Blog';
    case Aspirasi = 'Aspirasi';

    public function label(): string
    {
        return match ($this) {
            self::Blog => 'Blog',
            self::Aspirasi => 'Aspirasi',
        };
    }
}
