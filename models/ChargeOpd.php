<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "charge_opd".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $CLINIC
 * @property string $CHARGEITEM
 * @property string $CHARGELIST
 * @property string $QUANTITY
 * @property string $INSTYPE
 * @property string $COST
 * @property string $PRICE
 * @property string $PAYPRICE
 * @property string $D_UPDATE
 */
class ChargeOpd extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'charge_opd';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'SEQ', 'CHARGEITEM', 'CHARGELIST', 'INSTYPE'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'SEQ', 'DATE_SERV', 'CLINIC', 'CHARGEITEM', 'CHARGELIST', 'QUANTITY', 'INSTYPE', 'COST', 'PRICE', 'PAYPRICE', 'D_UPDATE'], 'string', 'max' => 100]
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
            'CHARGEITEM' => 'Chargeitem',
            'CHARGELIST' => 'Chargelist',
            'QUANTITY' => 'Quantity',
            'INSTYPE' => 'Instype',
            'COST' => 'Cost',
            'PRICE' => 'Price',
            'PAYPRICE' => 'Payprice',
            'D_UPDATE' => 'D  Update',
        ];
    }

    public function get_charg_opd($HOSPCODE = null, $PID = null, $SEQ = null) {
        $sql = "SELECT co.CLINIC,co.DATE_SERV,co.PRICE,i.CHARGEITEM_NAME,'OPD' AS TYPE
		FROM charge_opd co LEFT JOIN chargitem_opd i ON co.CHARGEITEM = i.CHARGEITEM_ID
		WHERE co.HOSPCODE = '$HOSPCODE' AND co.PID = '$PID' AND co.SEQ = '$SEQ' ";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
