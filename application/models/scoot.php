<?php
class Scoot extends CI_Model {
//returns all users in DB
    function get_all() { 
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }
//creates a new user to program
    function add_user($user) {
        $query = "INSERT INTO users (name, role, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array($user['name'], $user['role'], $user['email'], $user['password']);
        return $this->db->query($query, $values);
    }
//returns all children in DB
    function get_children() {
        $query = "SELECT childs.*, events.category FROM childs
        LEFT JOIN events ON childs.id = events.child_id 
        AND category LIKE 'booms' GROUP BY childs.id";
        return $this->db->query($query)->result_array();
    }
//returns a particular child from DB
    function child_by_id($id) {
        $query = "SELECT * FROM childs WHERE id = ?";
        $values = array($id);
        // var_dump($values); die();
        return $this->db->query($query, $values)->row_array();
    }
//returns medicine info for a specified child
    function medicine_by_id($id) {
        $query = "SELECT events.id AS med_id, events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at 
            AS time, events.created_at AS date, users.name 
            AS person, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            AND category LIKE 'medicines' ORDER BY events.created_at DESC LIMIT 20";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }
//returns all booms for a specified child
    function booms_by_id($id) {
        $query = "SELECT events.id AS boom_id, events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at 
            AS time, events.created_at AS date, users.name 
            AS person, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            AND category LIKE 'booms' ORDER BY events.created_at DESC LIMIT 20";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }
//returns all events for a specified child
    function get_events($id) {
        $query = "SELECT events.category, events.description, events.comments, events.amount, events.user2_id, events.created_at AS event_time, 
            users.name AS person, events.id AS id_event, childs.* FROM events 
            LEFT JOIN childs ON events.child_id = childs.id 
            LEFT JOIN childs_users ON childs.id = childs_users.child_id 
            LEFT JOIN users ON events.user2_id = users.id WHERE childs.id = ? 
            ORDER BY events.created_at DESC LIMIT 50";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }
//returns all food and fluid intackes for a specified child
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
//adds an entry to DB for any event
    function add_entry($data) {
        $query = "INSERT INTO events (category, description, comments, amount, user2_id, created_at, updated_at, child_id) VALUES (?,?,?,?,?, NOW(), NOW(), ?)";
        $values = array($data['category'], $data['description'], $data['comments'], $data['amount'], $data['user2_id'], $data['id']);
        return $this->db->query($query, $values);
    }
//create a new child in DB
    function create_child($child) {
        $query = "INSERT INTO childs (name, image, age, allergies, foods_likes, foods_dislikes, dr_name, dr_contact_info, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, NOW(), NOW())";
        $values = array($child['name'], $child['image'], $child['age'], $child['allergies'], $child['foods_likes'], $child['foods_dislikes'], $child['dr_name'], $child['dr_contact_info']);
        return $this->db->query($query, $values);
    }
//permits user to login to program
    function login($name) {
        $query = "SELECT * FROM users WHERE name = ?";
        $values = array($name);
        return $this->db->query($query, $values)->row_array();
    }
//returns a specified child's allergies
    function get_allergies($id) {
        $query = "SELECT allergies FROM childs WHERE id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->row_array();
    }
//removes a child from the DB
    function delete($id) {
        //delete child instances before removing parent
        $query1 = "DELETE FROM events WHERE child_id = ?";
        $values1 = array($id);
        $this->db->query($query1, $values1);
        //removes parent instance from the DB
        $query2 = "DELETE FROM childs WHERE id = ?";
        $values2 = array($id);
        return $this->db->query($query2, $values2);
    }
//gets boom dates, used for the progress bar and faces on MAIN.PHP Controllers page
    function get_boom_dates($id) {
        $query1 = "SELECT events.created_at, childs.id, childs.name FROM events LEFT JOIN childs ON events.child_id = childs.id WHERE childs.id = ? AND category LIKE 'booms' ORDER BY events.created_at Desc LIMIT 2";
        $values1 = array($id);
        return $this->db->query($query1, $values1)->result_array();
    }
//removes an event that belongs to the user that created the event
    function remove_event_by_id($id) {
        $query = "DELETE FROM events WHERE id = ?";
        $values = array($id);
        return $this->db->query($query, $values);
    }

}