<?php


namespace common\models;


class Language
{
    const KZ = 'KZ';
    const RU = 'RU';
    const EN = 'EN';

    public static function getAll() {
        return [
            self::KZ => 'KZ', self::RU => 'RU', self::EN => 'EN'
        ];
    }
}