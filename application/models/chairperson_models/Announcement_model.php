<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcement_model extends CI_Model {

    public function insertAnnouncement($announcement_data) {
        // Validate data
        if (empty($announcement_data['faculty_profile_id']) || empty($announcement_data['title']) || empty($announcement_data['content'])) {
            log_message('error', 'Missing required fields in announcement_data: ' . print_r($announcement_data, true));
            return false;
        }

        $this->db->insert('announcements', $announcement_data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // Return the newly created announcement ID
        }
        return false;
    }

    public function insertAttachment($attachment_data) {
        // Validate data
        if (empty($attachment_data['announcement_id']) || empty($attachment_data['announcement_file_path'])) {
            log_message('error', 'Missing required fields in attachment_data: ' . print_r($attachment_data, true));
            return false;
        }

        return $this->db->insert('announcement_attachments', $attachment_data);
    }

    public function insertNotification($notification_data) {
        // Validate data
        if (empty($notification_data['notifiable_id']) || empty($notification_data['notifiable_type'])) {
            log_message('error', 'Missing required fields in notification_data: ' . print_r($notification_data, true));
            return false;
        }

        return $this->db->insert('notifications', $notification_data);
    }
}