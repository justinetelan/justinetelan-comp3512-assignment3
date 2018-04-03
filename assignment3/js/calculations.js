$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    $('form').change(function() {
    
        // size cost
        var sizeID = $('#size').val(); // console.log('selected size = ' + sizeID);
        for(let i = 0; i < info['sizes'].length; i++) {
            let sizes = info['sizes'][i];
            // if variable above matches id iterated, calculate the cost
            if(sizeID == sizes.id) {
                var sizeCost = sizes.cost;
            }
        }
        
        // stock cost
        var paperID = $('#paper').val(); //console.log('selected paper = ' + paperID);
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
            }
            var paperCost = stCost;
        }
    
    
        // frame cost
        var frameID = $('#frame').val(); console.log('selected frame = ' + frameID);
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
            }
            var frameCost = frCost;
        }
        
        // calculate overall price
        // console.log(sizeCost); console.log(paperCost); console.log(frameCost);
        var sum = sizeCost + paperCost + frameCost;
        
        // put in an ARRAY to calculate OVERALL total
        var price = sum * $('#inputsm').val();
        $('#total').html('$' + price.toFixed(2));
    
        // calculate OVERALL total here
        $('#overall').html('$' + price.toFixed(2));
        
    }).change();
    
})