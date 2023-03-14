<!-- Transaction Ticket Modal -->
<div class="modal" id="transactionModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Transaction Ticket</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="./api/create-ticket.php" method="post">
          <input type="hidden" name="category" value="transaction">
          
          <div class="mb-3">
            <input class="form-control" type="text" name="title" placeholder="Ticket title" required>
          </div>
          <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="create">

          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>