<?php
echo '<div class="row">
        <div class="col-md-4"></div><div class="col-md-4"></div>
        <div class="col-md-4"><hr></div>
        </div>'; // close row
echo '<div class="row">';
for($i = 0; $i < 4; $i++) { // goes up to 8
    echo '<div class="col-md-2"></div>';
}
        
echo '<div class="col-md-2">Subtotal</div>
        <div class="col-md-2"><p id="overall"></p></div>';
echo '</div>'; // close row for SUBTOTAL

echo '<div class="row">';

    echo '<div class="col-md-1"></div>';
    echo '<div class="col-md-1"></div>';
    echo '<div class="col-md-1"></div>';
    echo '<div class="col-md-3" id="rads">
            <input type="hidden" id="hideTot" name="totalC">
        </div>';
// echo '<input type="hidden" id="hideTot" name="totalC">';

// echo '<div id="rads">';
                
echo '<div class="col-md-3">Shipping</div>
        </div class="col-md-3"><p id="shipping"></p></div>';
        
        
// echo '</div>'; // close rads

echo '</div>'; // close row for SHIPPING

// TOTAL SHOULD BE IN ANOTHER ROW!
echo '<div class="row">';
for($i = 0; $i < 4; $i++) { // goes up to 8
    echo '<div class="col-md-2"></div>';
}
echo '<div class="col-md-2">Grand Total</div>';
// echo '<div class="col-md-2"><p id="total"></p></div>';
echo '<p id="total"></p>';
echo '</div>'; // close row for GRAND TOTAL
?>