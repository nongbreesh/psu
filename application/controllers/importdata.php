<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Importdata extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helpers('url_helper');
        $this->load->model('select_model');
        $this->load->model('user_model');
        $this->load->model('insert_model');
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
        $data['view'] = 'importdata/importemp';
        $this->load->view('template/masterpage', $data);
    }

    public function importemp() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                /* $file_data = $this->upload->data();
                  $file_path = './uploads/' . $file_data['file_name'];
                  $file = fopen($file_path, "r");

                  if ($this->insert_model->import_emp($file)) {
                  $data['result'] = 'success';
                  } */


                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => trim($rs[0])
                            , 'fullname' => trim($rs[1])
                            , 'role_desc' => trim($rs[2])
                            , 'level' => trim($rs[3])
                            , 'department' => trim($rs[4]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_emp($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }
        $data['view'] = 'importdata/importemp';
        $this->load->view('template/masterpage', $data);
    }

    public function importmember() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['result'] = '';
        $data['menu'] = "setting";
        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));

                    if ($rs[0] != '') {
                        $s = trim($rs[10]);
                        $date = strtotime($s);
                        // if (trim($rs[8]) <= 10) {
                        $input = array('empid' => trim($rs[1])
                            , 'memberid' => trim($rs[0])
                            , 'member_year' => trim($rs[8])
                            , 'payment_date' => date('Y/m/d H:i:s', $date) // รอ
                            , 'account_id' => trim($rs[9]));
                        array_push($dataset, $input);
                        //}
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_member($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importmember';
        $this->load->view('template/masterpage', $data);
    }

    public function importins1() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                /* $file_data = $this->upload->data();
                  $file_path = './uploads/' . $file_data['file_name'];
                  $file = fopen($file_path, "r");

                  if ($this->insert_model->import_insurance($file, 1)) {
                  $data['result'] = 'success';
                  }

                 */
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => $rs[0]
                            , 'level' => trim($rs[1])
                            , 'branch' => trim($rs[4]) // แยกกลุ่มย่อยตามภาค
                            , 'zone_id' => 1 // แยกกลุ่มตามภาค
                            , 'account_id' => trim($rs[3])
                            , 'afee1' => trim($rs[5])
                            , 'afee2' => trim($rs[6])
                            , 'afee3' => trim($rs[7])
                            , 'afee4' => trim($rs[8])
                            , 'afee5' => trim($rs[9])
                            , 'afee6' => trim($rs[10])
                            , 'afee7' => trim($rs[11])
                            , 'afee8' => trim($rs[12])
                            , 'afee9' => trim($rs[13])
                            , 'year' => trim($rs[15]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_insurance($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importins1';
        $this->load->view('template/masterpage', $data);
    }

    public function importins2() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => trim($rs[4])
                            
                            , 'level' => trim($rs[5])
                            , 'account_id' => trim($rs[0])
                            , 'branch' => trim($rs[6]) // แยกกลุ่มย่อยตามภาค
                            , 'zone_id' => 2 // แยกกลุ่มตามภาค
                            , 'afee1' => trim($rs[5])
                            , 'afee2' => trim($rs[6])
                            , 'afee3' => trim($rs[7])
                            , 'afee4' => trim($rs[8])
                            , 'afee5' => trim($rs[9])
                            , 'afee6' => trim($rs[10])
                            , 'afee7' => trim($rs[11])
                            , 'afee8' => trim($rs[12])
                            , 'afee9' => trim($rs[13])
                            , 'year' => trim($rs[15]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_insurance_other($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importins2';
        $this->load->view('template/masterpage', $data);
    }

    public function importins3() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => trim($rs[4])
                            
                            , 'level' => trim($rs[5])
                            , 'account_id' => trim($rs[0])
                            , 'branch' => trim($rs[6]) // แยกกลุ่มย่อยตามภาค
                            , 'zone_id' => 3 // แยกกลุ่มตามภาค
                            , 'afee1' => trim($rs[5])
                            , 'afee2' => trim($rs[6])
                            , 'afee3' => trim($rs[7])
                            , 'afee4' => trim($rs[8])
                            , 'afee5' => trim($rs[9])
                            , 'afee6' => trim($rs[10])
                            , 'afee7' => trim($rs[11])
                            , 'afee8' => trim($rs[12])
                            , 'afee9' => trim($rs[13])
                            , 'year' => trim($rs[15]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_insurance_other($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importins3';
        $this->load->view('template/masterpage', $data);
    }

    public function importins4() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => trim($rs[4])
                            
                            , 'level' => trim($rs[5])
                            , 'account_id' => trim($rs[0])
                            , 'branch' => trim($rs[6]) // แยกกลุ่มย่อยตามภาค
                            , 'zone_id' => 4 // แยกกลุ่มตามภาค
                            , 'afee1' => trim($rs[5])
                            , 'afee2' => trim($rs[6])
                            , 'afee3' => trim($rs[7])
                            , 'afee4' => trim($rs[8])
                            , 'afee5' => trim($rs[9])
                            , 'afee6' => trim($rs[10])
                            , 'afee7' => trim($rs[11])
                            , 'afee8' => trim($rs[12])
                            , 'afee9' => trim($rs[13])
                            , 'year' => trim($rs[15]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_insurance_other($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importins4';
        $this->load->view('template/masterpage', $data);
    }

    public function importins5() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => trim($rs[4])
                            
                            , 'level' => trim($rs[5])
                            , 'account_id' => trim($rs[0])
                            , 'branch' => trim($rs[6]) // แยกกลุ่มย่อยตามภาค
                            , 'zone_id' => 5 // แยกกลุ่มตามภาค
                            , 'afee1' => trim($rs[5])
                            , 'afee2' => trim($rs[6])
                            , 'afee3' => trim($rs[7])
                            , 'afee4' => trim($rs[8])
                            , 'afee5' => trim($rs[9])
                            , 'afee6' => trim($rs[10])
                            , 'afee7' => trim($rs[11])
                            , 'afee8' => trim($rs[12])
                            , 'afee9' => trim($rs[13])
                            , 'year' => trim($rs[15]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_insurance_other($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importins5';
        $this->load->view('template/masterpage', $data);
    }

    public function importins6() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "setting";
        $data['result'] = '';

        if ($_POST) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10000000';
            $this->load->library('upload', $config);
// If upload failed, display error
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
                $file = fopen($file_path, "r");

                $dataset = array();
                while (!feof($file)) {
                    $rs = explode(",", fgets($file));
                    if ($rs[0] != '') {
                        $input = array('empid' => trim($rs[4])
                            
                            , 'level' => trim($rs[5])
                            , 'account_id' => trim($rs[0])
                            , 'branch' => trim($rs[6]) // แยกกลุ่มย่อยตามภาค
                            , 'zone_id' => 6 // แยกกลุ่มตามภาค
                            , 'afee1' => trim($rs[5])
                            , 'afee2' => trim($rs[6])
                            , 'afee3' => trim($rs[7])
                            , 'afee4' => trim($rs[8])
                            , 'afee5' => trim($rs[9])
                            , 'afee6' => trim($rs[10])
                            , 'afee7' => trim($rs[11])
                            , 'afee8' => trim($rs[12])
                            , 'afee9' => trim($rs[13])
                            , 'year' => trim($rs[15]));
                        array_push($dataset, $input);
                    }
                }

                $rscount = count($dataset);
                $i = 0;
                while ($i < $rscount) {
                    $from = $i;
                    $to = $i = $i + 1000;
                    $this->insert_model->import_insurance_other($dataset, $from, $to);
                    //echo 'imported rows : ' . $from . ' ' . $to;
                }
                $data['result'] = 'success';
            }
        }

        $data['view'] = 'importdata/importins6';
        $this->load->view('template/masterpage', $data);
    }

}
