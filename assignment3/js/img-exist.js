$(window).bind("load", function() {
    $("button").click(function () { 
        $("#existIm").show();
        setTimeout(function() { $("#existIm").hide(); }, 5000);
    });
});