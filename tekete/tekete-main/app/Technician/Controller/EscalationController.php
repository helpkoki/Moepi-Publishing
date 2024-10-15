<?php
    require_once('../../../config/database.php');
    require_once('../Models/DatabaseAPI.php');

    class EscalationController {

        private $db;

        public function __construct() {
            
            global $host, $username, $password, $dbname;
            $this->db = new DatabaseAPI($host, $username, $password, $dbname);
        }

        public function getEscalatedTickets() {
            
            return $this->db->getEscalatedTickets();
        }
    
        public function getIncidentDetails($id) {
            
            return $this->db->getIncidentById($id);
        }

    }

    

?>