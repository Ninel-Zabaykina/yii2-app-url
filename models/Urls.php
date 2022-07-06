<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urls".
 *
 * @property int $id
 * @property string $url
 * @property int $check_frequency
 * @property int $repeat_num
 * @property string $created_at
 *
 * @property Checks[] $checks
 */
class Urls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['check_frequency', 'repeat_num'], 'integer'],
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'check_frequency' => 'Check Frequency',
            'repeat_num' => 'Repeat Num',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Checks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChecks()
    {
        return $this->hasMany(Checks::className(), ['url_id' => 'id']);
    }
}
