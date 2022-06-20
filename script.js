// $(document).on('click', '#submit', function(e){
//     e.preventDefault();

//     var fname = $('#fname').val();
//     var lname = $('#lname').val();
//     var email = $('#email').val();
//     var submit = $('#submit').val();

//     $.ajax({
//         url: 'create.php',
//         type: 'post',
//         data: {
//             firstname : fname,
//             lastname : lname,
//             email : email,
//             submit: submit
//         },
//         success: function(response){
//             // fetch();
//             $('#message').html(response);
//         }
//     });

//     $('#form')[0].reset();
// });



$(document).ready(function (){
    $('#form').submit(function (e){
        e.preventDefault();

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var submit = $('#submit').val();

        $.ajax({
            url : 'create.php',
            type: 'post',
            data : {
                firstname : fname,
                lastname : lname,
                email : email,
                submit : submit
            },
            success: function(response){
                $('#message').html(response)
            }
        });

        $('#form')[0].reset();
    });
});