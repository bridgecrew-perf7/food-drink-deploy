<script type="text/javascript">

var pusher = new Pusher('4af7768011fe807be163', {
    cluster: 'ap1',
    encrypted: true
});
     
var channel = pusher.subscribe('channel-order-notification');
     
channel.bind('App\\Events\\OrderNotificationEvent', function(data) {
    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCount = notificationsToggle.find('span.badge');
    var count = Number(notificationsCount.text());
    var notifications          = notificationsWrapper.find('li.notification-box');
    var existingNotifications = notifications.html();
    var newNotificationHtml = "<div class='row'>" +
                                    "<div class='col-lg-3 col-sm-3 col-3 text-center'>" +
                                        "<img src='"+data.image+"' class='image_notify'>" +
                                    "</div>" +
                                    "<div class='col-lg-7 col-sm-7 col-7'>" +
                                        "<div>" +
                                        data.message +
                                        "</div>" +
                                        "<small class='text-warning'>"+data.created_at+"</small>" + 
                                    "</div>" +
                                    "<div class='col-md-1'>" +
                                        "<i class='fa fa-trash' style='color:#CB1E26;'></i>" +
                                    "</div>" +
                                "</div>";
    notifications.html(newNotificationHtml + existingNotifications);
    count += 1;
    notificationsCount.text(count);
    notificationsCount.prop("hidden", false);
});


function setCountNotification()
{
    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCount = notificationsToggle.find('span.badge');
    notificationsCount.prop("hidden", true);
    notificationsCount.text(Number(0));
}
</script>