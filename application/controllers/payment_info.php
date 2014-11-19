<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_info extends CI_Controller {

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

    public function getmemberpayment() {
        $empid = $this->input->post('empid');
        $data['result'] = $this->select_model->get_memberbyid($empid);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function index() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "payment";
        $data['input_empid'] = $this->input->get('input_empid');
        $data['input_firstname'] = $this->input->get('input_firstname');
        $data['input_lastname'] = $this->input->get('input_lastname');



        if ($_POST) {
            $input = array('empid' => $this->input->post('empid')
                , 'member_year' => (date('Y') + 543)
                , 'payment_date' => $this->input->post('input_paymentdate')
                , 'payment_amount' => $this->input->post('input_paymentmoney'));
            if ($this->update_model->updatepayment($input)) {
                $data['result'] = true;
            }
        }



        $data['prm'] = $this->input->get('prm');
        $data['page'] = $this->input->get('per_page') == '' ? '0' : $this->input->get('per_page');
        $config['uri_segment'] = 3;
        $config['per_page'] = 30;
        $config['base_url'] = base_url() . "/member/index?input_empid=" . $data['input_empid'] . "&input_firstname=" . $data['input_firstname'] . "&input_lastname=" . $data['input_lastname'] . "&btnsubmit=ค้นหา";
        $config['total_rows'] = count($this->select_model->get_member_paymet($data, null, null));



        /* Initialize the pagination library with the config array */
        $this->pagination->initialize($config);

        $data['member'] = $this->select_model->get_member_paymet($data, $data['page'], $config['per_page']);



        $data['view'] = 'payment/index';
        $this->load->view('template/masterpage', $data);
    }

}
