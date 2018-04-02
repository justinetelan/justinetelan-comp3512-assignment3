$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    $('form').change(function() {
    
        var sizeID = $('#size').val(); // console.log('selected size = ' + sizeID);
        // get size cost
        for(let i = 0; i < info['sizes'].length; i++) {
            let sizes = info['sizes'][i];
            // if variable above matches id iterated, calculate the cost
            if(sizeID == sizes.id) {
                var sizeCost = sizes.cost;
            }
        }
        
        var paperID = $('#paper').val(); console.log('selected paper = ' + paperID);
        // get stock cost
        for(let i = 0; i < info['stock'].length; i++) {
            var paper = info['stock'][i];
            
            // console.log(paper.id);
            
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
                var paperCost = stCost;
                // console.log('overall paper = ' + paperCost);
            }
        }
    
    
    
    
    
    
        // calculate price at the bottom
        console.log(sizeCost); console.log(paperCost);
        var sum = sizeCost + paperCost;
        var price = sum * $('#inputsm').val();
        console.log('overall price = ' + price)
        // $('#total').html('$' + price.toFixed(2));
        
    }).change();
    
})