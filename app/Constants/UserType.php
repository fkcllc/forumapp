<?php

namespace App\Constants;

//      * @param  string USERS.USER_TYPE
class UserType
{
    public const SIMPLE = 'simple_user';
    public const COMPANY = 'company_user';
    public const MODERATOR = 'moderator';
    public const ADMIN = 'administrator';

    public static function all(): array
    {
        return [
            self::SIMPLE,
            self::COMPANY,
            self::MODERATOR,
            self::ADMIN,
        ];
    }
}
