$.get("print-services.php", function(data){
  
    let info = $.parseJSON(data); 
    $('form').change(function() {
    
        // create variable for the value (id) of the option tag
        let id = $('option').attr('value');
        console.log('selected size = ' + id);
        
        // put this whole thing at the bottom (after retrieving all costs)
        for(let i = 0; i < info['sizes'].length; i++) {
            let iterate = info['sizes'][i];
            
            // if variable above matches id iterated, calculate the cost
            if(id == iterate.id) {
                console.log('id of iterated = ' + iterate.id);
                // console.log('works ' + iterate.cost);
                
                var price = iterate.cost * $('#inputsm').val();
                // console.log(price);
            }
            
        }
    
        $('#total').html('$' + price.toFixed(2));    
        
    }).change();
    
})