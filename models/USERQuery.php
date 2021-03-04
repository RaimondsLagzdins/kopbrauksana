<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[USER]].
 *
 * @see USER
 */
class USERQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return USER[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return USER|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
