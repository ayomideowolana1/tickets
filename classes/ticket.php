<?php
include('../utils/generate-id.php');

class Ticket
{
    public $title;
    public $ticket_id;
    public $category;

    function __construct($title, $category)
    {
        $this->title = $title;
        $this->category = $category;
        $this->ticket_id = generate_id($category);
    }
    function create($conn)
    {

        $sql = "INSERT INTO `tickets`(`subject`,`ticket_id`,`category`) VALUES ('$this->title','$this->ticket_id','$this->category')";
        if ($conn->query($sql)) {
            echo "New ticket created";
        };
    }
    function get_ticket_data($conn, $ticket_id)
    {
        $sql = "SELECT * FROM `tickets` WHERE `ticket_id`='$ticket_id'";
        $result = $conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
    function get_department_tickets($conn, $department)
    {
        $sql = "SELECT * FROM `tickets` WHERE `department`='$department'";
        $result = $conn->query($sql);

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
}
