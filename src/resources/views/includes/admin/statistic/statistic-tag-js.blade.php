<script>
    function searchStatisticTagByTime(time,text)
{
    $.ajax({
        method: 'get',
        url: '/admin/statistic/tag/search/' + time,
        dataType: 'json',
        success: function(data) {
            list_tag_statistic(data,text)
        }
    });
}

function searchStatisticTagByLastWeek(start_week,end_week,text)
{
    $.ajax({
        method: 'get',
        url: '/admin/statistic/tag/last-week',
        dataType: 'json',
        data: {
            start_week : start_week,
            end_week : end_week
        },
        success: function(data) {
            list_tag_statistic(data,text)
        }
    });
}

function list_tag_statistic(data,text)
{
    var content = "";
    var stt = 1;
    for (var i = 0; i < data.length; i++) {
        content += "<tr><td>" + stt++ +
        "</td><td>" +
        data[i].name +
        "</td><td>" +
        data[i].number_of_search_tag +
        "</td><td>" +
        text+
        "</td></tr>"
        }
    $('#statistic_tag').html(content);
}
</script>