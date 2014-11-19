<?php

/**
 * Model		: Login_model
 *
 * Created by	: nuttanon
 * Date			: 2012-03-28
 *
 */
class select_model extends CI_Model {

    function get_filebypermission($empid = null, $zoneid = null, $page, $limit) {
        $strlimit = "";
        $strwhere = "";
        if ($page != null) {
            $strlimit = " LIMIT $page , $limit";
        }
        if ($empid != 0) {
            $strwhere = " AND find_in_set('$zoneid',permission_zone) <> 0";
        }
        $query = $this->db->query("SELECT a.* FROM `psu_files` a"
                . " where 1 = 1 "
                . $strwhere
                . $strlimit);
        return $query->result();
    }

    function get_memberbyid($empid) {


        $query = $this->db->query("SELECT * from psu_emp"
                . " where 1 = 1 AND empid = $empid");
        return $query->row();
    }

    function get_member($data = null, $page, $limit) {
        $strlimit = "";
        $strwhere = "";
        if ($page != null) {
            $strlimit .= " LIMIT $page , $limit";
        }
        if ($data['input_empid'] != null) {
            $strwhere .= " AND a.empid = '" . $data['input_empid'] . "'";
        }
        if ($data['input_firstname'] != null) {
            $strwhere .= " AND a.fullname like '%" . $data['input_firstname'] . "%'";
        }
        if ($data['input_lastname'] != null) {
            $strwhere .= " AND a.fullname like '%" . $data['input_lastname'] . "%'";
        }
        if ($data['input_role'] != null) {
            $strwhere .= " AND a.role = '" . $data['input_role'] . "'";
        }
        if ($data['input_level'] != null) {
            $strwhere .= " AND a.level = '" . $data['input_level'] . "'";
        }
        if ($data['input_branch'] != null && $data['chk'] == 'chk_mainbranch') {
            $strwhere .= " AND a.branch = '" . $data['input_branch'] . "'";
        }
        if ($data['input_zone'] != null && $data['chk'] == 'chk_branch') {
            $strwhere .= " AND a.zone_id = '" . $data['input_zone'] . "'";
            if ($data['input_subdepartment'] != '') {
                $strwhere .= " AND a.department = '" . $data['input_subdepartment'] . "'";
            }
        }
        if ($data['input_department'] != null && $data['chk'] == 'chk_department') {
            $strwhere .= " AND a.department = '" . $data['input_department'] . "'";
        }


        $query = $this->db->query("SELECT a.*,b.name as zonename from  (select * from psu_emp where memberid != 0 and memberid != '') a"
                . " inner join psu_zone b "
                . " on a.zone_id = b.id"
                . " where 1 = 1 "
                . $strwhere
                . $strlimit);
        return $query->result();
    }

    function get_member_paymet($data = null, $page, $limit) {
        $strlimit = "";
        $strwhere = "";
        if ($page != null) {
            $strlimit .= " LIMIT $page , $limit";
        }
        if ($data['input_empid'] != null) {
            $strwhere .= " AND a.empid = '" . $data['input_empid'] . "'";
        }
        if ($data['input_firstname'] != null) {
            $strwhere .= " AND a.fullname like '%" . $data['input_firstname'] . "%'";
        }
        if ($data['input_lastname'] != null) {
            $strwhere .= " AND a.fullname like '%" . $data['input_lastname'] . "%'";
        }


        $query = $this->db->query("SELECT a.*,b.name as zonename from  (select * from psu_emp where memberid != 0 and memberid != '') a"
                . " inner join psu_zone b "
                . " on a.zone_id = b.id"
                . " where 1 = 1 "
                . $strwhere
                . $strlimit);
        return $query->result();
    }

    function get_exportmember($data = null) {
        $strwhere = "";

        if ($data['input_empid'] != null) {
            $strwhere .= " AND a.empid = '" . $data['input_empid'] . "'";
        }
        if ($data['input_firstname'] != null) {
            $strwhere .= " AND a.fullname like '%" . $data['input_firstname'] . "%'";
        }
        if ($data['input_lastname'] != null) {
            $strwhere .= " AND a.fullname like '%" . $data['input_lastname'] . "%'";
        }
        if ($data['input_role'] != null) {
            $strwhere .= " AND a.role = '" . $data['input_role'] . "'";
        }
        if ($data['input_level'] != null) {
            $strwhere .= " AND a.level = '" . $data['input_level'] . "'";
        }
        if ($data['input_branch'] != null && $data['chk'] == 'chk_mainbranch') {
            $strwhere .= " AND a.branch = '" . $data['input_branch'] . "'";
        }
        if ($data['input_zone'] != null && $data['chk'] == 'chk_branch') {
            $strwhere .= " AND a.zone_id = '" . $data['input_zone'] . "'";
            if ($data['input_subdepartment'] != '') {
                $strwhere .= " AND a.department = '" . $data['input_subdepartment'] . "'";
            }
        }
        if ($data['input_department'] != null && $data['chk'] == 'chk_department') {
            $strwhere .= " AND a.department = '" . $data['input_department'] . "'";
        }


        //mysql_query('SET CHARACTER set tis620');
        //mysql_query('SET collation_connection =  "tis620_thai_ci"');

        $query = $this->db->query("SELECT a.empid as 'รหัสพนักงาน'"
                . ",a.memberid as 'รหัสสมาชิก'"
                . ",a.fullname as 'ชื่อ - สกุล'"
                . ",a.level as 'ระดับ'"
                . ",a.role_desc as 'ตำแหน่ง'"
                . ",a.account_id as 'เลขบัญชี'"
                . ",branch as 'สาขา'"
                . ",department as 'ภาค'"
                . ",payment_date as 'วันที่ชำระเงิน'"
                . "from  (select * from psu_emp where memberid != 0 and memberid != '') a"
                . " inner join psu_zone b "
                . " on a.zone_id = b.id"
                . " where 1 = 1 "
                . $strwhere);
        return $query;
    }

    function get_member_bycyteria($input_zone, $input_department, $page, $limit) {
        $strlimit = "";
        $strwhere = "";
        if ($page != null) {
            $strlimit = " LIMIT $page , $limit";
        }
        if ($input_zone != null) {
            $zone = $this->convertarryin($input_zone);
            $strwhere = " AND zone_id in ($zone)";
        }
        if ($input_department != null) {
            $department = $this->convertarryin($input_department);
            $strwhere .= " AND department in ($department)";
        }

        $query = $this->db->query("SELECT a.*,b.name as zonename from  (select * from psu_emp where memberid != 0 and memberid != '') a"
                . " inner join psu_zone b "
                . " on a.zone_id = b.id"
                . " where 1 = 1 "
                . $strwhere
                . $strlimit);
        $this->db->where_in('zone_id', $input_zone);
        $this->db->where_in('department', $input_department);
        return $query->result();
    }

    function get_zone() {
        $query = $this->db->query("select a.*,b.permission_name from psu_zone a"
                . " inner join psu_permission b "
                . " on a.permission_id = b.id");
        return $query->result();
    }

    function get_mainbranch() {
        $query = $this->db->query("select  distinct(branch) from psu_emp a"
                . " where a.zone_id = 0");
        return $query->result();
    }

    function get_file() {
        $query = $this->db->query("select * from psu_files order by id desc");
        return $query->result();
    }

    function get_filebyid($id) {
        $query = $this->db->query("select * from psu_files  where id = $id");
        return $query->row();
    }

    function get_empstatus() {
        $query = $this->db->query("select * from psu_emp_status ");
        return $query->result();
    }

    function get_summarybystatus($statusid, $month) {
        $query = $this->db->query("select count(*) as rs from  psu_emp a "
                . " where a.empstatus = $statusid"
                . " and MONTH(updatedate) = $month");
        return $query->row();
    }

    function get_summarybyzone($zoneid, $month) {
        $query = $this->db->query("select count(*) as rs from  psu_emp a "
                . " where a.zone_id = $zoneid"
                . " and MONTH(payment_date) = $month");
        return $query->row();
    }

    function get_permission() {
        $query = $this->db->query("select * from psu_permission ");
        return $query->result();
    }

    function get_zonebyid($id) {
        $query = $this->db->query("select * from  psu_zone where id = $id");
        return $query->row();
    }

    function get_departmentbyid($id) {
        $query = $this->db->query("select distinct(department) from  psu_emp where zone_id = $id");
        return $query->result();
    }

    function get_permissionbyid($id) {
        $query = $this->db->query("select * from psu_permission where id = $id");
        return $query->row();
    }

    function getexportnewmember() {
        $sql = "select a.name
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 1) as 'เดือน1'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 2) as 'เดือน2'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 3) as 'เดือน3'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 4) as 'เดือน4'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 5) as 'เดือน5'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 6) as 'เดือน6'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 7) as 'เดือน7'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 8) as 'เดือน8'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 9) as 'เดือน9'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 10) as 'เดือน10'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 11) as 'เดือน11'
,(select count(id) from psu_emp pa where pa.zone_id = a.id and memberid != 0 and MONTH(pa.payment_date) = 12) as 'เดือน12'
from psu_zone a";
        $query = $this->db->query($sql);
        return ($query);
    }

    function getexpiredmemberreport() {
        $sql = "select a.statusname
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 1) as 'เดือน1'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 2) as 'เดือน2'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 3) as 'เดือน3'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 4) as 'เดือน4'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 5) as 'เดือน5'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 6) as 'เดือน6'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 7) as 'เดือน7'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 8) as 'เดือน8'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 9) as 'เดือน9'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 10) as 'เดือน10'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 11) as 'เดือน11'
,(select count(id) from psu_emp pa where pa.empstatus = a.id and pa.memberid != 0 and MONTH(pa.updatedate) = 12) as 'เดือน12'
from psu_emp_status  a
where a.id != 0";
        $query = $this->db->query($sql);
        return ($query);
    }

    function get_member_insurance($empid) {
        $query = $this->db->query("select a.*"
                . ",b.id as bid"
                . ",b.afee1"
                . ",b.afee2"
                . ",b.afee3"
                . ",b.afee4"
                . ",b.afee5"
                . ",b.afee6"
                . ",b.afee7"
                . ",b.afee8"
                . ",b.afee9"
                . ",b.year as byear"
                . ",c.statusname"
                . ",d.name as zonename from  psu_emp a "
                . " inner join  psu_insurance b "
                . " on a.empid = b.empid"
                . " inner join psu_emp_status c"
                . " on a.empstatus = c.id"
                . " inner join psu_zone d"
                . " on a.zone_id = d.id"
                . " where a.empid = $empid ");
        return $query->row();
    }

    function get_department_by_zone($zoneid) {
        $query = $this->db->query("select distinct(a.department) from psu_emp a inner join psu_insurance b on a.empid = b.empid"
                . " where a.memberid != 0 and memberid != '' and  a.zone_id in($zoneid)");
        return $query->result();
    }

    function get_insurance($id) {
        $query = $this->db->query("select * from psu_insurance a where a.id  = $id");
        return $query->row();
    }

    function convertarryin($mIds) {
        $mIds_size = count($mIds);
        $i = 1;
        $mechanicIds = '';
        foreach ($mIds as $row) {
            if ($i == $mIds_size) {
                $mechanicIds .= "'" . $row . "'";
            } else {
                $mechanicIds .= "'" . $row . "'" . ', ';
            }
            $i++;
        }

        return $mechanicIds;
    }

}

?>