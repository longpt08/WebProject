<?php


namespace App\Http\Enums;


class CommentStatus
{
    const ACTIVE = 1;
    const HIDDEN = 0;
    const PENDING = 2;

    public static function convert($status): string
    {
        switch ($status) {
            case self::ACTIVE:
                return 'Active';
            case self::PENDING:
                return 'Pending';
            case self::HIDDEN:
                return 'Hidden';
        }
        return '';
    }
}
