<?php
    include 'constants.php';
    class DBOperations {
        private $conn = NULL;
        function __construct() {
            $this->conn = new mysqli(SERVERNAME, HOSTNAME, PASSWORD, DBNAME);
            if ($this->conn->connect_error) {
                die("Connection Failed :".$this->conn->connect_error);
            }            
        }

        function validateFormData() {}

        function createChallenge(
            $userid,
            $challenge_date,
            $challenge_date_ngotiable,
            $challenge_time,
            $challenge_time_negotiable,
            $team_size,
            $substitutes,
            $address,
            $address_negotiable,
            $challenge_type,
            $challenge_amount,
            $age_limit
        ) {
            if ($this->conn !== NULL) {
                    $stmt = $this->conn->prepare("
                    INSERT INTO Challenges (
                            userid,
                            challenge_date,
                            challenge_date_negotiable,
                            challenge_time,
                            challenge_time_negotiable,
                            team_size,
                            substitutes,
                            address,
                            address_negotiable,
                            challenge_type,
                            challenge_amount,
                            age_limit
                        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                    ");
                    
                    $stmt->bind_param("issssiisssss", intval($userid), $challenge_date, $challenge_date_ngotiable, $challenge_time,  $challenge_time_negotiable, intval($team_size), intval($substitutes), $address, $address_negotiable, $challenge_type, $challenge_amount, $age_limit);
                    if($stmt->execute()) {
                        return 0;
                    }
                    return 1;
            }
            return -1;
        }

        function getChallenges() {
            $sql = 'SELECT * FROM challenges c INNER JOIN users u ON c.userid = u.userid';
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }

        function closeDB() {
            $this->conn->close();
        }
    }
?>