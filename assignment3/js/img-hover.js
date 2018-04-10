$(function() {

    $('#pre img').mouseover(function(e) {
        
        var imgs = $('.smallImg img');
        var src = $(this).attr('src'); // store src of img hovered
        var title = $(this).attr('alt'); // store alt of img hovered
        
        console.log($('#hidImgTitle').val());
        
        // console.log('src = ' + $(this).attr('src'));
        // console.log('alt = ' + title);
        
        x = e.pageX + 20; y = e.pageY + 20;;
        
        var hover = $('<img>');
        hover.attr('src', src);
        
        
        var prev = $('<div id="preview"></div>');
        var imgT = $('<p>').html(title);
        prev.append(hover).appendTo('#pre');
        imgT.appendTo(prev);
        
        $("#preview").css({ left: x, top: y, display: "block" });
        
    });
    
    // // $('.smallImg img').mousemove(function(e){
    // //     xC = e.pageX + 20; yC = e.pageY + 20;
    // //     $("#preview").css({ top: yC, left: xC, display: "block"});
    // // });
    
    $('.smallImg img').mouseleave(function(e){
        $('#preview').remove();
    });

});