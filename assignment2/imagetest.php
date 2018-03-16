<?php
echo '<div id="id" onmouseover="popIn("id2")" onmouseout="popOut("id2")">';
echo'<img src="images/square-small/222222.jpg" >';
echo '<div id="id2">
        <img src="images/square-small/222222.jpg" style="visibility: hidden">';
echo'</div>';
echo'</div>';
?>
<script>

                    function popIn(c){
                        var x = event.clientX;
                        var y = event.clientY;
                        var snowball = document.getElementById(c);
                         snowball.style.visibility="visible";
                        snowball.style.position = "absolute";
                        snowball.style.right = x + 'px';
                        snowball.style.top = y + 'px';
                        
                    }
                    function popOut(p){
                        document.getElementById(p).style.visibility="hidden";
                    }
                </script>
