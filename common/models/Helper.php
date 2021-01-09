<?php


namespace common\models;


use yii\helpers\ArrayHelper;

class Helper
{
    const BACHELOR = 0;
    const MASTER = 1;
    const DOCTOR = 2;

    public static function getDegrees() {
        return [
            self::BACHELOR => 'Бакалавр',
            self::MASTER => 'Магистр',
            self::DOCTOR => 'Доктор'
        ];
    }

    public static function getSemesters() {
        $semester = [];
        for ($i = 1; $i <= 8; $i++) {
            $semester[$i] = $i . ' семестр';
        }

        return $semester;
    }

    const MODE_DAY = 1;
    const MODE_EVENING = 0;

    public static function getModes()
    {
        return [
            self::MODE_DAY => 'Очная форма'
        ];
    }
}