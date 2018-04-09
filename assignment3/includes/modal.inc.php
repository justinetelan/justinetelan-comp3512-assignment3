<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" id="hi" data-toggle="modal" data-target=".bd-example-modal-lg">
  Print Favourites
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel">Print Favourites</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!--<span aria-hidden="true">&times;</span>-->
        </button>
      </div>
      <div class="modal-body">
          <form> <!-- should we put method and action or nah -->
              <legend>Print Favourites</legend>
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
                                               
                                                <!--size1=0&paper1=0&frame1=0&qty1=1&size2=2&paper2=2&frame2=2&qty2=3&ship=1-->
      </div>
    </div>
  </div>
</div>