<?php
class Scoot extends CI_Model {

    function get_all() {
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }

    function add_user($user) {
        $query = "INSERT INTO users (name, role, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array($user['name'], $user['role'], $user['email'], $user['password']);
        return $this->db->query($query, $values);
    }

    function get_children() {
        $query = "SELECT childs.*, events.category FROM childs
        LEFT JOIN events ON childs.id = events.child_id 
        AND category LIKE 'booms'";
        return $this->db->query($query)->result_array();
    }

    function child_by_id($id) {
        $query = "SELECT * FROM childs WHERE id = ?";
        $values = array($id);
        // var_dump($values); die();
        return $this->db->query($query, $values)->row_array();
    }

    function medicine_by_id($id) {
        $query = "SELECT events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at 
            AS time, events.created_at AS date, users.name 
            AS person, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            AND category LIKE 'medicines' ORDER BY events.created_at DESC LIMIT 20";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }

    function booms_by_id($id) {
        $query = "SELECT events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at 
            AS time, events.created_at AS date, users.name 
            AS person, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            AND category LIKE 'booms' ORDER BY events.created_at DESC LIMIT 20";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }


    function get_events($id) {
        $query = "SELECT events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at AS event_time, 
            users.name AS person, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            ORDER BY events.created_at DESC LIMIT 50";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }

    function get_intake_by_id($id) {
        $query = "SELECT events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at 
            AS time, events.created_at AS date, users.name 
            AS person, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            AND category LIKE 'food' OR category LIKE 'fluids' ORDER BY events.created_at DESC LIMIT 20";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }

    function add_entry($data) {
        $query = "INSERT INTO events (category, description, comments, amount, user2_id, created_at, updated_at, child_id) VALUES (?,?,?,?,?, NOW(), NOW(), ?)";
        $values = array($data['category'], $data['description'], $data['comments'], $data['amount'], $data['user2_id'], $data['id']);
        return $this->db->query($query, $values);
    }

    function create_child($child) {
        $query = "INSERT INTO childs (name, image, age, allergies, foods_likes, foods_dislikes, dr_name, dr_contact_info, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, NOW(), NOW())";
        $values = array($child['name'], $child['image'], $child['age'], $child['allergies'], $child['foods_likes'], $child['foods_dislikes'], $child['dr_name'], $child['dr_contact_info']);
        return $this->db->query($query, $values);
    }

    function login($name) {
        $query = "SELECT * FROM users WHERE name = ?";
        $values = array($name);
        return $this->db->query($query, $values)->row_array();
    }

    function get_allergies($id) {
        $query = "SELECT allergies FROM childs WHERE id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->row_array();
    }

    function delete($id) {
        $query = "DELETE FROM childs WHERE id = ?";
        $values = array($id);
        return $this->db->query($query, $values);
    }

    function toggle() {
        if (isset($_POST['quickVar1a'])):
            $quickVar1a = $_POST['quickVar1a'];
        $query = "UPDATE test SET field1 = '".$quickVar1a."' where field1 != '".$quickVar1a."'";
        return $this->db->query($query);
        endif;
    }

}