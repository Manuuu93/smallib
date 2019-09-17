<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property string $birth_date
 * @property string $death_date
 * @property int $country_id
 *
 * @property Country $country
 * @property BookToAuthor[] $bookToAuthors
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth_date', 'death_date'], 'safe'],
            [['country_id'], 'integer'],
            [['first_name', 'second_name', 'last_name'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
            'death_date' => 'Death Date',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookToAuthors()
    {
        return $this->hasMany(BookToAuthor::className(), ['author_id' => 'id']);
    }
}
