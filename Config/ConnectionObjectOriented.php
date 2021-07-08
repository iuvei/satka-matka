<?php

interface connection_declare {

    public function create_database($dbname, $operation, $conn);

    public function connect($host, $username = "root", $pass = "");
}

class connection implements connection_declare {

    public function build($db, $username = "root", $pass = "", $operation = "") {
        $conn = $this->connect("localhost", $username, $pass);
        $info = $this->create_database($db, $operation, $conn);
        if ($info == "created" || $info == "exist") {
            $this->attach_db($conn, $db);
        } else {
            return $info;
        }

        return $conn;
    }

    public function connect($host = "localhost", $username = "root", $pass = "") {
        $conn = new mysqli($host, $username, $pass);
        if ($conn->connect_error) {
            die("not connected") ;
        }
        return $conn;
    }

    public function attach_db($conn, $dbname) {
        mysqli_select_db($conn, $dbname);
    }

    public function create_database($dbname, $operation = "", $conn) {
        $all = $conn->query("SELECT SCHEMA_NAME  FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
        if ($all->num_rows > 0) {
            if ($operation == "drop") {
                if ($conn->query("DROP DATABASE $dbname")) {
                    return "dropped";
                } else {
                    return $conn->error;
                }
            } else if ($operation == "create") {
                return "exist";
            } else {
                $this->attach_db($conn, $dbname);
                return "database attached";
            }
        } else {
            echo $conn->error;
            if ($operation == "create") {
                if ($conn->query("CREATE SCHEMA IF NOT EXISTS $dbname DEFAULT CHARACTER SET utf8")) {
                    return "created";
                } else {
                    return $conn->error;
                }
            } else if ($operation == "drop") {
                return "no database found";
            }
        }
    }

}

$dbname = "satka-matka";
$username = "root";
$password = "";

// $dbname = "u326868981_rxceswa";
// $username = "u326868981_rxceswa";
// $password = "Swa@1234!";
$connection = new connection();
$conn = $connection->connect("localhost", $username, $password);
$connection->attach_db($conn, $dbname);
?>