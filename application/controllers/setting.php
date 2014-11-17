<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helpers('url_helper');
    }

    function getJsondata($url) {
        header('Content-type: application/json');
        $Data = json_decode(file_get_contents($url), true);
        return $Data;
    }

    function getJsondatafromString($contents) {
        header('Content-type: application/json');
        $Data = json_decode($contents, true);
        return $Data;
    }

    public function index() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
    }

    public function filepermissionsetting() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }

        if ($_POST) {
            if ($this->input->post('input_addfile') != '') {
                echo 'xxx';
                $time = date('Y/m/d H:i:s');
                $file = $_FILES["input_file"];
                $input_filename = $this->upload_file($file);

                $input_permission_zone = "";
                foreach ($this->input->post('input_zone') as $each) {
                    $input_permission_zone .= $each . ",";
                }
                $input_permission_zone = rtrim($input_permission_zone, ',');
                $input = array(
                    'filename' => $input_filename
                    , 'filepath' => $input_filename
                    , 'permission_zone' => $input_permission_zone
                    , 'createdate' => $time
                );
                if ($this->insert_model->addfile($input)) {
                    $data['result'] = true;
                }
            }

            if ($this->input->post('input_editfile') != '') {
                $time = date('Y/m/d H:i:s');
                $file = $_FILES["input_file"];
                if ($file['name'] != '') {
                    $input_filename = $this->upload_file($file);
                } else {
                    $input_filename = $this->input->post('file_name');
                }
                $file_id = $this->input->post('file_id');
                $input_permission_zone = "";
                foreach ($this->input->post('input_zone') as $each) {
                    $input_permission_zone .= $each . ",";
                }
                $input_permission_zone = rtrim($input_permission_zone, ',');
                $input = array(
                    'id' => $file_id
                    , 'filename' => $input_filename
                    , 'filepath' => $input_filename
                    , 'permission_zone' => $input_permission_zone
                    , 'createdate' => $time
                );
                if ($this->update_model->editfile($input)) {
                    $data['result'] = true;
                }
            }
        }

        $data['menu'] = "setting";
        $data['view'] = 'setting/filepermissionsetting';
        $data['zone'] = $this->select_model->get_zone();
        $data['files'] = $this->select_model->get_file();
        $this->load->view('template/masterpage', $data);
    }

    function upload_file($file) {
        $this->load->library('upload');

        if (trim($file["tmp_name"]) != "") {
            copy($file["tmp_name"], "./public/uploads/" . $file["name"]);
        }
        return $file["name"];
    }

    function getfile($id) {
        $data['result'] = $this->select_model->get_filebyid($id);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function memberpermissionsetting() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        if ($_POST) {
            $input_name = $this->input->post('input_name');
            $isview = $this->input->post('input_isview') == '' ? '0' : '1';
            $isedit = $this->input->post('input_isedit') == '' ? '0' : '1';
            $isdownload = $this->input->post('input_isdownload') == '' ? '0' : '1';
            $isadmin = $this->input->post('input_isadmin') == '' ? '0' : '1';
            $input = array('permission_name' => $input_name
                , 'permission_isview' => $isview
                , 'permission_isedit' => $isedit
                , 'permission_isdownload' => $isdownload
                , 'permission_isadmin' => $isadmin);
            $this->insert_model->insert_permission($input);
        }
        $data['menu'] = "setting";
        $data['view'] = 'setting/memberpermissionsetting';
        $data['zone'] = $this->select_model->get_zone();
        $data['permissions'] = $this->select_model->get_permission();
        $this->load->view('template/masterpage', $data);
    }

    function remove_permission($id) {
        if ($this->update_model->delete_permission($id)) {
            redirect(base_url() . 'setting/memberpermissionsetting');
        }
    }

    function getpermissionbyid($id) {
        $data['result'] = $this->select_model->get_permissionbyid($id);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function getzonebyid($id) {
        $data['result'] = $this->select_model->get_zonebyid($id);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function grouppermissionsetting() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }

        if ($_POST) {
            $zone_id = $this->input->post('zone_id');
            $input_permission = $this->input->post('input_permission');
            $input = array('id' => $zone_id
                , 'permission_id' => $input_permission);

            if ($this->update_model->update_zone($input)) {
                $data['result'] = true;
            }
        }


        $data['menu'] = "setting";
        $data['view'] = 'setting/grouppermissionsetting';
        $data['zone'] = $this->select_model->get_zone();
        $data['permission'] = $this->select_model->get_permission();
        $this->load->view('template/masterpage', $data);
    }

}
