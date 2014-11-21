<?php

class Insert_model extends CI_Model {

    function import_emp($dataset, $from, $to) {
        $time = date('Y/m/d H:i:s');
        for ($i = $from; $i <= $to; $i++) {
            if ($i != 0) {
                if (!empty($dataset[$i])) {
                    $input = array('empid' => trim($dataset[$i]['empid'])
                        , 'fullname' => trim($dataset[$i]['fullname'])
                        , 'role_desc' => trim($dataset[$i]['role_desc'])
                        , 'level' => trim($dataset[$i]['level'])
                        , 'department' => trim($dataset[$i]['department'])
                        , 'createdate' => $time);
                    if ($this->getemp_byeempid($input['empid']) > 0) {
                        $this->db->where('empid', $input['empid']);
                        $this->db->update('psu_emp', $input);
                    } else {
                        $this->db->insert('psu_emp', $input);
                    }
                }
            }
        }

        return true;
    }

    function import_member($dataset, $from, $to) {

        $time = date('Y/m/d H:i:s');
        for ($i = $from; $i <= $to; $i++) {
            if ($i != 0) {
                if (!empty($dataset[$i])) {
                    $input = array('empid' => trim($dataset[$i]['empid'])
                        , 'memberid' => trim($dataset[$i]['memberid'])
                        , 'member_year' => trim($dataset[$i]['member_year'])
                        , 'account_id' => trim($dataset[$i]['account_id'])
                        , 'updatedate' => $time);
                    $this->db->where('empid', $dataset[$i]['empid']);
                    $this->db->update('psu_emp', $input);
                }
            }
        }
        return true;
    }

    function import_insurance($dataset, $from, $to) {

        $time = date('Y/m/d H:i:s');
        for ($i = $from; $i <= $to; $i++) {
            if ($i != 0) {
                if (!empty($dataset[$i])) {
                    $input = array('empid' => trim($dataset[$i]['empid'])
                        , 'role_desc' => trim($dataset[$i]['role_desc'])
                        , 'level' => trim($dataset[$i]['level'])
                        , 'branch' => trim($dataset[$i]['branch'])
                        , 'zone_id' => trim($dataset[$i]['zone_id'])
                        , 'account_id' => trim($dataset[$i]['account_id'])
                        , 'updatedate' => $time);
                    $this->db->where('empid', $input['empid']);

                    if ($this->db->update('psu_emp', $input)) {
                        $input2 = array('empid' => trim($dataset[$i]['empid'])
                            , 'afee1' => trim($dataset[$i]['afee1'])
                            , 'afee2' => trim($dataset[$i]['afee2'])
                            , 'afee3' => trim($dataset[$i]['afee3'])
                            , 'afee4' => trim($dataset[$i]['afee4'])
                            , 'afee5' => trim($dataset[$i]['afee5'])
                            , 'afee5' => trim($dataset[$i]['afee5'])
                            , 'afee7' => trim($dataset[$i]['afee7'])
                            , 'afee8' => trim($dataset[$i]['afee8'])
                            , 'afee8' => trim($dataset[$i]['afee8'])
                            , 'year' => trim($dataset[$i]['year'])
                            , 'createdate' => $time);
                        if ($this->getinsurance_byempid($dataset[$i]['empid']) > 0) {
                            $this->db->where('empid', $input2['empid']);
                            $this->db->update('psu_insurance', $input2);
                        } else {
                            $this->db->insert('psu_insurance', $input2);
                        }
                    }
                }
            }
        }

        return true;
    }

    function import_insurance_other($dataset, $from, $to) {
        $time = date('Y/m/d H:i:s');
        for ($i = $from; $i <= $to; $i++) {
            if ($i != 0) {
                if (!empty($dataset[$i])) {
                    $input = array('empid' => trim($dataset[$i]['empid'])
                        , 'level' => trim($dataset[$i]['level'])
                        , 'branch' => trim($dataset[$i]['branch'])
                        , 'zone_id' => trim($dataset[$i]['zone_id'])
                        , 'account_id' => trim($dataset[$i]['account_id'])
                        , 'updatedate' => $time);
                    $this->db->where('empid', $input['empid']);
                    if ($this->db->update('psu_emp', $input)) {

                        $input2 = array('empid' => trim($dataset[$i]['empid'])
                            , 'afee1' => trim($dataset[$i]['afee1'])
                            , 'afee2' => trim($dataset[$i]['afee2'])
                            , 'afee3' => trim($dataset[$i]['afee3'])
                            , 'afee4' => trim($dataset[$i]['afee4'])
                            , 'afee5' => trim($dataset[$i]['afee5'])
                            , 'afee6' => trim($dataset[$i]['afee6'])
                            , 'afee7' => trim($dataset[$i]['afee7'])
                            , 'afee8' => trim($dataset[$i]['afee8'])
                            , 'afee9' => trim($dataset[$i]['afee9'])
                            , 'year' => trim($dataset[$i]['year'])
                            , 'createdate' => $time);

                        if ($this->getinsurance_byempid($dataset[$i]['empid']) > 0) {
                            $this->db->where('empid', $input2['empid']);
                            $this->db->update('psu_insurance', $input2);
                        } else {
                            $this->db->insert('psu_insurance', $input2);
                        }
                    }
                }
            }
        }

        return true;
    }

    function getinsurance_byempid($empid) {
        $query = $this->db->query("SELECT * from psu_insurance where empid = '$empid'");
        return $query->num_rows();
    }

    function getemp_byeempid($empid) {
        $query = $this->db->query("SELECT * from psu_emp where empid = '$empid'");
        return $query->num_rows();
    }

    function addfile($input) {
        if ($this->db->insert('psu_files', $input)):
            return true;
        else:
            return false;
        endif;
    }
    
     function insert_permission($input) {
        if ($this->db->insert('psu_permission', $input)):
            return true;
        else:
            return false;
        endif;
    }
    

}

?>