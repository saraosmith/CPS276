<?php

class Date_Time{

private $conn;

function __construct(){
    $dbHost = 'localhost';
    $dbName = 'saosmith';
    $dbUsr = 'saosmith';
    $dbPass = 'KHSZahgH4Yu2';
    $this->conn = new mysqli($dbHost, $dbUsr, $dbPass, $dbName);

    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
        }
    }
    function checkSubmit($dtm){
        $timestamp = strtotime($dtm['datetime']);
        $note = $dtm['note'];
        $mdt = $dtm['datetime'];
        $sql = "INSERT INTO tbl_notes (datetime,note) VALUES('$mdt','$note');";

        if($this->conn->query($sql)){
            echo "Note has been added";
        }else{
            echo "Error ".$sql;
        }

    }

    function getNotes($begin,$end){

        $sql = "SELECT * FROM tbl_notes WHERE CAST(datetime AS DATE) BETWEEN '$begin' AND '$end' ORDER BY datetime;";
        $result = $this->conn->query($sql);
        $notes = array();

    if($result->num_rows>0){

        while($row = $result->fetch_assoc()){
            $note = array("datetime"=>$row['datetime'],"note"=>$row['note']);
            array_push($notes,$note);

        }

    }
    return $notes;
    }

}

?>