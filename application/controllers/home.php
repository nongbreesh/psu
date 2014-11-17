<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helpers('url_helper');
        $this->load->model('select_model');
        $this->load->model('user_model');
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

        $data['empstatus'] = $this->select_model->get_empstatus();
        $data['zone'] = $this->select_model->get_zone();
        $data['menu'] = "home";
        $data['method'] = $this;
        $data['view'] = 'template/home';
        $this->load->view('template/masterpage', $data);
    }

    public function orgchart() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }



        $data['menu'] = "home";
        $this->load->view('template/orgchart');
        $data['view'] = 'template/home';
        $this->load->view('template/   ', $data);
    }

    public function getsummarybystatus($statusid, $month) {
        $rs = $this->select_model->get_summarybystatus($statusid, $month)->rs;
        return $rs;
    }

    public function getsummarybyzone($empid, $month) {
        $rs = $this->select_model->get_summarybyzone($empid, $month)->rs;
        return $rs;
    }

}
