<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_DEPRECATED);

class Announcement_model extends CI_Model {

    public function getAnnouncements($search = '', $sort = 'desc') {
        // Explicitly select all columns and specify the table
        $this->db->select('*');
        $this->db->from('announcements');
    
        // Apply search if provided
        if (!empty($search)) {
            $this->db->group_start(); // Start a group for OR conditions
            $this->db->like('title', $search);
            $this->db->or_like('content', $search);
            $this->db->group_end(); // End the group
        }
    
        // Apply sorting based on the sort parameter
        switch (strtolower($sort)) {
            case 'asc':
                $this->db->order_by('created_at', 'ASC');
                break;
            case 'title_asc':
                $this->db->order_by('title', 'ASC');
                break;
            case 'title_desc':
                $this->db->order_by('title', 'DESC');
                break;
            case 'desc':
            default:
                $this->db->order_by('created_at', 'DESC');
                break;
        }
    
        // Execute the query
        $query = $this->db->get();
    
        // Check for query success
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return empty array if no results
        }
    }

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

    public function getAnnouncementById($announcement_id) {
        $this->db->where('id', $announcement_id);
        $query = $this->db->get('announcements');
        return $query->row(); 
    }

    public function getAttachmentsByAnnouncementId($announcement_id) {
        $this->db->where('announcement_id', $announcement_id);
        $query = $this->db->get('announcement_attachments');
        return $query->result(); 
    }

    public function getAttachmentById($attachment_id) {
        $this->db->where('id', $attachment_id);
        $query = $this->db->get('announcement_attachments');
        return $query->row();
    }

    public function updateAnnouncement($announcement_id, $update_data){
        $this->db->where('id', $announcement_id);
        $this->db->update('announcements', $update_data);
        return $this->db->affected_rows() > 0;
    }
}