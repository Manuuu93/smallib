<?php

namespace frontend\components;


use yii\web\UploadedFile;

interface StorageInterface
{
    public function saveUploadedFIle(UploadedFile $file);
    public function getFile(string $filename);
}