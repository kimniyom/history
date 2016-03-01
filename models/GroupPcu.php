<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_pcu".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $hospcode
 * @property string $create_date
 *
 * @property GroupUser $group
 */
class GroupPcu extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'group_pcu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['group_id'], 'integer'],
            [['create_date'], 'safe'],
            [['hospcode'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'group_id' => 'รหัสกลุ่ม',
            'hospcode' => 'รหัสสถานบริการ',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup() {
        return $this->hasOne(GroupUser::className(), ['id' => 'group_id']);
    }

    public function get_pcu_ingroup($id = null) {
        $sql = "SELECT o.*  FROM group_pcu g INNER JOIN co_office o ON g.hospcode = o.off_id WHERE g.group_id = '$id' ";
        $pcu = \Yii::$app->db->createCommand($sql)->queryAll();
        return $pcu;
    }

    public function get_pcu_outgroup($id = null) {
        $sql = "SELECT hospcode  FROM group_pcu WHERE group_id = '$id' ";
        $pcu = \Yii::$app->db->createCommand($sql)->queryAll();
        $pcuIn = array();
        foreach ($pcu as $rs):
            $pcuIn[] = "'" . $rs['hospcode'] . "'";
        endforeach;
        $inGroup = implode(",", $pcuIn);

        if (!empty($inGroup)) {
            $group = $inGroup;
        } else {
            $group = "''";
        }
        $sql2 = "SELECT *  FROM co_office WHERE off_id NOT IN ($group) ORDER BY distid,off_id";
        $pcuOutgroup = \Yii::$app->db->createCommand($sql2)->queryAll();

        return $pcuOutgroup;
    }

    public function count_pcu($groupId = null) {
        $sql = "SELECT COUNT(*) AS TOTAL FROM group_pcu WHERE group_id = '$groupId' ";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['TOTAL'];
    }

}
