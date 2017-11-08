<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property integer $film_id
 * @property string $title
 * @property string $description
 * @property string $release_year
 * @property integer $language_id
 * @property integer $original_language_id
 * @property integer $rental_duration
 * @property string $rental_rate
 * @property integer $length
 * @property string $replacement_cost
 * @property string $rating
 * @property string $special_features
 * @property string $last_update
 *
 * @property Language $language
 * @property Language $originalLanguage
 * @property FilmActor[] $filmActors
 * @property Actor[] $actors
 * @property FilmCategory[] $filmCategories
 * @property Category[] $categories
 * @property Inventory[] $inventories
 */
class Film extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'language_id'], 'required'],
            [['description', 'rating', 'special_features'], 'string'],
            [['release_year', 'last_update'], 'safe'],
            [['language_id', 'original_language_id', 'rental_duration', 'length'], 'integer'],
            [['rental_rate', 'replacement_cost'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'language_id']],
            [['original_language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['original_language_id' => 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'film_id' => Yii::t('app', 'Film ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'release_year' => Yii::t('app', 'Release Year'),
            'language_id' => Yii::t('app', 'Language ID'),
            'original_language_id' => Yii::t('app', 'Original Language ID'),
            'rental_duration' => Yii::t('app', 'Rental Duration'),
            'rental_rate' => Yii::t('app', 'Rental Rate'),
            'length' => Yii::t('app', 'Length'),
            'replacement_cost' => Yii::t('app', 'Replacement Cost'),
            'rating' => Yii::t('app', 'Rating'),
            'special_features' => Yii::t('app', 'Special Features'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginalLanguage()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'original_language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmActors()
    {
        return $this->hasMany(FilmActor::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::className(), ['actor_id' => 'actor_id'])->viaTable('film_actor', ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmCategories()
    {
        return $this->hasMany(FilmCategory::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['category_id' => 'category_id'])->viaTable('film_category', ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(Inventory::className(), ['film_id' => 'film_id']);
    }

    /**
     * @inheritdoc
     * @return FilmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmQuery(get_called_class());
    }


    public function totalfilmlanguage(){

        $data = Film::find()
            ->select('count(film.film_id) as total_film,language.name')
            ->joinWith('language')
            ->groupBy('language.language_id')
            ->asArray()->all();

        return $data;
    }
}
