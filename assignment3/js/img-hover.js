$(function() {
        
        var imgArr = $('.smallImg img');
        var imgHov = $('.hideImgH img');
        var err = $('.hideImgH');
        
        for(let i = 0; i < imgArr.length; i++) {
            
            var indImg = imgArr[i];
            var hidImg = imgHov[i];
            
            $(err[i]).hide();
            
            $(indImg).mouseover(function(e) {
                
                // use the alt of imgs to compare
                if($(imgArr[i]).attr('alt') == $(imgHov[i]).attr('alt')) { // .attr('id')
                    
                    // display the img using id of the hidden one
                    x = e.clientX + 20; y = e.clientY + 20;
                    $(err[i]).css({ left: x, top: y, display: "absolute" });
                    
                    $(err[i]).show();
                    
                }
                
                
            });
            
            $(indImg).mouseout(function(e) {
                $(err[i]).hide();
                
            });
            
            
        }
        

});