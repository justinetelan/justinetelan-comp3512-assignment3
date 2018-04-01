$("#hi").click(function(){
    $.ajax({url: "print-services.php", success: function(result){
        $("#test").html(result); // use this to populate the select lists with the default values
    }});
});