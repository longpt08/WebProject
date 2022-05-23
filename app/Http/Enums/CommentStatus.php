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
                return 'Hiển thị';
            case self::PENDING:
                return 'Chờ duyệt';
            case self::HIDDEN:
                return 'Bị ẩn';
        }
        return '';
    }
}
