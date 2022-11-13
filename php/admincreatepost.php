
<style>
.modal-backdrop {
   
    display: none;    
}
</style>

<a class="nav-link py-4 px-2" data-bs-toggle="modal" data-bs-placement="right"  data-bs-target="#createPost">
    <i class="fas fa-plus-circle fs-2"></i><p>New Announcement</p>
</a>

<div class="modal fade" id="createPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="adminaddpost.php" method="POST" name="createpostfrm" id="createpostfrm">
        <div class="modal-body" style="text-align:justify ;">
          <div class="form-group">
            <label for="Input1">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title of the announcement" required>
          </div>
          <div class="form-group">
            <label for="Textarea1">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Content of the announcement" required></textarea>
          </div>
          <div class="form-group">
            <label for="Input3">Date</label>
            <input type="date" class="form-control" id="date" name="date"  placeholder="Date..." required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Create">
          </div>
        </div>  
      </form>        
    </div>
  </div>
</div>




