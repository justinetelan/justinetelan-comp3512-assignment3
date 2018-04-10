$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    var hid = $('#hide').val();
    var totalArray = new Array();
    queryID = "";
    
    // --------------- ITEM PRICE ---------------
    
    $('form').change(function() { 
    
        var totals = 0;
        var qty = 0;
        // put unique ids for each item
        for(let c = 0; c <= hid-1; c++) {
            
            // size cost
            var sizeID = $('#size' + c).val();
            for(let i = 0; i < info['sizes'].length; i++) {
                let sizes = info['sizes'][i];
                // if variable above matches id iterated, calculate the cost
                if(sizeID == sizes.id) {
                    var sizeCost = sizes.cost;
                }
            }
            
            // stock cost
            var paperID = $('#paper' + c).val(); 
            for(let i = 0; i < info['stock'].length; i++) {
                var paper = info['stock'][i];
                
                if(paperID == paper.id) {
                    var stCost = 0;
                    
                    // determine size
                    if(sizeID == 0 || sizeID == 1) {
                        stCost = paper.small_cost;
                    } else if(sizeID == 2 || sizeID == 3) {
                        stCost = paper.large_cost;
                    }
                    
                    var paperCost = stCost;
                }
                
            }
        
            // frame cost
            var frameID = $('#frame' + c).val();
            for(let i = 0; i < info['frame'].length; i++) {
                let frame = info['frame'][i];
                var frCost = 0;
                
                if(frameID == frame.id) {
                    // determine price depending on size
                    if(sizeID == 0) {
                        frCost = frame.costs[0];
                    } else if(sizeID == 1) {
                        frCost = frame.costs[1];
                    } else if(sizeID == 2) {
                        frCost = frame.costs[2];
                    } else if(sizeID == 3) {
                        frCost = frame.costs[3];
                    }
                    var frameCost = frCost;
                }
                
            }
            
            var sum = sizeCost + paperCost + frameCost;
            var price = sum * $('#inputsm' + c).val();
            // total for each image
            $('#total' + c).html(price.toFixed(2));
            
            // add up SUBTOTAL
            var add = $('#total' + c).text();
            totals += parseInt(add);
            $('#overall').html('$' + totals.toFixed(2));
            
            // add QTY
            qty += parseInt($('#inputsm' + c).val());
            
            // put the total inside 'hidden' as its value
            var totHid = $('#hideTot').attr('value', totals);
            var qtyHid = $('#hideFr').attr('value', qty);
           
        } // end for loop
        
      }).change();
    
    // radio buttons
    for(let i=0; i < info['shipping'].length; i++){
        let ship = info['shipping'][i];
        let shipRad = $('<input type="radio" name="rad" id="ship' +i+'">'+ ship.name +'</input>');
        
        shipRad.attr('value', ship.id);
        shipRad.appendTo('#rads');
        
    }
    
    // --------------- SHIPPING PRICE ---------------
    
    // check standard shipping by default
    $('#ship0').prop('checked', true);
    
    // retrieve stored total of each item
    var storedTot = parseInt($('#hideTot').val());
    
    // hard code - display grand total of STANDARD shipping
    $('#shipping').html('$' + 5.00);
    var stdTots = storedTot + 5;
    $('#totalG').html('$' + stdTots.toFixed(2));
    
    // hard code - adds grand total for when clicking back to standard radio button
    $('#ship0').click(function(e){
       $('#shipping').html('$' + 5.00);
        var tots = storedTot + 5;
        $('#totalG').html('$' + tots.toFixed(2));
    });
    
    // hard code - display grand total with EXPRESS shipping
    $('#ship1').click(function(e){
        $('#shipping').html('$' + 15.00);
        var totsExp = storedTot + 15;
        $('#totalG').html('$' + totsExp.toFixed(2));
    });

    // add 'checked' attribute for shipping
    $('input[type=radio][id=ship0]').click(function(e) {
       
       $('#ship0').attr('checked', 'checked');
       
    });
    $('input[type=radio][id=ship1]').click(function(e) {
       
       $('#ship1').attr('checked', 'checked');
       
    });
    
    // determine shipping based on frame and quantity
    $('form').change(function(e) {
        var frameID = 0;
        for(let c = 0; c <= hid-1; c++) {
            if ($('#frame' + c).val() >= 1){
                frameID = $('#frame' + c).val();
                c= 1000000;
            }
            
        }
        
        if($("input:radio[id='ship0']").is(":checked")) {
            
            var shipIdStd = $('#ship0').val(); // get standard id
            var storedTot = parseInt($('#hideTot').val()); // stored subtotal
            var storedQty = parseInt($('#hideFr').val()); // stored qty total - help determine shipping
            
            
            
            // go through thresholds
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
                let thresh = info['freeThresholds'][i];
                
                console.log('stored qty = ' + storedQty);
                console.log('stored frameid = ' + frameID);
                
                if(shipIdStd == ship.id) {
                    if(frameID == 0) { // no frame
                        var shCost = ship.rules['none'];
                    } else if(frameID > 0) { // has frame
                    
                        console.log('WORKS');
                    
                        // determine total qty
                        if(storedQty < 10){
                            var shCost = ship.rules['under10'];
                        } else if(storedQty >= 10){
                            var shCost = ship.rules['over10'];
                        }
                    }
                    
                    if(storedTot > thresh['amount']) { // greater than $100
                        var shCost = 0;
                    }
                    var shipCost = parseInt(shCost);
                    $('#shipping').html('$' + shipCost.toFixed(2));
                    // store in input type hidden for grand total
                    $('#shipCst').attr('value', shipCost);
                    // console.log(frameID);
                }
            }
            
        } else if($("input:radio[id='ship1']").is(":checked")) {
            
            var shipIdExp = $('#ship1').val(); // get express id
            var storedTot = parseInt($('#hideTot').val()); // stored subtotal
            var storedQty = parseInt($('#hideFr').val()); // stored qty total - help determine shipping
            
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
                let thresh = info['freeThresholds'][i];
                
                if(shipIdExp == ship.id) {
                    if(frameID == 0) { // no frame
                        var shCost = ship.rules['none'];
                    } else if(frameID > 0){ // has frame
                      
                        if(storedQty < 10){
                            var shCost = ship.rules['under10'];
                        } else if(storedQty >= 10){
                            var shCost = ship.rules['over10'];
                        } 
                    }
                    
                    if(storedTot > thresh['amount']) { // greater than $300
                        var shCost = 0;
                    }
                    var shipCost = parseInt(shCost);
                    $('#shipping').html('$' + shipCost.toFixed(2));
                    // store in input type hidden for grand total
                    $('#shipCst').attr('value', shipCost);
                }
            }
        }
            
        var hidShipC = parseInt($('#shipCst').val()); // retrieve ship cost
        var storedTot = parseInt($('#hideTot').val()); // retrieve subtotal
        
        var grand = hidShipC + storedTot;
        $('#totalG').html('$' + grand.toFixed(2)); // display grand total
           
    }).change();
    
    
    // --------------- PRINT SUMMARY ---------------
    
    // send form data and redirects to order summary page
    $("#bttn").click(function(e) {
     
        var queryArray = new Array();   
        for(let g =0; g <hid; g++){
            var itemQue = [];
        itemQue['size'] = $('#size' + g).val() 
        itemQue['paper'] = $('#paper' + g).val();  
        itemQue['frame'] = $('#frame' + g).val();
        itemQue['quantity'] = $('#inputsm' + g).val();
       
        queryArray.push(itemQue);
        
    }  
    var orderQuery = "";
    for(let g =0; g <hid; g++) {
        orderQuery += "size" +g+ "=" + queryArray[g].size+ "&paper" +g+ "=" + queryArray[g].paper + "&frame" +g+ "=" +queryArray[g].frame + "&qty" +g+ "=" +queryArray[g].quantity +"&total=" + (g+1);
    }
    var ships= 0;
    if($("input:radio[id='ship0']").is(":checked")) {
        ships = 0;
    } else if($("input:radio[id='ship1']").is(":checked")) {
        ships=1;
    }
    orderQuery = orderQuery + "&ship=" + ships;
    
    // turn data into data + g to make unique ids
    $.ajax({
            type: "POST",
            url: "requestTest.php",
            dataType : 'text',
            data: { dataString: orderQuery },
            success: function(data)
                {
                    var url = 'order.php?' + orderQuery;
                    window.location = url;
                }
        });
    });
    
    
})