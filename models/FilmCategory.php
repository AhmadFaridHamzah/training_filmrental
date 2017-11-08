<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film_category".
 *
 * @property integer $film_id
 * @property integer $category_id
 * @property string $last_update
 *
 * @property Category $category
 * @property Film $film
 */
class FilmCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'category_id'], 'required'],
            [['film_id', 'category_id'], 'integer'],
            [['last_update'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'film_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'film_id' => Yii::t('app', 'Film ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['film_id' => 'film_id']);
    }

    /**
     * @inheritdoc
     * @return FilmCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmCategoryQuery(get_called_class());
    }
}
