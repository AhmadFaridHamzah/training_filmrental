<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;

$country = \app\models\Country::find()
            ->joinWith(['cities'])
            ->limit(10)
            ->asArray()
            ->all();

print_r($country);
//die();
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'country_id',
            'country',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'cities.city',
                'value' => function($model){
                    //print_r($model->cities);
                    $cities = $model->cities;
                    $strCity = "";
                    foreach($cities as $city)
                    {
                        $strCity .= $city->city."<br>";
                    }
                    return $strCity;
                },
                'format' => 'html',
            ],
            'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
