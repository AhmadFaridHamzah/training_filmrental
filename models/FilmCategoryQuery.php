<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FilmCategory]].
 *
 * @see FilmCategory
 */
class FilmCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FilmCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FilmCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
