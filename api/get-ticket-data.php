<?php
include('../utils/conn.php');

include('../classes/ticket.php');

$ticket_id = $_POST['ticketID'];

$sql = "SELECT * FROM `tickets` WHERE `ticket_id`='$ticket_id'";
$result = $conn->query($sql);

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
