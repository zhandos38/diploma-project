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

    const FIRST_LANG = 0;
    const SECOND_LANG = 1;
    const THIRD_LANG = 2;

    public static function getLanguages() {
        return [
            self::FIRST_LANG => 'I', self::SECOND_LANG => 'II', self::THIRD_LANG => 'III'
        ];
    }

    public static function getLanguage($language)
    {
        return ArrayHelper::getValue(self::getLanguages(), $language);
    }

    public static function getSemesters() {
        $semester = [];
        for ($i = 1; $i <= 9; $i++) {
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