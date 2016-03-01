<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug_ipd".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $AN
 * @property string $DATETIME_ADMIT
 * @property string $WARDSTAY
 * @property string $TYPEDRUG
 * @property string $DIDSTD
 * @property string $DNAME
 * @property string $DATESTART
 * @property string $DATEFINISH
 * @property string $AMOUNT
 * @property string $UNIT
 * @property string $UNIT_PACKING
 * @property string $DRUGPRICE
 * @property string $DRUGCOST
 * @property string $PROVIDER
 * @property string $D_UPDATE
 */
class DrugIpd extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'drug_ipd';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'AN', 'TYPEDRUG', 'DIDSTD'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'AN', 'DATETIME_ADMIT', 'WARDSTAY', 'TYPEDRUG', 'DIDSTD', 'DATESTART', 'DATEFINISH', 'AMOUNT', 'UNIT', 'UNIT_PACKING', 'DRUGPRICE', 'DRUGCOST', 'PROVIDER', 'D_UPDATE'], 'string', 'max' => 100],
            [['DNAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'AN' => 'An',
            'DATETIME_ADMIT' => 'Datetime  Admit',
            'WARDSTAY' => 'Wardstay',
            'TYPEDRUG' => 'Typedrug',
            'DIDSTD' => 'Didstd',
            'DNAME' => 'Dname',
            'DATESTART' => 'Datestart',
            'DATEFINISH' => 'Datefinish',
            'AMOUNT' => 'Amount',
            'UNIT' => 'Unit',
            'UNIT_PACKING' => 'Unit  Packing',
            'DRUGPRICE' => 'Drugprice',
            'DRUGCOST' => 'Drugcost',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function Get_drug_ipd($HOSPCODE = null, $PID = null, $SEQ = null) {
        $sql = "SELECT d.*,m.UNIT_NAME,CONCAT(p.PRENAME,p.NAME,' ',p.LNAME) AS PRIVIDER_NAME
                FROM drug_ipd d 
                LEFT JOIN mas_drug_unit m ON d.UNIT = m.UNIT
                LEFT JOIN provider p ON d.PROVIDER = p.PROVIDER
                WHERE d.HOSPCODE = '$HOSPCODE' 
                AND d.PID = '$PID' 
                AND d.AN = '$SEQ' ";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
