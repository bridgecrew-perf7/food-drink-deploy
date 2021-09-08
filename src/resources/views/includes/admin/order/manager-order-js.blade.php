<script>

function listContentOrder(data){
    var content = "";
    var text = "";
    var class_div = "";
    var class_button_2 = "";
    var data_target_2 = "";
    var class_tag_i_2 = "";
    var class_button_3 = "";
    var data_target_3 = "";
    var class_tag_i_3 = "";
    var hidden = "";
    var stt = 1;
    for (var i = 0; i < data.data.length; i++) {
        if(data.data[i].status_order == 0){
            text = "{{__('custom.Unconfimred')}}";
            class_div = 'success';
            class_button_2 = 'btn btn-success';
            data_target_2 = '#modalConfirmOrder';
            class_tag_i_2 = 'fa fa-check';
            class_button_3 = 'btn btn-danger';
            data_target_3 = '#modalCancelOrder';
            class_tag_i_3 = 'fa fa-times';
            hidden = '';
        }
        else if(data.data[i].status_order == 1){
            text = "{{__('custom.Confirmed')}}";
            class_div = 'primary';
            class_button_2 = 'btn btn-primary';
            data_target_2 = '#modalDeliveryOrder';
            class_tag_i_2 = 'fa fa-truck';
            class_button_3 = 'btn btn-danger';
            data_target_3 = '#modalCancelOrder';
            class_tag_i_3 = 'fa fa-times';
            hidden = '';
        }
        else{
            text = "{{__('custom.Cancelled')}}";
            class_div = 'danger';
            class_button_2 = 'btn btn-danger';
            data_target_2 = '#modalDeleteOrder';
            class_tag_i_2 = 'far fa-trash-alt';
            hidden = 'hidden';
        }

        content += "<tr><td>" + stt++ +
            "</td><td>" +
            data.data[i].order_date +
            "</td><td>" +
            data.data[i].name +
            "</td><td>" +
            new Intl.NumberFormat().format(data.data[i].total_money)+"đ" +
            "</td><td>" +
            "<div class='badge badge-"+class_div+" text-wrap' style='width: 6rem;'>"+text+"</div>" +
            "</td><td>" +
            "<button class='btn btn-warning' onclick='getOrderDetail("+data.data[i].id_order+")' data-toggle='modal' data-target='#modalViewDetail'><i class='fa fa-eye'></i></button> "+
            "<button class='"+class_button_2+"' onclick='getOrderById("+data.data[i].id_order+")' data-toggle='modal' data-target='"+data_target_2+"'><i class='"+class_tag_i_2+"'></i></button> " +
            "<button class='"+class_button_3+"' onclick='getOrderById("+data.data[i].id_order+")' data-toggle='modal' data-target='"+data_target_3+"'"+hidden+"><i class='"+class_tag_i_3+"'></i></button>" +
            "</td></tr>"
        }
        $("#list_product_order").html(content);    
}

function getOrderDetail(id_order){
    $.ajax({
        url : "/admin/order/" + id_order,
        method : "get",
        dataType : "json",
        success: function(data){
            $("#id_order").text(data.id_order);
            $("#user_oder").text(data.name);
            $("#email_user").text(data.email);
            $("#phone_user").text(data.phone);
            $("#address_user").text(data.address);
            $("#total_money_user").text(new Intl.NumberFormat().format(data.total_money)+"đ");
            $("#order_date_user").text(data.order_date);

            var content = "";
            var text = "";
            var class_div = "";
            if(data.status == 0){
                text = "{{__('custom.Unconfimred')}}";
                class_div = 'success';
            }
            else if(data.status == 1){
                text = "{{__('custom.Confirmed')}}";
                class_div = 'primary';
            }
            else{
                text = "{{__('custom.Cancelled')}}";
                class_div = 'danger';
            }

            content += "<div class='badge badge-"+class_div+" text-wrap' style='width: 6rem;'>"+text+"</div>";
            $("#status_user").html(content);
            // $("#status_user").html("{!!checkStatusOrder('"+data.status+"')!!}");
        }
    });

    $.ajax({
        url: "/admin/order/list-product-order/" + id_order,
        method: "get",
        dataType: "json",
        success: function(data) {
            var content = "";
            var stt = 1;
            for (var i = 0; i < data.data.length; i++) {
                content += "<tr><td>" + stt++ +
                    "</td><td>" +
                    data.data[i].name +
                    "</td><td>" +
                    "<img src='/images/products/" + data.data[i].image + "' style='width: 50px;height: 50px;'>" +
                    "</td><td>" +
                    data.data[i].amount_of_product +
                    "</td><td>" +
                    new Intl.NumberFormat().format(data.data[i].price)+"đ" +
                    "</td><td>" +
                    new Intl.NumberFormat().format(data.data[i].total_money)+"đ" +
                    "</td></tr>"
            }
            $("#list_product_modal").html(content);
        }
    });
}

//event click radio all time
$(document).on('click', '#exampleRadios1', function() {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/admin/order/all-time',
        dataType: 'json',
        success: function(data) {
            listContentOrder(data);
        }
    });
});


function getOrderByDateTime(datetime) {
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/admin/order/datetime',
        dataType: 'json',
        data: {
            datetime: datetime
        },
        success: function(data) {
            listContentOrder(data)
        }
    });
}


function getOrderByLastWeek(start_week,end_week){
    $("#form_filter").prop("hidden", true);
    $.ajax({
        method: 'get',
        url: '/admin/order/last-week',
        dataType: 'json',
        data: {
            start_week : start_week,
            end_week : end_week
        },
        success: function(data) {
            listContentOrder(data);
        }
    });
}


$(document).on('click', '#exampleRadios7', function() {
    $("#form_filter").prop("hidden", false);
});


function filterByDate() {
    if ($('#inputDate1').val() == "" || $('#inputDate2').val() == "") {
        alert('Hãy chọn thời gian!')
    } else {
        $.ajax({
            method: 'get',
            url: '/admin/order/filter-by-datetime',
            dataType: 'json',
            data: {
                inputDate1: $('#inputDate1').val(),
                inputDate2: $('#inputDate2').val()
            },
            success: function(data) {
                listContentOrder(data);
            }
        });
    }
}


//event click option status order
$("#status_order").change(function() {
    $.ajax({
        method: 'get',
        url: '/admin/order/status',
        dataType: 'json',
        data: {
            status_order: $('#status_order option:selected').val()
        },
        success: function(data) {
            listContentOrder(data);
        }
    });
});

function getOrderById(id_order){
    $.ajax({
        url : "/admin/order/" + id_order + "/edit",
        method : "get",
        dataType : "json",
        success: function(data){
            $("#form_confirm").prop("action", "/admin/order/" + data);
            $("#form_cancel").prop("action", "/admin/order/" + data);
        }
    });
}
</script>