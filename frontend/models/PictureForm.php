<?php
/**
 * Created by PhpStorm.
 * User: sMDepelyan
 * Date: 27.09.2019
 * Time: 13:48
 */

namespace frontend\models;


use yii\base\Model;

class PictureForm extends Model
{
    public $picture;

    public function rules()
    {
        return [
            [['picture'], 'file',
                'extensions' => ['jpg'],
                'checkExtensionByMimeType' => true,
            ],
        ];
    }

    public function save()
    {
        return 1;
    }
}