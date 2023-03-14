<?php

class Admin
{

    public $id;
    function __construct($id)
    {
        $this->id = $id;
    }
    function close_ticket($conn,$ticket_id)
    {
        $sql = "UPDATE `tickets` SET `status`= 1 WHERE `ticket_id`='$ticket_id'";
        if ($conn->query($sql)) {
            echo "success";
        };
    }
    function reopen_ticket($conn,$ticket_id)
    {
        $sql = "UPDATE `tickets` SET `status`= 0 WHERE `ticket_id`='$ticket_id'";
        if ($conn->query($sql)) {
            echo "success";
        };
    }
}
