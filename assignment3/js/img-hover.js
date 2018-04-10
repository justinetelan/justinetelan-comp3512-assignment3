$(function() {
    
    $('#pre img').mouseover(function(e) {
        
        var src = $(this).attr('src'); // store src of img hovered
        var title = $(this).attr('alt'); // title of small img
        
        x = e.pageX + 20; y = e.pageY + 20;
        
        var hover = $('<img>');
        hover.attr('src', src);
        
        var prev = $('<div id="preview"></div>');
        var imgT = $('<p>').html(title);
        prev.append(hover).appendTo('#pre');
        imgT.appendTo(prev);
        
        $("#preview").css({ left: x, top: y, display: "absolute" });
        
    });
    
    $('#pre img').mouseleave(function(e){
        $('#preview').remove();
    });

});