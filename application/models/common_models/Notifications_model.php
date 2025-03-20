<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Notifications_model extends CI_Model {
	public function getNotifications() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('notifications_vw');
        return $query->result_array();
    }
}
