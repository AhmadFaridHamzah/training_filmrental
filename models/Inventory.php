<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "inventory".
 *
 * @property string $inventory_id
 * @property integer $film_id
 * @property integer $store_id
 * @property string $last_update
 *
 * @property Film $film
 * @property Store $store
 * @property Rental[] $rentals
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'store_id'], 'required'],
            [['film_id', 'store_id'], 'integer'],
            [['last_update'], 'safe'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'film_id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'store_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_id' => Yii::t('app', 'Inventory ID'),
            'film_id' => Yii::t('app', 'Film ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['inventory_id' => 'inventory_id']);
    }

    /**
     * @inheritdoc
     * @return InventoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InventoryQuery(get_called_class());
    }


    public function stockfilm(){

        $data = Inventory::find()
            ->select('count(inventory.inventory_id) as inventory_stock,category.name')
            ->joinWith('film.filmCategories.category')
            ->groupBy('category.category_id')
            ->asArray()->all();


            return $data;
    }


    public function listfilm(){

        $query=  Inventory::find()
                ->select(['film.title','film.description',
                    'film.rental_rate','inventory.store_id',
                        'inventory.inventory_id',
                        'inventory.film_id',])
                ->joinWith(['film'])
                ->groupBy(['film.film_id']);

         $count=$query->count();
         $pagination= new Pagination(['totalCount'=>$count,'pageSize'=>10]);
         $film=$query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->asArray()->all();




                $data=['listfilm'=>$film,
                'pagination'=>$pagination];
    

                return $data;


    }



          public function listfilmbyid($id){

                $query=  Inventory::find()
                ->select(['film.title','film.description',
                    'film.rental_rate','inventory.store_id',
                        'inventory.inventory_id',
                        'inventory.film_id',])
                ->where(['in','inventory_id',$id])
                ->joinWith(['film'])
                ->groupBy(['film.film_id'])
                ->asArray()->all();


                return  $query;

          }



}
