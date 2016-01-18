<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedure_opd".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $CLINIC
 * @property string $PROCEDCODE
 * @property string $SERVICEPRICE
 * @property string $PROVIDER
 * @property string $D_UPDATE
 */
class ProcedureOpd extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'procedure_opd';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'SEQ', 'PROCEDCODE'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'SEQ', 'DATE_SERV', 'CLINIC', 'PROCEDCODE', 'SERVICEPRICE', 'PROVIDER', 'D_UPDATE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'SEQ' => 'Seq',
            'DATE_SERV' => 'Date  Serv',
            'CLINIC' => 'Clinic',
            'PROCEDCODE' => 'Procedcode',
            'SERVICEPRICE' => 'Serviceprice',
            'PROVIDER' => 'Provider',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function Get_procedure($HOSPCODE = null, $PID = null, $SEQ = null) {
        $sql = "SELECT *
            FROM procedure_opd p LEFT JOIN mas_proced m ON p.PROCEDCODE = m.PROCED
            WHERE p.HOSPCODE = '$HOSPCODE' AND p.PID = '$PID' AND p.SEQ = '$SEQ' ";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
