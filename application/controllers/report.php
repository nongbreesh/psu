<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helpers('url_helper');
        $this->load->helpers('csv_helper');
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
        $data['menu'] = "report";

        $data['view'] = 'report/index';
        $this->load->view('template/masterpage', $data);
    }

    public function getnewmemberreport() {

        $result = $this->select_model->getexportnewmember();
        $time = date('Ymd');
        $filename = 'newmemberreport_' . $time . '.csv';
        //header('Content-Encoding: UTF-8');
        //header('Content-type: text/csv; charset=UTF-8');
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        header("Content-Disposition: attachment;filename={$filename}");
        echo "\xEF\xBB\xBF"; // UTF-8 BOM
        //print_r($result);
        echo query_to_csv($result, $filename);
    }
    
    public function getexpiredmemberreport() {

        $result = $this->select_model->getexpiredmemberreport();
        $time = date('Ymd');
        $filename = 'expiredmemberreport_' . $time . '.csv';
        //header('Content-Encoding: UTF-8');
        //header('Content-type: text/csv; charset=UTF-8');
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        header("Content-Disposition: attachment;filename={$filename}");
        echo "\xEF\xBB\xBF"; // UTF-8 BOM
        //print_r($result);
        echo query_to_csv($result, $filename);
    }

    public function getmemberreport() {
        $data = null;
        $result = $this->select_model->get_exportmember($data, null, null);
        $time = date('Ymd');
        $filename = 'summaryreport_' . $time . '.csv';
        //header('Content-Encoding: UTF-8');
        //header('Content-type: text/csv; charset=UTF-8');
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        header("Content-Disposition: attachment;filename={$filename}");
        echo "\xEF\xBB\xBF"; // UTF-8 BOM
        //print_r($result[]);
        echo query_to_csv($result, $filename);
    }

}
