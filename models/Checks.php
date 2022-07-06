<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 * @property int $url_id
 * @property int|null $http_code
 * @property int|null $attempt_num
 * @property string $check_time
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
            [['url_id', 'http_code', 'attempt_num'], 'integer'],
            [['check_time'], 'safe'],
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
            'http_code' => 'Http Code',
            'attempt_num' => 'Attempt Num',
            'check_time' => 'Check Time',
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
