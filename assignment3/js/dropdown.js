//fills sizes
$.get("print-services.php", function(data){
    var info = $.parseJSON(data);
    
    // var defSize = info['sizes'][0];
    // var defOpS = $('<option>'+ defSize.name +'</option>');
    // defOpS.attr('value', defSize.id);
    // defOpS.attr('selected', true);
    // defOpS.appendTo('#size');
    
    // console.log(defOpS.attr('selected'));
    
    // fills size
    for(let i = 0; i < info['sizes'].length; i++){
        let size = info['sizes'][i];
        let sizeOp = $('<option>'+ size.name +'</option>');
        sizeOp.attr('value', size.id);
        sizeOp.appendTo('#size');
    }
                        // IGNORE -- TEST
                        // let sizeT = info['sizes'][2];
                        // let sizeOp = $('<option>'+ sizeT.name +'</option>');
                        // console.log('value of 11x14 = ' + sizeT.id);
                        // sizeOp.attr('value', sizeT.id);
                        // sizeOp.appendTo('#size');
                        
                        // let size2 = info['sizes'][3];
                        // let sizeOp2 = $('<option>'+ size2.name +'</option>');
                        // console.log('value of 12x18 = ' + size2.id);
                        // sizeOp2.attr('value', size2.id);
                        // sizeOp2.appendTo('#size');
    
    
    //fills paper
    for(let i=0; i < info['stock'].length; i++){
        let ppr = info['stock'][i];
        let pprOp = $('<option>'+ ppr.name +'</option>');
        pprOp.attr('value', ppr.id);
        pprOp.appendTo('#paper');
    }
    
    //fills frames
    // for(i=0;i<size['frame'].length; i++){
    //     let size1 = size['frame'][i];
    //     let sizeOp = $('<option>'+ size1.name +'</option>');
    //     sizeOp.attr('value', size1.id);
    //     sizeOp.appendTo('#frame');
    // }
    
    //quantity
    $("#inputsm").val(1);
    
    });
    
    $('#btnn').click(function calcTotal(){
        
        document.write('love');
});