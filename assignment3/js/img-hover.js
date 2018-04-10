$('.smallImg img').mouseover(function(e) {
    
    var imgs = $('.smallImg img');
    var src = $(this).attr('src');
    var title = $(this).attr('alt');
    
    console.log('src = ' + $(this).attr('src'));
    console.log('alt = ' + title);
    
    // x = e.pageX + 20; y = e.pageY + 20;
    
    var hover = $('<img>');
    hover.attr('src', src);
    
    // temp = $('<div id="temp">');
    
    var prev = $('<div id="preview">');
    var imgT = $('<p>').html(title);
    prev.append(hover).appendTo('#pre');
    imgT.appendTo(prev);
    
    $("#preview").css({ left: e.clientX, top:e.clientY });//left: x, top: y, display: "block" });
    
});

$('.smallImg img').mousemove(function(e){
    xC = e.pageX + 20; yC = e.pageY + 20;
    $("#preview").css({ top: yC, left: xC, display: "block"});
});

$('.smallImg img').mouseleave(function(e){
    $('#preview').remove();
});