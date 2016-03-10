<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_open".
 *
 * @property integer $id
 * @property string $person_cid
 * @property integer $owner
 * @property string $create_date
 */
class LogOpen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_open';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner'], 'integer'],
            [['create_date'], 'safe'],
            [['person_cid'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_cid' => 'Person Cid',
            'owner' => 'Owner',
            'create_date' => 'Create Date',
        ];
    }

    public function Getlog($userId = null){
        $sql = "SELECT l.*,p.NAME,p.LNAME
                FROM log_open l INNER JOIN person p ON l.person_cid = p.cid
                WHERE l.owner = '$userId'
                ORDER BY id DESC LIMIT 100";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
