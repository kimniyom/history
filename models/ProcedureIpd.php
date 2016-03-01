<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedure_ipd".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $AN
 * @property string $DATETIME_ADMIT
 * @property string $WARDSTAY
 * @property string $PROCEDCODE
 * @property string $TIMESTART
 * @property string $TIMEFINISH
 * @property string $SERVICEPRICE
 * @property string $PROVIDER
 * @property string $D_UPDATE
 */
class ProcedureIpd extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'procedure_ipd';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'AN', 'PROCEDCODE', 'TIMESTART'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'AN', 'DATETIME_ADMIT', 'WARDSTAY', 'PROCEDCODE', 'TIMESTART', 'TIMEFINISH', 'SERVICEPRICE', 'PROVIDER', 'D_UPDATE'], 'string', 'max' => 100]
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
            'PROCEDCODE' => 'Procedcode',
            'TIMESTART' => 'Timestart',
            'TIMEFINISH' => 'Timefinish',
            'SERVICEPRICE' => 'Serviceprice',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function Get_procedure_ipd($HOSPCODE = null, $PID = null, $AN = null) {
        $sql = "SELECT *
            FROM procedure_ipd p LEFT JOIN mas_proced m ON p.PROCEDCODE = m.PROCED
            WHERE p.HOSPCODE = '$HOSPCODE' AND p.PID = '$PID' AND p.AN = '$AN' ";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
