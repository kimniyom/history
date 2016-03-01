<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "charge_ipd".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $AN
 * @property string $DATETIME_ADMIT
 * @property string $WARDSTAY
 * @property string $CHARGEITEM
 * @property string $CHARGELIST
 * @property string $QUANTITY
 * @property string $INSTYPE
 * @property string $COST
 * @property string $PRICE
 * @property string $PAYPRICE
 * @property string $D_UPDATE
 */
class ChargeIpd extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'charge_ipd';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['HOSPCODE', 'PID', 'AN', 'CHARGEITEM', 'CHARGELIST'], 'required'],
            [['HOSPCODE'], 'string', 'max' => 9],
            [['PID', 'AN', 'DATETIME_ADMIT', 'WARDSTAY', 'CHARGEITEM', 'CHARGELIST', 'QUANTITY', 'INSTYPE', 'COST', 'PRICE', 'PAYPRICE', 'D_UPDATE'], 'string', 'max' => 100]
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

    public function get_charg_ipd($HOSPCODE = null, $PID = null, $AN = null) {
        $sql = "SELECT co.WARDSTAY AS CLINIC,co.DATETIME_ADMIT AS DATE_SERV,co.PRICE,i.CHARGEITEM_NAME,'OPD' AS TYPE
		FROM charge_ipd co LEFT JOIN chargitem_ipd i ON co.CHARGEITEM = i.CHARGEITEM_ID
		WHERE co.HOSPCODE = '$HOSPCODE' AND co.PID = '$PID' AND co.AN = '$AN' ";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}
