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
        $data['view'] = 'importdata/importemp';
        $this->load->view('template/masterpage', $data);
    }

    public function importemp() {

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

                if ($this->insert_model->import_emp($file)) {
                    $data['result'] = 'success';
                }
            }
        }
        $data['view'] = 'importdata/importemp';
        $this->load->view('template/masterpage', $data);
    }

    public function importmember() {

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

                if ($this->insert_model->import_member($file)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importmember';
        $this->load->view('template/masterpage', $data);
    }

    public function importins1() {

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

                if ($this->insert_model->import_insurance($file, 1)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importins1';
        $this->load->view('template/masterpage', $data);
    }

    public function importins2() {

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

                if ($this->insert_model->import_insurance_other($file, 2)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importins2';
        $this->load->view('template/masterpage', $data);
    }

    public function importins3() {

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

                if ($this->insert_model->import_insurance_other($file, 3)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importins3';
        $this->load->view('template/masterpage', $data);
    }

    public function importins4() {

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

                if ($this->insert_model->import_insurance_other($file, 4)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importins4';
        $this->load->view('template/masterpage', $data);
    }

    public function importins5() {

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

                if ($this->insert_model->import_insurance_other($file, 5)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importins5';
        $this->load->view('template/masterpage', $data);
    }

    public function importins6() {

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

                if ($this->insert_model->import_insurance_other($file, 6)) {
                    $data['result'] = 'success';
                }
            }
        }

        $data['view'] = 'importdata/importins6';
        $this->load->view('template/masterpage', $data);
    }

}
