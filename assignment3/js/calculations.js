$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    var hid = $('#hide').val();
    var totalArray = new Array();
    queryID = "";
    
    $('form').change(function() { // OR PUT 'select'
    
        var totals = 0;
        var qty = 0;
        // put unique ids for each item
        for(let c = 0; c <= hid-1; c++) {
            
            // size cost
            var sizeID = $('#size' + c).val(); // console.log('selected size = ' + sizeID);
            for(let i = 0; i < info['sizes'].length; i++) {
                let sizes = info['sizes'][i];
                // if variable above matches id iterated, calculate the cost
                if(sizeID == sizes.id) {
                    var sizeCost = sizes.cost;
                }
            }
            
            // stock cost
            var paperID = $('#paper' + c).val(); //console.log('selected paper = ' + paperID);
            for(let i = 0; i < info['stock'].length; i++) {
                var paper = info['stock'][i];
                
                if(paperID == paper.id) {
                    var stCost = 0;
                    
                    // determine size
                    if(sizeID == 0 || sizeID == 1) {
                        var stCost = paper.small_cost;
                        // console.log('small price = ' + stCost);
                    } else if(sizeID == 2 || sizeID == 3) {
                        var stCost = paper.large_cost;
                        // console.log('large price = ' + stCost);
                    }
                    // console.log('overall paper = ' + paperCost);
                    var paperCost = stCost;
                }
                
            }
        
            // frame cost
            var frameID = $('#frame' + c).val(); //console.log('selected frame = ' + frameID);
            for(let i = 0; i < info['frame'].length; i++) {
                let frame = info['frame'][i];
                var frCost = 0;
                
                if(frameID == frame.id) {
                    // determine price depending on size
                    if(sizeID == 0) {
                        frCost = frame.costs[0];
                        // console.log('5x7 cost = ' + frCost)
                    } else if(sizeID == 1) {
                        frCost = frame.costs[1];
                        // console.log('8x10 cost = ' + frCost)
                    } else if(sizeID == 2) {
                        frCost = frame.costs[2];
                        // console.log('11x14 cost = ' + frCost)
                    } else if(sizeID == 3) {
                        frCost = frame.costs[3];
                        // console.log('12x18 cost = ' + frCost)
                    }
                    var frameCost = frCost;
                }
                
            }
            
            var sum = sizeCost + paperCost + frameCost;
            var price = sum * $('#inputsm' + c).val();
            $('#total' + c).html(price.toFixed(2));
            
            // add up SUBTOTAL
            var add = $('#total' + c).text();
            totals += parseInt(add);
            
            // add QTY
            // console.log($('#inputsm' + c).val());
            qty += parseInt($('#inputsm' + c).val());
            // console.log('qty total = ' + qty);
            
            // var qtyHid ...
            // console.log(totals);
            var tot = totals + 5;
             
            $('#overall').html('$' + totals);
            
            
            
            
            $('#total').html('$' + tot);
            // put the total inside 'hidden' as its value
            var totHid = $('#hideTot').attr('value', totals);
            var qtyHid = $('#hideFr').attr('value', qty);
            // // var storedTot = totHid.val();
            // console.log('stored val = ' + totHid.val());
           
        } // end for loop
        
      }).change();
    // console.log("testA:" +  queryArray);
    
    
    $("#bttn").click(function(e) {
     
        var queryArray = new Array();   
        for(let g =0; g <hid; g++){
            var itemQue = [];
            
        // var sz =$('#size' + g).val() 
        // var pp = $('#paper' + g).val();  
        // var fr = $('#frame' + g).val(); 
           
        itemQue['size'] = $('#size' + g).val() 
        itemQue['paper'] = $('#paper' + g).val();  
        itemQue['frame'] = $('#frame' + g).val();
        itemQue['quantity'] = $('#inputsm' + g).val();
       
        // let query = "" +sz + pp + fr;
        queryArray.push(itemQue);
    }  
    
    var orderQuery = "";
    for(let g =0; g <hid; g++){
    orderQuery += "size" +g+ "=" + queryArray[g].size+ "&paper" +g+ "=" + queryArray[g].paper + "&frame" +g+ "=" +queryArray[g].frame + "&qty" +g+ "=" +queryArray[g].quantity +"&total=" + (g+1);
    // ('#queryS').attr('value', queryArray);
    }
    var ships= 0;
    if($("input:radio[id='ship0']").is(":checked")) {
        ships = 0;
    }else if($("input:radio[id='ship1']").is(":checked")) {
        ships=1;
    }
    orderQuery = orderQuery + "&ship=" + ships;
        
    // console.log(orderQuery);
    
    // turn data into data + g to make unique ids
   $.ajax({
    type: "POST",
    url: "requestTest.php",
    dataType : 'text',
    data: { dataString: orderQuery },
    success: function(data)
        {
            alert("SUCCESS: " + data);
            var url = 'order.php?' + orderQuery;
            window.location = url;
        }
    });
    
    
    
    
    })
    
    
    
    // radio buttons
    for(let i=0; i < info['shipping'].length; i++){
        let ship = info['shipping'][i];
        let shipRad = $('<input type="radio" name="rad" id="ship' +i+'">'+ ship.name +'</input>');
        
        shipRad.attr('value', ship.id);
        shipRad.appendTo('#rads');
        
    }
    
    // !!! check standard by default - requirement !!!
    $('#ship0').prop('checked', true);
    // window.load(function(e){
    
    var storedTot = parseInt($('#hideTot').val());
        $('#shipping').html('$' + 5);
        var tots = storedTot + 5;
        $('#total').html('$' + tots);
        
       $('#ship0').click(function(e){
            $('#shipping').html('$' + 5);
        var tots = storedTot + 5;
         $('#total').html('$' + tots);
        })
        
         $('#ship1').click(function(e){
            $('#shipping').html('$' + 15);
        var tots = storedTot + 15;
         $('#total').html('$' + tots);
        })
        
    // })
    
    $('input[type=radio][id=ship0]').click(function(e) {
       
       $('#ship0').attr('checked', 'checked');
       
    });
    
    $('input[type=radio][id=ship1]').click(function(e) {
       
       $('#ship1').attr('checked', 'checked');
       
    });
    
    // standard shipping
    $('form').change(function(e) {//'input[type=radio][id=ship0]').change(function(e) {
        for(let c = 0; c <= hid-1; c++) {
            $('#frame' + c).change(function(e) {
                frameID = $('#frame' + c).val();
                console.log(frameID);
            })}
        if($("input:radio[id='ship0']").is(":checked")) {
            console.log('YES');
            
            var shipIdStd = $('#ship0').val(); //console.log(shipIdStd);
            var storedTot = parseInt($('#hideTot').val());
            var storedQty = parseInt($('#hideFr').val());//console.log('stnd = ' + storedTot);
            // go through thresholds
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
                let thresh = info['freeThresholds'][i];
                
                // !!! CHANGE THIS - use frame and qty !!!
                if(shipIdStd == ship.id) {
                    if(frameID == 0){
                        var shCost = ship.rules['none'];
                    }
                    // determine price depending on size
                    else if(frameID > 0){
                      
                     if(storedQty < 10){
                        var shCost = ship.rules['under10'];
                    } else if(storedQty >= 10){
                        var shCost = ship.rules['over10'];
                    }
                    }
                    if(storedTot > thresh['amount']){
                        var shCost = 0;
                    }
                    var shipCost = parseInt(shCost);
                    $('#shipping').html('$' + shipCost);
                    // store in input type hidden for grand total
                    $('#shipCst').attr('value', shipCost);
                }
            }
            
        } else if($("input:radio[id='ship1']").is(":checked")) {
            console.log('YES EXP');
            
            var shipIdExp = $('#ship1').val(); // console.log(shipIdExp);
            var storedTot = parseInt($('#hideTot').val());
            var storedQty = parseInt($('#hideFr').val());//console.log('exp = ' + storedTot);
            
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
                let thresh = info['freeThresholds'][i];
                
                // !!! CHANGE THIS - use frame and qty !!!
                if(shipIdExp == ship.id) {
                    if(frameID == 0){
                        var shCost = ship.rules['none'];
                    }
                    // determine price depending on size
                    else if(frameID > 0){
                      
                     if(storedQty < 10){
                        var shCost = ship.rules['under10'];
                    } else if(storedQty >= 10){
                        var shCost = ship.rules['over10'];
                    } 
                    }
                    if(storedTot > thresh['amount']){
                        var shCost = 0;
                    }
                    var shipCost = parseInt(shCost);
                    $('#shipping').html('$' + shipCost);
                    // store in input type hidden for grand total
                    $('#shipCst').attr('value', shipCost);
                }
            }
        }
            
        var hidShipC = parseInt($('#shipCst').val()); //console.log('shipping cost = ' + hidShipC)
        var storedTot = parseInt($('#hideTot').val()); //console.log('stnd = ' + storedTot);
        
        var grand = hidShipC + storedTot;
        $('#total').html('$' + grand);
           
    }).change();
    
    
})