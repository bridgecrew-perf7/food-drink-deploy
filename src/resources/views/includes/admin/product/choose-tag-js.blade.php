<script>

function chooseTag(id_tag,name_tag)
{
    var content = "";
    content += "<tr data-id='"+id_tag+"'>" +
    "<td id='id_tag' hidden>"+id_tag+"</td>" + 
    "<td>"+name_tag+"</td>" + 
    "<td><button class='btn btn-danger' onclick='removeTag('"+id_tag+"')'><i class='fas fa-trash-alt'></i></button></td>" +
    "</tr>";

    checkTag(id_tag) == true ? $('#list_tags').append(content) : alert("{{__('custom.error_choose_tag')}}");
}

function checkTag(id_tag)
{
    var flag = true;
    $('#tableTag tbody tr').each(function(index,tr){
        if($(tr).attr('data-id') == id_tag){
            flag = false;
        }
    });
    return flag;
}

function removeTag(id_tag)
{
    $('#tableTag tbody tr').each(function(index, tr) {
        if ($(tr).attr('data-id') == id_tag) {
            $(tr).remove();
        }
    });
}

function saveChooseTag(id_product)
{
    var row_tr = document.getElementById("tableTag").rows.length;
    row_tr == 1 ? alert("{{__('custom.error_count_tag')}}") : deleteTag(id_product);
}

function deleteTag(id_product)
{
    function index() {
        window.location = "/admin/product/choose-tag/" + id_product;
    }
    $.ajax({
        url : "/admin/product/delete-tag/" + id_product,
        method : "get",
        dataType : "json",
        success : function(data){
            console.log(data);
            saveTag(id_product);
            setTimeout(index, 1000);
        }
    });
}

function saveTag(id_product)
{
    $('#tableTag tbody tr').each(function(index, tr) {
        $.ajax({
            url: '/admin/product/save-tag',
            method: 'get',
            dataType: 'json',
            data: {
                product_id : id_product,
                tag_id : $(tr).find("td#id_tag").text(),
            },
            success: function(data) {
                console.log(data);
                swal(data, "{{__('custom.You clicked the button')}}", "success");
            }
        });
    });
}

</script>