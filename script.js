$(document).ready(function (){
    $("#submit").click(function(){
        
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();

        $.ajax({
            url:'create.php',
            method: 'POST',
            data:{
                firstname : fname,
                lastname : lname,
                email : email
            },
            
        }).done(function(data){
            console.log(data);
        });
    });

    $('#form')[0].reset();
});