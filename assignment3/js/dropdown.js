$.get("print-services.php", function(data){
    var info = $.parseJSON(data);
    
    // fills size
    for(let i = 0; i < info['sizes'].length; i++){
        let size = info['sizes'][i];
        let sizeOp = $('<option>'+ size.name +'</option>');
        sizeOp.attr('value', size.id);
        sizeOp.appendTo('#size');
    }
    
    //fills paper
    for(let i=0; i < info['stock'].length; i++){
        let ppr = info['stock'][i];
        let pprOp = $('<option>'+ ppr.name +'</option>');
        pprOp.attr('value', ppr.id);
        pprOp.appendTo('#paper');
    }
    
    //fills frames
    for(let i=0; i < info['frame'].length; i++){
        let frame = info['frame'][i];
        let frameOp = $('<option>'+ frame.name +'</option>');
        frameOp.attr('value', frame.id);
        frameOp.appendTo('#frame');
    }
    
    //quantity
    $("#inputsm").val(1);
    
    });
    
    $('#btnn').click(function calcTotal(){
        
        document.write('love');
});