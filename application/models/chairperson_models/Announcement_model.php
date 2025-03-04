<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcement_model extends CI_Model {

    public function insertAnnouncement($announcement_data){
        $this->db->insert('announcement_attachments', $announcement_data);
        return true;
    }
}