function getCategoryById(id_category){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
        },
    });
    $.ajax({
        url : "/admin/category/getcategory-by-id/" + id_category,
        method : "get",
        dataType : "json",
        success: function(data){
            $("#form_show").prop("action", "/admin/category/show-hidden/" + data);
            $("#form_hidden").prop("action", "/admin/category/show-hidden/" + data);
        }
    });
}