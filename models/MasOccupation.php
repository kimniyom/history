<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mas_occupation".
 *
 * @property integer $ID
 * @property string $occupa_id
 * @property string $occupa_name
 */
class MasOccupation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mas_occupation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['occupa_id', 'occupa_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'occupa_id' => 'Occupa ID',
            'occupa_name' => 'Occupa Name',
        ];
    }
}
