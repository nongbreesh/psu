<?php

class user_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper(array('cookie', 'url'));
        $this->db = $this->load->database('default', TRUE);
    }


    public function storeUser($input) {
        //$id = $this->db->insert_id();
        $query = $this->db->query("SELECT  * from gcm_user   WHERE gcm_regid = '" . $input['gcm_regid'] . "'");
        $result = $query->row();
        if (count($result) == 0) {
            if ($this->db->insert('gcm_user', $input)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}
