<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 * @property int $url_id
 *
 * @property Urls $url
 */
class Checks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url_id'], 'required'],
            [['url_id'], 'integer'],
            [['url_id'], 'exist', 'skipOnError' => true, 'targetClass' => Urls::className(), 'targetAttribute' => ['url_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url_id' => 'Url ID',
        ];
    }

    /**
     * Gets query for [[Url]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUrl()
    {
        return $this->hasOne(Urls::className(), ['id' => 'url_id']);
    }
}
