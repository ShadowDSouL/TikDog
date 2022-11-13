<div class="modal fade" id="showPet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Show Pet Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      
        <form action="" method="POST" name="petfrm" id="petfrm">
        
            <div class="modal-body" style="text-align:justify ;">
           
                <input type="hidden" name="petID" id="petID">
                
                <div class="form-group row">
                    <label for="InputName" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="name" name="name">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="InputSpecies" class="col-sm-2 col-form-label">Species:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="species" name="species">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputGender" class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="gender" name="gender">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputAge" class="col-sm-2 col-form-label">Age:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="age" name="age">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputCondition" class="col-sm-2 col-form-label">Condition:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="condition" name="condition">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputBody" class="col-sm-2 col-form-label">Body:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="body" name="body">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputColor" class="col-sm-2 col-form-label">Color:</label>
                    <div class="col-sm-10">
                    <input type="text"  readonly class="form-control" id="color" name="color">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputVaccinated" class="col-sm-2 col-form-label">Vaccinated:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" name="vaccinated" id="vaccinated">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputDewormed" class="col-sm-2 col-form-label">Dewormed:</label>
                    <div class="col-sm-10">
                        <input type="text"  readonly class="form-control" name="dewormed" id="dewormed">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputSpayed" class="col-sm-2 col-form-label">Spayed:</label>
                    <div class="col-sm-10">
                        <input type="text"  readonly class="form-control" name="spayed" id="spayed">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputLocation" class="col-sm-2 col-form-label">Location:</label>
                    <div class="col-sm-10">
                        <input type="text"  readonly class="form-control" name="location" id="location">
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="InputStatus" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <input type="text"  readonly class="form-control" name="status" id="status">
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="Textarea1">Description:</label>
                    <textarea readonly class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" readonly class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div> 
        </form>
    </div>
  </div>
</div>