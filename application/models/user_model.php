<?php

class user_model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    function getauthen($input) {
        $username = trim($input['username']);
        $password = md5(trim($input['password']));
        $query = $this->db->query("SELECT  * FROM psu_user a  "
                . " inner join psu_permission b"
                . " on a.permission_group = b.id"
                . " WHERE a.username = '$username' "
                . " AND a.password = '$password'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $expires = ( 60 * 60 * 24 * 365) / 12;
            $user['user_id'] = $row->id;
            $user['user_empid'] = 0;
            $user['user_zoneid'] = 0;
            $user['user_name'] = $row->username;
            $user['user_fullname'] = $row->fullname;
            $user['user_permissionid'] = $row->permission_group;
            $user['user_createdate'] = $row->createdate;

            $user['issuperuser'] = $row->permission_issuperuser == 1 ? TRUE : FALSE;
            $user['isadmin'] = $row->permission_isadmin == 1 ? TRUE : FALSE;
            $user['isview'] = $row->permission_isview == 1 ? TRUE : FALSE;
            $user['isedit'] = $row->permission_isedit == 1 ? TRUE : FALSE;
            $user['isdownload'] = $row->permission_isdownload == 1 ? TRUE : FALSE;
            $user['isemp'] = false;

            $user = $this->encrypt->encode(serialize($user));
            set_cookie('user_account', $user, $expires);

            //$this->login_stamp($row->id);
            $this->db->close();
            return true;
        } else {
            $query = $this->db->query("SELECT  * FROM psu_emp a  "
                    . " inner join psu_permission b"
                    . " on a.user_permission = b.id"
                    . " WHERE a.empid = '$username' "
                    . " AND a.password = '$password'");

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $expires = ( 60 * 60 * 24 * 365) / 12;
                $user['user_id'] = $row->id;
                $user['user_empid'] = $row->empid;
                $user['user_zoneid'] = $row->zone_id;
                $user['user_name'] = $row->empid;
                $user['user_fullname'] = $row->fullname;
                $user['user_permissionid'] = $row->user_permission;
                $user['user_createdate'] = $row->createdate;

                $user['issuperuser'] = $row->permission_issuperuser == 1 ? TRUE : FALSE;
                $user['isadmin'] = $row->permission_isadmin == 1 ? TRUE : FALSE;
                $user['isview'] = $row->permission_isview == 1 ? TRUE : FALSE;
                $user['isedit'] = $row->permission_isedit == 1 ? TRUE : FALSE;
                $user['isdownload'] = $row->permission_isdownload == 1 ? TRUE : FALSE;
                $user['isemp'] = true;

                $user = $this->encrypt->encode(serialize($user));
                set_cookie('user_account', $user, $expires);

                //$this->login_stamp($row->id);
                $this->db->close();
                return true;
            } else {
                return false;
            }
        }
    }

    function login_stamp($user_id) {
        $time = date('d/m/Y H:i:s');
        $sql = "UPDATE psu_user SET user_lastlogout = to_date('$time','dd/mm/yyyy HH24:MI:SS') WHERE id = $user_id";
        $this->db->query($sql);
        $this->db->close();
    }

    function logout() {
        $time = date('d/m/Y H:i:s');
        $user_account = $this->get_account_cookie();
        $this->load->helper(array('cookie'));
        delete_cookie('user_account');
    }

    function is_login() {
        $user = $this->get_account_cookie();
        if (!isset($user['user_name']) || !isset($user['user_id'])) {
            return false;
        } else
        if ($this->get_by_id($user['user_id']) != false)
            return true;
        else
            return false;
    }

    function get_account_cookie() {
        // get cookie
        $c_account = get_cookie('user_account', true);
        if ($c_account != null) {
            $c_account = $this->encrypt->decode($c_account);
            $c_account = @unserialize($c_account);
            return $c_account;
        }
        return null;
    }

    function get_by_id($id) {
        $user_account = $this->get_account_cookie();
        if (!$user_account['isemp']) {
            $query = $this->db->query("SELECT * FROM psu_user  WHERE id = '$id'");
        }
        else{
             $query = $this->db->query("SELECT * FROM psu_emp  WHERE id = '$id'");
        }
        $this->db->close();
        return $query;
    }

}

?>