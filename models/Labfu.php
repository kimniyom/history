<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "labfu".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $LABTEST
 * @property string $LABRESULT
 * @property string $D_UPDATE
 */
class Labfu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'labfu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOSPCODE', 'PID', 'SEQ', 'LABTEST'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'SEQ', 'DATE_SERV', 'LABTEST', 'LABRESULT', 'D_UPDATE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'SEQ' => 'Seq',
            'DATE_SERV' => 'Date  Serv',
            'LABTEST' => 'Labtest',
            'LABRESULT' => 'Labresult',
            'D_UPDATE' => 'D  Update',
        ];
    }
}
