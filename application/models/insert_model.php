<?php

class Insert_model extends CI_Model {

    function import_emp($file) {
        $this->db->truncate('psu_emp');
        $time = date('Y/m/d H:i:s');
        while (!feof($file)) {

            $rs = explode(",", fgets($file));
            if ($rs[0] != '') {
                $input = array('empid' => trim($rs[0])
                    , 'fullname' => trim($rs[1])
                    , 'role_desc' => trim($rs[2])
                    , 'level' => trim($rs[3])
                    , 'department' => trim($rs[4])
                    , 'createdate' => $time);
                $this->db->insert('psu_emp', $input);
            }
        }

        return true;
    }

    function import_member($file) {
        $crow = 0;
        $time = date('Y/m/d H:i:s');
        while (!feof($file)) {
            $rs = explode(",", fgets($file));
            if ($crow > 1) {
                $input = array('empid' => trim($rs[1])
                    , 'memberid' => trim($rs[0])
                    , 'member_year' => trim($rs[8])
                    , 'account_id' => trim($rs[9])
                    , 'updatedate' => $time);
                $this->db->where('empid', $input['empid']);
                $this->db->update('psu_emp', $input);
            }
            $crow++;
        }

        return true;
    }

    function import_insurance($file, $type) {

        $crow = 0;
        $time = date('Y/m/d H:i:s');
        $this->db->truncate('psu_insurance');
        while (!feof($file)) {
            $rs = explode(",", fgets($file));
            if ($crow > 1) {
                $input = array('empid' => trim($rs[0])
                    , 'role_desc' => trim($rs[14])
                    , 'level' => trim($rs[1])
                    , 'branch' => trim($rs[4]) // แยกกลุ่มย่อยตามภาค
                    , 'zone_id' => $type // แยกกลุ่มตามภาค
                    , 'account_id' => trim($rs[3])
                    , 'updatedate' => $time);
                $this->db->where('empid', $input['empid']);
                if ($this->db->update('psu_emp', $input)) {
                    $input2 = array('empid' => $rs[0]
                        , 'afee1' => trim($rs[5])
                        , 'afee2' => trim($rs[6])
                        , 'afee3' => trim($rs[7])
                        , 'afee4' => trim($rs[8])
                        , 'afee5' => trim($rs[9])
                        , 'afee6' => trim($rs[10])
                        , 'afee7' => trim($rs[11])
                        , 'afee8' => trim($rs[12])
                        , 'afee9' => trim($rs[13])
                        , 'year' => trim($rs[15])
                        , 'createdate' => $time);
                    $this->db->insert('psu_insurance', $input2);
                }
            }
            $crow++;
        }

        return true;
    }

    function import_insurance_other($file, $type) {

        $crow = 0;
        $time = date('Y/m/d H:i:s');
        $this->db->truncate('psu_insurance');
        while (!feof($file)) {
            $rs = explode(",", fgets($file));
            if ($crow > 1) {
                $input = array('empid' => trim($rs[4])
                    , 'role_desc' => trim($rs[14])
                    , 'level' => trim($rs[5])
                    , 'branch' => trim($rs[4]) // แยกกลุ่มย่อยตามภาค
                    , 'zone_id' => $type // แยกกลุ่มตามภาค
                    , 'account_id' => trim($rs[3])
                    , 'updatedate' => $time);
                $this->db->where('empid', $input['empid']);
                if ($this->db->update('psu_emp', $input)) {
                    $input2 = array('empid' => $rs[0]
                        , 'afee1' => trim($rs[5])
                        , 'afee2' => trim($rs[6])
                        , 'afee3' => trim($rs[7])
                        , 'afee4' => trim($rs[8])
                        , 'afee5' => trim($rs[9])
                        , 'afee6' => trim($rs[10])
                        , 'afee7' => trim($rs[11])
                        , 'afee8' => trim($rs[12])
                        , 'afee9' => trim($rs[13])
                        , 'year' => trim($rs[15])
                        , 'createdate' => $time);
                    $this->db->insert('psu_insurance', $input2);
                }
            }
            $crow++;
        }

        return true;
    }

}
?>