<?php

class update_model extends CI_Model {

    function update_ins($input) {
        $this->db->where('id', $input['id']);
        if ($this->db->update('psu_insurance', $input)):
            $this->db->close();
            return true;
        else:
            return false;
        endif;
    }

    function update_emp($input) {
        $this->db->where('empid', $input['empid']);
        if ($this->db->update('psu_emp', $input)):
            $this->db->close();
            return true;
        else:
            return false;
        endif;
    }
    
      function update_zone($input) {
        $this->db->where('id', $input['id']);
        if ($this->db->update('psu_zone', $input)):
            $this->db->close();
            return true;
        else:
            return false;
        endif;
    }
    
    
     function editfile($input) {
        $this->db->where('id', $input['id']);
        if ($this->db->update('psu_files', $input)):
            $this->db->close();
            return true;
        else:
            return false;
        endif;
    }
         function delete_permission($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('psu_permission')):
            return true;
        else:
            return false;
        endif;
    }

}

?>