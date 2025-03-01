<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcement_model extends CI_Model {

	public function getAnnouncements(){
        $query = $this->db->get('announcements');
        return $query->result_array();
    }
}