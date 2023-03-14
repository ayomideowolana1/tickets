<?php
include ('../utils/conn.php');

include ('../classes/admin.php');

$ticket_id = $_POST['ticketID'];

$admin = new Admin('123');
$admin->reopen_ticket($conn,$ticket_id);

header('Location: ../index.php');
