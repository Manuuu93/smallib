<?php
/**
 * Created by PhpStorm.
 * User: sMDepelyan
 * Date: 19.09.2019
 * Time: 11:41
 */

namespace console\controllers;

use yii\console\Controller;

class FillDbController extends Controller
{
    public function actionFillCountry()
    {
        $seeder = new \tebazil\yii2seeder\Seeder();
        $generator = $seeder->getGeneratorConfigurator();
        $faker = $generator->getFakerConfigurator();

        $seeder->table('book_to_author')->columns([
            'id',
            'book_id' => $faker->numberBetween(1, 100000),
            'author_id' => $faker->numberBetween(1, 365),
        ])->rowQuantity(100000);

        $seeder->refill();
    }
}