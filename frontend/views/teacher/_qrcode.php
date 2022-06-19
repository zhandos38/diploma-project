<?php

use Da\QrCode\Contracts\ErrorCorrectionLevelInterface;
use Da\QrCode\QrCode;

$qrCode = (new QrCode('http://kiosk-hub.itbgroup.kz/ru/employee/view?id=3865'))
    ->setSize(250)
    ->setMargin(5)
    ->setErrorCorrectionLevel(ErrorCorrectionLevelInterface::HIGH);
?>
<div style="width: 100%; text-align: center">
    <img src="<?= $qrCode->writeDataUri() ?>">
</div>
<a class="btn btn-info" href="<?= $qrCode->writeDataUri() ?>" style="width: 100%" download="qrcode-<?= $model->name ?>.png"><i class="fa fa-download"></i> Скачать</a>
