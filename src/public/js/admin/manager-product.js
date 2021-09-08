function getProductById(id_product){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"),
        },
    });
    $.ajax({
        url : "/admin/product/getproduct-by-id/" + id_product,
        method : "get",
        dataType : "json",
        success: function(data){
            $("#form_show").prop("action", "/admin/product/show-hidden/" + data);
            $("#form_hidden").prop("action", "/admin/product/show-hidden/" + data);
        }
    });
}


function getCategory(id_categorytype)
{
    $.ajax({
        url : "/admin/product/category-multi-level/" + id_categorytype,
        method : "get",
        dataType : "json",
        success: function(data){
            var content="";
            for (var i = 0; i < data.length; i++) {
                content+="<li>"+
                "<a class='dropdown-item' href='/admin/product/category/"+data[i].id+"' onmouseover='getProduct("+data[i].id+")'>"+data[i].name+"</a>"+
                "<ul class='dropdown-menu dropdown-submenu' id='product_multi_"+data[i].id+"'>"+
                "</ul>"+
                "</li>";
                $("#category_multi_"+data[i].category_types_id+"").html(content);
            }
        }
    });
}

function getProduct(id_product)
{
    $.ajax({
        url : "/admin/product/product-multi-level/" + id_product,
        method : "get",
        dataType : "json",
        success: function(data){
            var content="";
            for (var i = 0; i < data.length; i++) {
                content+="<li><a class='dropdown-item' href='/admin/product/"+data[i].id+"'>"+data[i].name+"</a></li>";
                $("#product_multi_"+data[i].category_id+"").html(content);
            }
        }
    });
}
