<div class="modal fade" id="deact<?php echo $fetch['IDnum'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="status_user_query.php">
        <div class="modal-body">

         <input type="hidden" class="form-control" id="idnum" name="idnum" required autofocus value="<?php echo $fetch['IDnum']; ?>">

         <div style="height:10px;"></div>

         <div class="row">
          <div class="col-lg-3">
            <label class="control-label" style="position:relative; top:7px;">Full Name</label>
          </div>
          <div class="col-lg-9">
            <input type="text" class="form-control" name="fname" pattern="[A-Za-z\s]+" title="Letter only" placeholder="Enter First Name" value="<?php echo $fetch['fname'] .' '.$fetch['lname'] ?>" required autocomplete="off">
          </div>
        </div>

        <div style="height:10px;"></div>

        <div class="row">
          <div class="col-lg-3">
            <label class="control-label" style="position:relative; top:7px;">Status</label>
          </div>
          <div class="col-lg-9">
            <select name="status" id="status" class="form-select">
              <option>Select</option>
              <option>Deactivate</option>
              <option>Activate</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</div>
</div>