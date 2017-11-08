<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Film]].
 *
 * @see Film
 */
class FilmQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Film[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Film|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
