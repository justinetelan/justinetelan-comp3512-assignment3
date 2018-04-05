$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    var hid = $('#hide').val();
    var totalArray = new Array();
    
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
                
                if(frameID == frame.id) {
                    // determine price depending on size
                    if(sizeID == 0) {
                        var frCost = frame.costs[0];
                        // console.log('5x7 cost = ' + frCost)
                    } else if(sizeID == 1) {
                        var frCost = frame.costs[1];
                        // console.log('8x10 cost = ' + frCost)
                    } else if(sizeID == 2) {
                        var frCost = frame.costs[2];
                        // console.log('11x14 cost = ' + frCost)
                    } else if(sizeID == 3) {
                        var frCost = frame.costs[3];
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
            $('#overall').html('$' + totals);
            
            // put the total inside 'hidden' as its value
            var totHid = $('#hideTot').attr('value', totals);
            // var storedTot = totHid.val();
            // console.log('stored val = ' + totHid.val());
           
        } // end for loop
        
        
    }).change();
    
    
    // radio buttons
    for(let i=0; i < info['shipping'].length; i++){
        let ship = info['shipping'][i];
        let shipRad = $('<input type="radio" name="rad" id="ship' +i+'">'+ ship.name +'</input>');
        
        shipRad.attr('value', ship.id);
        shipRad.appendTo('#rads');
        
    }
    
    // !!! check standard by default - requirement !!!
    $('#ship0').attr('checked', 'checked'); // NOT WORKING - FIX
    
    
    $('input[type=radio][id=ship0]').click(function(e) {
       
       $('#ship0').attr('checked', 'checked');
       
    });
    
    $('input[type=radio][id=ship1]').click(function(e) {
       
       $('#ship1').attr('checked', 'checked');
       
    });
    
    // standard shipping
    $('form').change(function(e) {//'input[type=radio][id=ship0]').change(function(e) {
        
        
        if($("input:radio[id='ship0']").is(":checked")) {
            console.log('YES');
            
            var shipIdStd = $('#ship0').val(); //console.log(shipIdStd);
            var storedTot = parseInt($('#hideTot').val()); //console.log('stnd = ' + storedTot);
            // go through thresholds
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
                let thresh = info['freeThresholds'][i];
                
                // !!! CHANGE THIS - use frame and qty !!!
                if(shipIdStd == ship.id) {
                    
                    // determine price depending on size
                    if(storedTot < 5){
                      var shCost = ship.rules['none'];  
                    } else if(storedTot > 5 && storedTot < 10){
                        var shCost = ship.rules['under10'];
                    } else if(storedTot >10 && storedTot < thresh['amount']){
                        var shCost = ship.rules['over10'];
                    } else if(storedTot > thresh['amount']){
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
            var storedTot = parseInt($('#hideTot').val()); //console.log('exp = ' + storedTot);
            
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
                let thresh = info['freeThresholds'][i];
                
                // !!! CHANGE THIS - use frame and qty !!!
                if(shipIdExp == ship.id) {
                    // determine price depending on size
                    if(storedTot < 5){
                      var shCost = ship.rules['none'];  
                    }else if(storedTot > 5 && storedTot < 10){
                        var shCost = ship.rules['under10'];
                    }else if(storedTot >10 && storedTot < thresh['amount']){
                        var shCost = ship.rules['over10'];
                    }else if(storedTot > thresh['amount']){
                        var shCost = 0;
                    }
                    // console.log('8x10 cost = ' + frCost)
                
                
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
    
    // express shipping
    // $('form').change(function(e) {//'input[type=radio][id=ship1]').change(function(e) {
        
    //     // $('#ship1').click(function(e){
        
    //         var shipIdExp = $('#ship1').val(); // console.log(shipIdExp);
    //         var storedTot = parseInt($('#hideTot').val()); //console.log('exp = ' + storedTot);
            
    //         for(let i = 0; i < info['shipping'].length; i++) {
    //             let ship = info['shipping'][i];
    //             let thresh = info['freeThresholds'][i];
                
    //             // !!! CHANGE THIS - use frame and qty !!!
    //             if(shipIdExp == ship.id) {
    //                 // determine price depending on size
    //                 if(storedTot < 5){
    //                   var shCost = ship.rules['none'];  
    //                 }else if(storedTot > 5 && storedTot < 10){
    //                     var shCost = ship.rules['under10'];
    //                 }else if(storedTot >10 && storedTot < thresh['amount']){
    //                     var shCost = ship.rules['over10'];
    //                 }else if(storedTot > thresh['amount']){
    //                     var shCost = 0;
    //                 }
    //                 // console.log('8x10 cost = ' + frCost)
                
                
    //                 var shipCost = parseInt(shCost);
    //                 $('#shipping').html('$' + shipCost);
    //                 // store in input type hidden for grand total
    //                 $('#shipCst').attr('value', shipCost);
    //             }
    //         }
        
    //     // });
        
    // }).change();
    
    // $('input[type=radio]').click(function(e) {
        
    //     var hidShipC = parseInt($('#shipCst').val()); console.log('shipping cost = ' + hidShipC)
    //     var storedTot = parseInt($('#hideTot').val()); console.log('stnd = ' + storedTot);
        
        // var grand = hidShipC + storedTot;
        // console.log(grand);
        // $('#rads').empty();
        // $('#total').html('$' + grand);
        //  $('#ship1').prop('checked', false);
        
        
    // }).change();
    
    // $('#ship0').click(function(e){ // standard shipping
    // // for(let b = 0; b < info['shipping'].length; b++) {
            
            
            
    //         var shipId = $('#ship0').val();
    //         var storedTot = parseInt($('#hideTot').val());
    //         for(let i = 0; i < info['shipping'].length; i++) {
    //             let ship = info['shipping'][i];
    //             let thresh = info['freeThresholds'][i];
    //         if(shipId == ship.id) {
    //                 // determine price depending on size
                    
                        
    //                     if(storedTot < 5){
    //                       var shCost = ship.rules['none'];  
                            
    //                     }else if(storedTot > 5 && storedTot < 10){
    //                         var shCost = ship.rules['under10'];
    //                     }else if(storedTot >10 && storedTot < thresh['amount']){
    //                         var shCost = ship.rules['over10'];
    //                     }else if(storedTot > thresh['amount']){
    //                         var shCost = 0;
    //                     }
    //                     // console.log('5x7 cost = ' + frCost)
                   
                    
    //                 var shipCost = parseInt(shCost);
    //         }
    //             // }
            
            
            
    // }
    // var grand = shipCost + storedTot;
    //         // console.log('tst: ' + grand);
    //         // $('#rads').empty();
    //         $('#total').html('$' + grand);
    //         //  $('#ship1').prop('checked', false);
    // })
    
    
    // $('#ship1').click(function(e){ // express shipping
    // // for(let b = 0; b < info['shipping'].length; b++) {
            
    //         var shipId = $('#ship1').val();
    //         var storedTot = parseInt($('#hideTot').val());
    //         for(let i = 0; i < info['shipping'].length; i++) {
    //             let ship = info['shipping'][i];
    //             let thresh = info['freeThresholds'][i];
    //         if(shipId == ship.id) {
    //                 // determine price depending on size
                    
    //                     if(storedTot < 5){
    //                       var shCost = ship.rules['none'];  
    //                     }else if(storedTot > 5 && storedTot < 10){
    //                         var shCost = ship.rules['under10'];
    //                     }else if(storedTot >10 && storedTot < thresh['amount']){
    //                         var shCost = ship.rules['over10'];
    //                     }else if(storedTot > thresh['amount']){
    //                         var shCost = 0;
    //                     }
    //                     // console.log('8x10 cost = ' + frCost)
                    
                    
    //                 var shipCost = parseInt(shCost);
    //                 // $('#hideShip').attr('value', shipCost);
    //                 // console.log(shCost);
    //         }
    //             // }
            
            
            
    // }   
    // var grand = shipCost + storedTot;
    //         // console.log('tst: ' + grand);
    //         // $('#rads').empty();
    //         $('#total').html('$' + grand);
    //         // $('#ship1').prop('checked', false);
    // });
    
    // $('form').change(function(e){
        
    //     $('#ship1').prop('checked', false);
    //     $('#ship1').prop('checked', false);
        
    // })
    
})