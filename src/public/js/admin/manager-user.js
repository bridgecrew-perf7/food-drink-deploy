function getUserById(id_user){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
        },
    });
    $.ajax({
        url : "/admin/user/get-id-user/" + id_user,
        method : "get",
        dataType : "json",
        data : {
            id_user : id_user
        },
        success: function(data){
            $("#form_active").prop("action", "/admin/user/active-block-user/" + data);
            $("#form_block").prop("action", "/admin/user/active-block-user/" + data);
        }
    });
}