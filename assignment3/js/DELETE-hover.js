// $('.smallImg img').mouseover(function(e) {
    
    // $(this).addClass("gray");
    // var object = $(this).attr("alt");
    // x = e.pageX + 20; y = e.pageY + 20;
    
    
    var imgs = document.querySelectorAll('.smallImg img');//$('#smallImg img');//.attr('src');
    // console.log(imgs);
    
    for(let i = 0; i < imgs.length; i++) {
        var temp = imgs[i];
        
        console.log(temp);
        
        // $(temp).mouseover(function(e) {
        
        temp.addEventListener('mouseover', function(e) {
            
            console.log(temp);
            var imgID = $(temp).attr('alt');
            var src = $(imgs[i]).attr('src');
            var verifID = $('#hide').val();
            
            // console.log(imgID + ' = '); console.log(verifID);
            
            
        });
        
            
            
            // if(imgID == verifID) {
                // console.log(src);
            // }
            
            // console.log('in');
            
        
        // console.log($(temp).attr('src'));
        
        // var src = temp.attr('src');
        
        
        // console.log('img id =' + imgID);
        // console.log('img src =' + src);
        // console.log('verify id = ' + verifID)
        
        // });
        
    }
    
    
    // console.log('src = ' + src);
    // console.log('imgID = ' + imgID);
    // console.log('verify = ' + verifID);
    
    // if(imgID == verifID) {
    //     console.log(src);
    // }
    
    
    // for(var i = 0; i < images.length; i++) {
    
    //     if(images[i]['title'] === object) {
            
    //         lg = images[i]; path = "images/medium/" + lg.path;
    //         let lgPic = $('<img>');
    //         lgPic.attr("src", path); lgPic.attr("alt", lg.title);
            
    //         prev = $('<div id="preview">');
    //         prev.append(lgPic).appendTo(".gallery");
    //         let content = lg.title  + '</br><i>' + lg.city + ', ' + lg.country + ' [' + lg.taken + ']' + '</i>';
    //         let descp = $('<p>');
    //         descp.html(content);
    //         descp.appendTo(prev);
            
    //         $("#preview").css({ left: x, top: y, display: "block" });
    //     }
    // }
// });