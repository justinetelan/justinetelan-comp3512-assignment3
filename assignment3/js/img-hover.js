$('.smallImg img').mouseover(function(e) {
    
    var imgs = $('.smallImg img');
    var src = $(this).attr('src');
    
    console.log('src = ' + $(this).attr('src'));
    console.log('alt = ' + $(this).attr('alt'));
    
    x = e.pageX + 20; y = e.pageY + 20;
    
    var hover = $('<img>');
    hover.attr('src', src);
    
    // temp = $('<div class="temp"></div>');
    
    prev = $('<div id="preview">');
    prev.append(hover).appendTo('#pre');
    
    $("#preview").css({ left: x, top: y, display: "block" });
    
});

// $('.smallImg img').mousemove(function(e){
//     xC = e.pageX + 20; yC = e.pageY + 20;
//     $("#preview").css({ top: yC, left: xC, display: "block"});
// });

$('.smallImg img').mouseleave(function(e){
    $('#preview').remove();
});