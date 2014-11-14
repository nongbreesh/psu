<?php

/**
 * Model		: Login_model
 *
 * Created by	: nuttanon
 * Date			: 2012-03-28
 *
 */
class select_model extends CI_Model {

    function get_weblink() {

        $query = $this->db->query("SELECT * from View_WebLink");
        return $query->result();
    }

    function get_history() {

        $query = $this->db->query("SELECT * from information where info_id = 2 and info_flag = '0'");
        return $query->row();
    }

    public function get7day() {
        $query = $this->db->query("SELECT * from [View_7Day]");
        return $query->result();
    }

    public function getDataDaily_huana() {
        $query = $this->db->query("SELECT * from [View_DataDaily_Huana]");
        return $query->result();
    }

    public function getDataDaily_Rasri() {
        $query = $this->db->query("SELECT * from [View_DataDaily_Rasri]");
        return $query->result();
    }

    public function getExport_Huana_Date() {
        $query = $this->db->query("SELECT TOP 7 [water_date]
      ,[water_time] from [View_m_Export_Huana] order by [water_date] desc");
        return $query->result();
    }

    public function getExport_Huana() {
        $query = $this->db->query("SELECT TOP 7 * from [View_m_Export_Huana] order by [water_date] desc");
        return $query->result();
    }

    public function getExport_Rain() {
        $query = $this->db->query("SELECT * from [View_Export_Rain]");
        return $query->result();
    }

    public function getExport_Rasri_Date() {
        $query = $this->db->query("SELECT TOP 7 [water_date]
      ,[water_time] from [View_m_Export_Rasri] order by [water_date] desc");
        return $query->result();
    }

    public function getExport_Rasri() {
        $query = $this->db->query("SELECT TOP 7 * from [View_m_Export_Rasri] order by [water_date] desc");
        return $query->result();
    }

    public function getExport_Water() {
        $query = $this->db->query("SELECT * from [View_Export_Water]");
        return $query->result();
    }

    public function getHuana_RawData() {
        $query = $this->db->query("SELECT * from [View_Huana_RawData]");
        return $query->result();
    }

    public function getRasri_RawData() {
        $query = $this->db->query("SELECT * from [View_Rasri_RawData]");
        return $query->result();
    }

    public function getrealtime() {
        $query = $this->db->query("SELECT * from [View_realtime]");
        return $query->result();
    }

    public function getRealtime_Duplicate() {
        $query = $this->db->query("SELECT * from [View_Realtime_Duplicate]");
        return $query->result();
    }

    public function getWaterFlow() {
        $query = $this->db->query("SELECT * from [View_WaterFlow2]  Where  datepart(dw,[aRealtime_Date]) = 1 order by  aRealtime_Date asc");
        return $query->result();
    }

    public function getWaterLevel() {
        $query = $this->db->query("SELECT * from [View_WaterLevel2] Where  datepart(dw,[aRealtime_Date]) = 1 order by  aRealtime_Date asc");
        return $query->result();
    }

    public function getRealtime_Rain() {
        $query = $this->db->query("SELECT * from [View_Realtime_Rain]");
        return $query->result();
    }

    function get_gcm_users() {
        $query = $this->db->query("SELECT gcm_regid FROM gcm_user");
        return $query->result_array();
    }

}

?>