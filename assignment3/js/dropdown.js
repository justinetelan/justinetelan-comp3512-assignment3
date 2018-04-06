$.get("print-services.php", function(data){
    var info = $.parseJSON(data);
    var hid = $('#hide').val();
    
    // alert(hid);
    
    for(let c = 0; c <= hid-1; c++) {
        
        // console.log('c = ' + c);
        // console.log('hidden = ' + (hid-1));
    
        // fills size
        for(let i = 0; i < info['sizes'].length; i++){
            let size = info['sizes'][i];
            let sizeOp = $('<option>'+ size.name +'</option>');
            sizeOp.attr('value', size.id);
            sizeOp.appendTo('#size' + c);
        }
        
        //fills paper
        for(let i=0; i < info['stock'].length; i++){
            let ppr = info['stock'][i];
            let pprOp = $('<option>'+ ppr.name +'</option>');
            pprOp.attr('value', ppr.id);
            pprOp.appendTo('#paper' + c);
        }
        
        //fills frames
        for(let i=0; i < info['frame'].length; i++){
            let frame = info['frame'][i];
            let frameOp = $('<option id="fr' +i+ '">'+ frame.name +'</option>');
            frameOp.attr('value', frame.id);
            frameOp.appendTo('#frame' + c);
        }
        
        // // radio buttons
        // for(let i=0; i < info['shipping'].length; i++){
        //     let ship = info['shipping'][i];
            
        //     // console.log(ship);
            
        //     let shipRad = $('<input type="radio" name="rad">'+ ship.name +'</input>');
        //     shipRad.attr('value', ship.id);
        //     shipRad.appendTo('#rads');
            
        // }
        
        
        
        
        //quantity
        $("#inputsm" + c).val(1);
        
    }
   
    
    // console.log($(".inputsm").val());
    
    // $("#inputsm").val(1);
    // console.log($("#inputsm").val());
    
    // $('input[type="text"][class="inputsm"]').prop("value", 1);  
    
    });