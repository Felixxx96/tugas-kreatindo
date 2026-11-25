<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'web-sekolah');
$result = $mysqli->query('SHOW COLUMNS FROM tbl_foto');
while($row = $result->fetch_assoc()){
    print_r($row);
}
?>
