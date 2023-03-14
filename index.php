<?php
include('./utils/conn.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./styles/index.css">
    <title>Tickets</title>
</head>

<body class="container">
    <div id="create-ticket">
        <nav class="nav">
            <?php include('./components/button-group.php') ?>
        </nav>
        <main>
            <?php include('./components/create-ticket-modal.php') ?>

            <!--  Ticket details Modal -->
            <div class="modal" id="viewDetailsModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Ticket Details</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div v-if="ticketDetailsFetched == 0" class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div v-else>
                                <div>
                                    <h5 >
                                        <span v-if="ticketData.status == 0"  class="badge bg-primary">Open</span> 
                                        <span v-else class="badge bg-success"> Closed</span> 
                                    </h5>
                                </div>
                                <div>
                                    <p><b>Ticket ID:</b>   {{ ticketData.ticket_id }}</p> 
                                    <p><b>Category:</b>   {{ ticketData.category }}</p> 
                                    <p><b>Subject:</b>   {{ ticketData.subject }}</p> 
                                    <p><b>Date created:</b>   {{ ticketData.created_at }}</p> 

                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <table class="table">
                <tr class="table-dark">
                    <th>sn</th>
                    <th>Category</th>
                    <th>Ticket ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date created</th>
                    <th>Actions</th>
                </tr>

                <tr v-for="(ticket,index) in tickets" class="ticket" :data-ticketID>
                    <td>{{ index + 1 }}</td>
                    <td>{{ ticket.category }}</td>
                    <td>{{ ticket.ticket_id }}</td>
                    <td>{{ ticket.subject }}</td>
                    <td>
                        <h5 v-if="ticket.status == 0" > <span class="badge bg-primary">Open</span> </h5>
                        <h5 v-else > <span class="badge bg-success">Closed</span> </h5>
                    </td>
                    <td>{{ ticket.created_at }}</td>
                    <td>
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" data-bs-toggle="modal" @click="viewDetails" :data-ticketId="ticket.ticket_id" data-bs-target="#viewDetailsModal">View details</button>
                            <button class="dropdown-item" v-if="ticket.status == 0" @click="closeTicket" :data-ticketId="ticket.ticket_id">Close ticket</button>
                            <button class="dropdown-item" v-else @click="reopenTicket" :data-ticketId="ticket.ticket_id">Reopen ticket</button>
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#escalateModal">Escalate</button>
                        </div>
                    </td>
                </tr>

            </table>


        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./scripts/create-ticket.js"></script>
    <script src="./scripts/ticket.js"></script>
</body>

</html>