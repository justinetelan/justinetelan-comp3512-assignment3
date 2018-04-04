// var sum = 0;

$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    var hid = $('#hide').val();
    var totalArray = new Array();
    
    $('form').change(function() { // OR PUT 'select'
    
        var totals =0;
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
        
        
            // // frame cost
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
            
            console.log('totalss = ' + $('#total' + c).text());
            var add = $('#total' + c).text();
            totals += parseInt(add);
            console.log(totals)
            $('#overall').html('$' + totals);
            
            
                        for(let b = 0; b <= hid-1; b++) {
            var shipId = $('#ship' + b).val();
            for(let i = 0; i < info['shipping'].length; i++) {
                let ship = info['shipping'][i];
            if(shipId == ship.id) {
                    // determine price depending on size
                    if(sizeID == 0) {
                        
                        if(totals < 5){
                          var shCost = ship.rules[0];  
                            
                        }else if(totals > 5 && totals < 10){
                            var shCost = ship.rules[1];
                        }else if(totals >10){
                            var shCost = ship.rules[2];
                        }
                        // console.log('5x7 cost = ' + frCost)
                    } else if(sizeID == 1) {
                        if(totals < 5){
                          var shCost = ship.rules[0];  
                        }else if(totals > 5 && totals < 10){
                            var shCost = ship.rules[1];
                        }else if(totals >10){
                            var shCost = ship.rules[2];
                        }
                        // console.log('8x10 cost = ' + frCost)
                    }
                    
                    var shipCost = shCost;
            }
                }
            }
            
            var grand = shipCost + totals;
            $('#ships').html('$' + grand);
            
            
            
            
           
        }

        
        
        
        
    }).change();
    
})