//fills sizes
$.get("print-services.php", function(data){
let size = $.parseJSON(data);

for(i=0;i<size['sizes'].length; i++){
    let size1 = size['sizes'][i];
    let sizeOp = $('<option>'+ size1.name +'</option>');
    sizeOp.attr('value', size1.id);
    sizeOp.appendTo('#size');

}
                    // IGNORE -- TEST
                    // let sizeT = size['sizes'][2];
                    // let sizeOp = $('<option>'+ sizeT.name +'</option>');
                    // sizeOp.attr('value', sizeT.id);
                    // sizeOp.appendTo('#size');


//fills paper
for(i=0;i<size['stock'].length; i++){
    let size1 = size['stock'][i].name;
    let sizeOp = $('<option>'+ size1 +'</option>');
    sizeOp.attr('value', size1.id);
    sizeOp.appendTo('#paper');
}

//fills frames
for(i=0;i<size['frame'].length; i++){
    let size1 = size['frame'][i];
    let sizeOp = $('<option>'+ size1.name +'</option>');
    sizeOp.attr('value', size1.id);
    sizeOp.appendTo('#frame');
}

//quantity
$("#inputsm").val(1);

});

$('#btnn').click(function calcTotal(){
    
    document.write('love');
});