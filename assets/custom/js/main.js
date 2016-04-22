
$("#school_name").blur(function(){
    var name = $("#school_name").val();
    $.ajax({
        url: base_url+'super-admin-school/school/ajaxCheckForSchoolCode',
        type: "POST",
        data: {
            name: name,
        },
        success: function (data) {
            $("#school_code").val(data);
            $( "#school_code" ).focus();
        }
    });
});

$("#school_code").blur(function(){
    var code = $("#school_code").val();
    $.ajax({
        url: base_url+'super-admin-school/school/ajaxCheckForSchoolCodeExist',
        type: "POST",
        data: {
            code: code,
        },
        success: function (data) {
            if( data == "match" ){
                $( "#school_code" ).focus();
                $( ".alert-warning" ).css('display', 'block');
                $( ".alert-warning" ).html('<strong>Warning!</strong> The code of school all ready exist.');
            }else{
                $( ".alert-warning" ).css('display', 'none');
            }
        }
    });
});

$( "#register_form" ).submit(function( event ) {
    var password = $("#password").val();
    var retype = $("#retype_password").val();
    if(password != retype){
        $( ".alert-warning" ).css('display', 'block');
        $( ".alert-warning" ).html('<strong>Warning!</strong> Password and retype password not match.');
        return false;
    }else{
        $( ".alert-warning" ).css('display', 'none');
        return true;
    }
});

$( "#master_password_change_form" ).submit(function( event ) {
    var password = $("#new_password").val();
    var retype = $("#retype_password").val();
    if(password != retype){
        $( ".alert-warning" ).css('display', 'block');
        $( ".alert-warning" ).html('<strong>Warning!</strong> Password and retype password not match.');
        return false;
    }else{
        $( ".alert-warning" ).css('display', 'none');
        return true;
    }
});



function changeStatus(id, table){
    $.ajax({
        url: base_url+'common/common/ajaxChangeStatus',
        type: "POST",
        data: {
            id: id,
            table: table
        },
        success: function (data) {
            $(".status_"+id).html(data);
        }
    });
}

