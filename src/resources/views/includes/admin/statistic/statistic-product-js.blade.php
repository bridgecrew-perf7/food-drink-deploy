<script>
    function searchStatisticProductByTime(time,text)
{
    $.ajax({
        method: 'get',
        url: '/admin/statistic/product/search/' + time,
        dataType: 'json',
        data: {
            time: time
        },
        success: function(data) {
            list_product_statistic(data,text)
        }
    });
}

function searchStatisticProductByLastWeek(start_week,end_week,text)
{
    $.ajax({
        method: 'get',
        url: '/admin/statistic/product/last-week',
        dataType: 'json',
        data: {
            start_week : start_week,
            end_week : end_week
        },
        success: function(data) {
            list_product_statistic(data,text)
        }
    });
}

function list_product_statistic(data,text)
{
    var content = "";
    var stt = 1;
    for (var i = 0; i < data.length; i++) {
        content += "<tr><td>" + stt++ +
        "</td><td>" +
        data[i].name +
        "</td><td>" +
        "<img src='/images/products/"+data[i].image+"' id='img_product'>"+
        "</td><td>" +
        data[i].amount_of_order +
        "</td><td>" +
        text+
        "</td><td>" +
        new Intl.NumberFormat().format(data[i].total_money_order_product)+"đ" +
        "</td></tr>"
        }
    $('#statistic_product').html(content);
}
</script>