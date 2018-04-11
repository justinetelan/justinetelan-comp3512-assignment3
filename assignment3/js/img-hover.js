$(function() {
        
        // document.querySelectorAll(".hideImgH").style.visibility="hidden";
        // $('.hideImgH').hide();
        
        var imgArr = $('.smallImg img');
        var imgHov = $('.hideImgH img');
        var err = $('.hideImgH');
        
        // !!! JS VERSION !!!
        // var all = document.querySelectorAll('.hideImgH');//imgHov[i].id);
        
        for(let i = 0; i < imgArr.length; i++) {
            
            var indImg = imgArr[i];
            var hidImg = imgHov[i];
            
            // console.log(indImg);
            // console.log(hidImg);
            
            $(err[i]).hide();
            
            // !!! JS VERSION !!!
            // all[i].style.visibility="hidden";
            
            $(indImg).mouseover(function(e) {
                
                // use the alt of imgs to compare
                if($(imgArr[i]).attr('alt') == $(imgHov[i]).attr('alt')) { // .attr('id')
                    
                    // display the img using id of the hidden one
                    x = e.clientX + 20; y = e.clientY + 20;
                    $(err[i]).css({ left: x, top: y, display: "absolute" });
                    
                    $(err[i]).show();
                    
                    // var x = e.clientX;
                    // var y = e.clientY ;
                    
                    // !!! JS VERSION !!!
                    // var obj = imgHov[i].innerHTML;
                    // var obj = document.getElementById(imgHov[i].id);//".hideImgH div");// " + imgHov[i].id);//document.getElementById(c); // get element by imageID
                    // console.log(obj.innerHTML);
                    // obj.style.visibility="visible";
                    // obj.style.position = "absolute";
                    // obj.style.left = x;
                    // obj.style.top = y;
                }
                
                
            });
            
            $(indImg).mouseout(function(e) {
                $(err[i]).hide();
                
                // !!! JS VERSION !!!
                // var obj = document.getElementById(imgHov[i].id);
                // obj.style.visibility="hidden";
                
            });
            
            
        }
        
        // console.log(imgArr);
        
        // console.log('hi');
        
        // var src = $(this).attr('src'); // store src of img hovered
        // var title = $(this).attr('alt'); // title of small img
        
        // x = e.pageX + 20; y = e.pageY + 20;
        
        // console.log('image id sm = ' . $(''))
        
        // var hover = $('<img>');
        // hover.attr('src', src);
        
        // var prev = $('<div id="preview"></div>');
        // var imgT = $('<p>').html(title);
        // prev.append(hover).appendTo('#pre');
        // imgT.appendTo(prev);
        
        // $("#preview").css({ left: x, top: y, display: "absolute" });
        
    // });

});