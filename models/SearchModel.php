<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchModel extends Model {

    //หารายชื่อคน
    function PatientSearch($cid = '', $name = '', $surname = '') {
        $where = "";

        if (strlen($cid) > 0)
            $where .= " AND (p1.CID = '$cid' OR p1.PID = '$cid')";
        if (strlen($name) > 0)
            $where .= " AND p1.name LIKE '" . $name . "%'";
        if (strlen($surname) > 0)
            $where .= " AND p1.lname LIKE '" . $surname . "%'";

        $sql = "SELECT 
                p1.CID,
                p1.PID,
                CONCAT(
                  IFNULL(mp1.NAME, ''),
                  IFNULL(p1.NAME, ''),
                  ' ',
                  IFNULL(p1.LNAME, '')
                ) AS PERSONNAME,
                p1.SEX,
                YEAR(FROM_DAYS(DATEDIFF(CURDATE(), birth))) AS AGE
              FROM
                person p1 
                INNER JOIN service s 
                  ON s.HOSPCODE = p1.HOSPCODE 
                  AND s.PID = p1.PID 
                LEFT JOIN co_office o 
                  ON o.off_id = p1.HOSPCODE 
                LEFT JOIN mas_prename mp1 
                  ON p1.PRENAME = mp1.PRENAMECODE 
              WHERE 1=1  $where
              GROUP BY CID
              ORDER BY PERSONNAME";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
        //return $sql;
    }

    //ประวัติการไปรับบริการทุกที่
    function GetService($cid) {
        $sql = "SELECT CID,s.HOSPCODE,off_name AS HOSPNAME,s.PID,s.SEQ,DATE_SERV,TIME_SERV,LOCATION,s.INSTYPE,
                INSID,s.TYPEIN,CHIEFCOMP,BTEMP,SBP,DBP,PR,RR,TYPEOUT,s.PRICE,s.ACTUALPAY,s.PAYPRICE,IF(a.PID IS NULL,0,1) AS ADMIS
                FROM person p
                INNER JOIN service s ON s.HOSPCODE = p.HOSPCODE AND s.PID = p.PID
                LEFT JOIN admission a ON a.HOSPCODE = s.HOSPCODE AND a.PID = s.PID AND a.SEQ = s.SEQ
                LEFT JOIN co_office o ON o.off_id = s.HOSPCODE
                WHERE CID = '$cid'
                ORDER BY DATE_SERV DESC";

        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    //ข้อมูลพื้นฐาน
    function GetPersonInfo($cid) {
        $sql = "SELECT CID,
            p.HOSPCODE,
            p.PID,
            p.HID,
            CONCAT(IFNULL(mp.NAME, ''),IFNULL(p.NAME, ''),' ',IFNULL(p.LNAME, '')) AS PERSONNAME,
            IF(SEX = '1','ชาย','หญิง') AS SEX,
                BIRTH,
                mstatus_desc AS MSTATUS,
                OCCUPATION_NEW AS OCCUPA,
                RACE,
                NATION,
                DISCHARGE,
                YEAR(FROM_DAYS(DATEDIFF(CURDATE(), birth))) AS AGE,
                CASE p.ABOGROUP 
			WHEN '1' THEN 'A'
			WHEN '2' THEN 'B' 
			WHEN '3' THEN 'AB'
			WHEN '4' THEN 'O'
		END AS BLOOD,
		p.TYPEAREA
                FROM person p
                LEFT JOIN mas_prename mp ON p.PRENAME = mp.PRENAMECODE 
                LEFT JOIN co_maritalstatus ms ON ms.mstatus_code = p.MSTATUS
                WHERE p.CID = '$cid' ORDER BY p.D_UPDATE DESC LIMIT 1";

        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

    //ข้อมูลวินิจฉัย
    function GetDiag($hospCode, $pid, $seq) {
        $sql = "SELECT d.DIAGCODE,DIAG_THAI_NAME AS DIAGNAME,mc.CLINIC_SHORT_NAME AS CLINIC,
                DIAGTYPE_DESC AS DIAGTYPE,CONCAT(PRENAME,NAME,' ',LNAME) AS PROVIDER 
                FROM diagnosis_opd d
                LEFT JOIN mas_diag md ON md.DIAGCODE = d.DIAGCODE
                LEFT JOIN mas_diagtype dt ON dt.DIAGTYPE_CODE = d.DIAGTYPE
                LEFT JOIN mas_clinic mc ON mc.CLINIC = SUBSTRING(d.CLINIC,2,2)
                LEFT JOIN provider pv ON pv.HOSPCODE = d.HOSPCODE AND pv.PROVIDER = d.PROVIDER
                WHERE d.HOSPCODE = '" . $hospCode . "' AND d.PID = '" . $pid . "' AND d.SEQ = '" . $seq . "'
                ORDER BY d.DIAGTYPE,d.DIAGCODE";

        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
        //return $sql;
    }

    //ข้อมูลรายละเอียดการรับบริการ
    function GetServiceDetail($hospCode, $cid, $seq) {
        $sql = "SELECT p.HN,s.HOSPCODE,off_name AS HOSPNAME,s.PID,SEQ,DATE_SERV,TIME_SERV,LOCATION,INSTYPE,INSID,TYPEIN,CHIEFCOMP,BTEMP,SBP,DBP,PR,RR,TYPEOUT,PRICE,ACTUALPAY,PAYPRICE 
                    FROM person p
                    INNER JOIN service s ON s.HOSPCODE = p.HOSPCODE AND s.PID = p.PID
                    LEFT JOIN co_office o ON o.off_id = s.HOSPCODE
                    WHERE s.HOSPCODE = '$hospCode' AND p.CID = '$cid' AND s.SEQ = '$seq' ";
        $result = \Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }

}
