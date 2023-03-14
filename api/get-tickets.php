<?php

include ('../utils/conn.php');
$sql = 'SELECT * FROM `tickets` WHERE 1';
$result = $conn->query($sql);

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
