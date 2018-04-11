<!--<link rel="stylesheet" href="css/general.css" />-->

<button type="button" class="btn btn-danger" id="hi" data-toggle="modal" data-target=".bd-example-modal-lg">
  Print Favourites
</button>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color: rgb(244, 239, 231);">
      <div class="modal-header" style="opacity: 0.5;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
          <form>
              <strong><legend style="text-align: center;">PRINT FAVOURITES</legend></strong>
              <div style="border-bottom: 1px dotted;"></div><br>
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><label>Size</label></div>
                  <div class="col-md-2"><label>Paper</label></div>
                  <div class="col-md-2"><label>Frame</label></div>
                  <div class="col-md-2"><label>Quantity</label></div>
                  <div class="col-md-2"><label>Total</label></div>
              </div>
              <?php 
              
            printFaves(); 
            
            
            ?>
              
              
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="bttn"class="btn btn-primary">Order</button>
      </div>
    </div>
  </div>
</div>