<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller {

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
        $data['menu'] = "member";
        $this->config->set_item('enable_query_strings', TRUE);


        $input_empid = $this->input->get('input_empid');
        $input_firstname = $this->input->get('input_firstname');
        $input_lastname = $this->input->get('input_lastname');
        $input_role = $this->input->get('input_role');
        $input_level = $this->input->get('input_level');
        $input_zone = $this->input->get('input_zone');
        $input_branch = $this->input->get('input_branch');
        $input_department = $this->input->get('input_department');
        $chk = $this->input->get('chk');

        $data['input_empid'] = $input_empid;
        $data['input_firstname'] = $input_firstname;
        $data['input_lastname'] = $input_lastname;
        $data['input_role'] = $input_role;
        $data['input_level'] = $input_level;
        $data['input_zone'] = $input_zone;
        $data['input_branch'] = $input_branch;
        $data['input_department'] = $input_department;
        $data['chk'] = $chk;


        $data['prm'] = $this->input->get('prm');
        $data['page'] = $this->input->get('per_page') == '' ? '0' : $this->input->get('per_page');
        $config['uri_segment'] = 3;
        $config['per_page'] = 30;
        $config['base_url'] = base_url() . "/member/index?input_empid=$input_empid&input_firstname=$input_firstname&input_lastname=$input_lastname&input_role=$input_role&input_level=$input_level&chk=$chk&input_zone=$input_zone&input_branch=$input_branch&input_department=$input_department";
        $config['total_rows'] = count($this->select_model->get_member($data, null, null));


        /* Initialize the pagination library with the config array */
        $this->pagination->initialize($config);

        $data['member'] = $this->select_model->get_member($data, $data['page'], $config['per_page']);


        $data['zone'] = $this->select_model->get_zone();
        $data['mainbranch'] = $this->select_model->get_mainbranch();

        $data['view'] = 'member/index';
        $this->load->view('template/masterpage', $data);
    }

    public function memberline() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "member";
        $data['view'] = 'member/memberline';
        $data['zone'] = $this->select_model->get_zone();
        // $data['department'] = $this->select_model->get_department_by_zone(2);

        $this->load->view('template/masterpage', $data);
    }

    public function memberline_display() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "member";
        $this->config->set_item('enable_query_strings', TRUE);



        if ($_POST) {
            $data['input_zone'] = $this->input->post('input_zone');
            $data['input_department'] = $this->input->post('input_department');


            $this->session->set_userdata('zone', $data['input_zone']);
            $this->session->set_userdata('department', $data['input_department']);

            /* Set the config parameters */
            $data['page'] = $this->input->get('per_page') == '' ? '0' : $this->input->get('per_page');
            $config['uri_segment'] = 3;
            $config['per_page'] = 30;
            $config['base_url'] = base_url() . '/member/memberline_display?';
            $config['total_rows'] = count($this->select_model->get_member_bycyteria($data['input_zone'], $data['input_department'], null, null));


            /* Initialize the pagination library with the config array */
            $this->pagination->initialize($config);

            $data['member'] = $this->select_model->get_member_bycyteria($data['input_zone'], $data['input_department'], $data['page'], $config['per_page']);
        } else {


            $data['input_zone'] = $this->session->userdata('zone');
            $data['input_department'] = $this->session->userdata('department');

            $data['page'] = $this->input->get('per_page') == '' ? '0' : $this->input->get('per_page');
            $config['uri_segment'] = 3;
            $config['per_page'] = 30;
            $config['base_url'] = base_url() . '/member/memberline_display?';
            $config['total_rows'] = count($this->select_model->get_member_bycyteria($data['input_zone'], $data['input_department'], null, null));



            /* Initialize the pagination library with the config array */
            $this->pagination->initialize($config);
            $data['member'] = $this->select_model->get_member_bycyteria($data['input_zone'], $data['input_department'], $data['page'], $config['per_page']);
        }


        $data['view'] = 'member/memberlinedisplay';
        $this->load->view('template/masterpage', $data);
    }

    public function getdepartment() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $zoneid = $this->input->post('zoneid');
        if ($zoneid != '') {
            $html = '<div class="form-inline col-xs-4">
                    <input onclick="checkdepartmentall()" type="checkbox" id="input_serviceselectall" name="input_serviceselectall" value="all"/> <label for="input_serviceselectall">เลือกทั้งหมด</label>
                </div>';
            $department = $this->select_model->get_department_by_zone($zoneid);
            foreach ($department as $each) {
                $html .= "<div class=\"form-inline col-xs-4\">
                        <input onclick=\"checkdepartment()\" type=\"checkbox\" id=\"input_department$each->department\" name=\"input_department[]\" class=\"input_department\" value=\"$each->department\"/> <label for=\"input_department$each->department\">$each->department</label>
                    </div>";
            }
        } else {
            $html = '';
        }

        echo $html;
    }

    public function member_insurance($empid) {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "member";
        $data['memberdetail'] = $this->select_model->get_member_insurance($empid);

        $data['SUMafee'] = $data['memberdetail']->afee1 + $data['memberdetail']->afee2 + $data['memberdetail']->afee3 + $data['memberdetail']->afee4 + $data['memberdetail']->afee5 + $data['memberdetail']->afee6 + $data['memberdetail']->afee7 + $data['memberdetail']->afee8 + $data['memberdetail']->afee9;
        $data['view'] = 'member/memberinsurance';
        $this->load->view('template/masterpage', $data);
    }

    public function getisu($id) {
        $data['result'] = $this->select_model->get_insurance($id);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function member_setting($empid) {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "member";

        if ($_POST) {
            if (!empty($_POST['input_btneditinfo'])) {
                $time = date('Y/m/d H:i:s');
                $input = array(
                    'empid' => $this->input->post('empid')
                    , 'fullname' => $this->input->post('input_fullname')
                    , 'password' => md5($this->input->post('input_password'))
                    , 'account_id' => $this->input->post('input_account_id')
                    , 'level' => $this->input->post('input_level')
                    , 'role' => $this->input->post('input_role')
                    , 'zone_id' => $this->input->post('input_zoneid')
                    , 'department' => $this->input->post('input_department')
                    , 'empstatus' => $this->input->post('input_statusid')
                    , 'user_permission' => $this->input->post('input_permission')
                    , 'updatedate' => $time
                );
                if ($this->update_model->update_emp($input)) {
                    $data['result'] = true;
                }
            }
            if (!empty($_POST['input_btneditins'])) {
                $time = date('Y/m/d H:i:s');
                $input = array(
                    'id' => $this->input->post('isu_id')
                    , 'year' => $this->input->post('input_year')
                    , 'afee1' => $this->input->post('input_afee1')
                    , 'afee2' => $this->input->post('input_afee2')
                    , 'afee3' => $this->input->post('input_afee3')
                    , 'afee4' => $this->input->post('input_afee4')
                    , 'afee5' => $this->input->post('input_afee5')
                    , 'afee6' => $this->input->post('input_afee6')
                    , 'afee7' => $this->input->post('input_afee7')
                    , 'afee8' => $this->input->post('input_afee8')
                    , 'afee9' => $this->input->post('input_afee9')
                    , 'updatedate' => $time
                );
                if ($this->update_model->update_ins($input)) {
                    $data['result'] = true;
                }
            }
        }

        $data['zone'] = $this->select_model->get_zone();
        $data['permission'] = $this->select_model->get_permission();
        $data['empstatus'] = $this->select_model->get_empstatus();
        $data['memberdetail'] = $this->select_model->get_member_insurance($empid);
        $data['SUMafee'] = $data['memberdetail']->afee1 + $data['memberdetail']->afee2 + $data['memberdetail']->afee3 + $data['memberdetail']->afee4 + $data['memberdetail']->afee5 + $data['memberdetail']->afee6 + $data['memberdetail']->afee7 + $data['memberdetail']->afee8 + $data['memberdetail']->afee9;
        $data['view'] = 'member/membersetting';
        $this->load->view('template/masterpage', $data);
    }

    public function downloadfile() {
        if (!$this->user_model->is_login()) {
            redirect(base_url() . 'login');
        } else {
            $data['user'] = $this->user_model->get_account_cookie();
        }
        $data['menu'] = "member";
        $this->config->set_item('enable_query_strings', FALSE);

        $data['prm'] = $this->input->get('prm');
        $data['page'] = $this->input->get('per_page') == '' ? '0' : $this->input->get('per_page');
        $config['uri_segment'] = 3;
        $config['per_page'] = 30;
        $config['base_url'] = base_url() . '/member/downloadfile';
        $config['total_rows'] = count($this->select_model->get_filebypermission($data['user']['user_empid'], $data['user']['user_zoneid'], null, null));


        /* Initialize the pagination library with the config array */
        $this->pagination->initialize($config);

        $data['files'] = $this->select_model->get_filebypermission($data['user']['user_empid'], $data['user']['user_zoneid'], $data['page'], $config['per_page']);


        $data['view'] = 'member/memberdownload';
        $this->load->view('template/masterpage', $data);
    }

}
