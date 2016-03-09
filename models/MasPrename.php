<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mas_prename".
 *
 * @property integer $OID
 * @property string $PRENAMECODE
 * @property string $NAME
 * @property string $FULLNAME
 * @property string $CODEMOI
 */
class MasPrename extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mas_prename';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OID'], 'integer'],
            [['PRENAMECODE'], 'required'],
            [['PRENAMECODE', 'CODEMOI'], 'string', 'max' => 3],
            [['NAME'], 'string', 'max' => 70],
            [['FULLNAME'], 'string', 'max' => 130]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OID' => 'Oid',
            'PRENAMECODE' => 'Prenamecode',
            'NAME' => 'Name',
            'FULLNAME' => 'Fullname',
            'CODEMOI' => 'Codemoi',
        ];
    }

    public function get_prename() {
        $sql = "SELECT OID,NAME
        FROM mas_prename";
        return \Yii::$app->db->createCommand($sql)->queryAll();
    }

}
