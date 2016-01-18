<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chronic".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $DATE_DIAG
 * @property string $CHRONIC
 * @property string $HOSP_DX
 * @property string $HOSP_RX
 * @property string $DATE_DISCH
 * @property string $TYPEDISCH
 * @property string $D_UPDATE
 */
class Chronic extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'chronic';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'CHRONIC'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'DATE_DIAG', 'CHRONIC', 'HOSP_DX', 'HOSP_RX', 'DATE_DISCH', 'TYPEDISCH', 'D_UPDATE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'DATE_DIAG' => 'Date  Diag',
            'CHRONIC' => 'Chronic',
            'HOSP_DX' => 'Hosp  Dx',
            'HOSP_RX' => 'Hosp  Rx',
            'DATE_DISCH' => 'Date  Disch',
            'TYPEDISCH' => 'Typedisch',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function Get_chronic($HOSPCODE = null, $PID = null) {
        $query = "SELECT *
                            FROM chronic c 
                            LEFT JOIN mas_diag m ON c.CHRONIC = m.DIAGCODE
                            WHERE c.HOSPCODE = '$HOSPCODE' AND c.PID = '$PID'  ";

        return Yii::$app->db->createCommand($query)->queryAll();
    }

}
