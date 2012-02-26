function set_login_error(errs) {
    for(var key in errs) {
        if( errs.hasOwnProperty(key) ) {
            $('#'+key)
                .addClass('error')
                .focus(function() {
                    $(this)
                        .removeClass('error')
                        .unbind();
                        $(this).siblings("label[for='"+$(this).attr('id')+"']")
                            .text('');
                });
            $('#'+key+'-l').text(errs[key]);
        }
    }
    return false;
}
function manage_login() {

    $('#login_site').submit(function() {
        var email,pass,err=Object();

        if( !Modernizr.inputtypes.email ) {
            // validate email
        }

        if((email=$('#l_email').val()).length<5) err['l_email']="Too short email";
        if((pass=$('#l_password').val()).length<6) err['l_password']="Too short password";

        // TODO: jquery has errors and me need to fix it ;(
        if( err.count() ) return set_login_error(err);

        $.ajax({data:$(this).serialize(),success:function(data){
            console.log(data);
        }});

        // send $.ajax() with login|password
            // process responce
                // no log required since it was already logged on server
                // if valid login
                    // swap contents of #main from login to responce
                // else
                    // show error to the user
        return false;
    });

    $('#register_site').submit(function() {
        var email,pass,err=Object();

        if( !Modernizr.inputtypes.email ) {
            // validate email
        }

        if((email=$('#r_email').val()).length<5) err['r_email']="Too short email";
        if( $('#r_email2').val() != $('#r_email').val() ) err['r_email2']="Emails don't match.";
        if((pass=$('#r_password').val()).length<6) err['r_password']="Too short password";

        // TODO: jquery has errors and me need to fix it ;(
        if( err.count() ) return set_login_error(err);

        $.ajax({data:$(this).serialize(),success:function(data){
            console.log(data);
        }});

        return false;
    });

    $('#forgot_site').click(function() {

        $.ajax({
            data: {action: "script"},
            dataType: 'script'
        });

        return false;
    });
}


function not_yet_implemented() {
    $('.openid_btn').click(function(){
        $('#not-yet-implemented').fadeIn('fast', function(){
            $(this).delay(600).fadeOut();
        });
        return false;
    });
}

$(function() {

    manage_login();

    

    not_yet_implemented();
});