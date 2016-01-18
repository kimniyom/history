<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug_opd".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $CLINIC
 * @property string $DIDSTD
 * @property string $DNAME
 * @property string $AMOUNT
 * @property string $UNIT
 * @property string $UNIT_PACKING
 * @property string $DRUGPRICE
 * @property string $DRUGCOST
 * @property string $PROVIDER
 * @property string $D_UPDATE
 */
class DrugOpd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_opd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOSPCODE', 'PID', 'SEQ', 'DIDSTD'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'SEQ', 'DATE_SERV', 'CLINIC', 'DIDSTD', 'AMOUNT', 'UNIT', 'UNIT_PACKING', 'DRUGPRICE', 'DRUGCOST', 'PROVIDER', 'D_UPDATE'], 'string', 'max' => 100],
            [['DNAME'], 'string', 'max' => 255]
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
            'CLINIC' => 'Clinic',
            'DIDSTD' => 'Didstd',
            'DNAME' => 'Dname',
            'AMOUNT' => 'Amount',
            'UNIT' => 'Unit',
            'UNIT_PACKING' => 'Unit  Packing',
            'DRUGPRICE' => 'Drugprice',
            'DRUGCOST' => 'Drugcost',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }
}
