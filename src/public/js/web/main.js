/*price range*/

if ($.fn.slider) {
    $("#sl2").slider();
}

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: "300", // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            scrollText: "<i class=\"fa fa-angle-up\"></i>", // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 9, // Z-Index for the overlay
        });
    });
});

/*upload image*/
$('#lfm').filemanager('image');

/*change password*/
$(document).ready(function(){
    //console.log($('a[data-toggle="tab"]:first').tab('show'))
    $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
        //save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    //go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if ($('a[href=' + lastTab + ']').length > 0) {
        $('a[href=' + lastTab + ']').tab('show');
    }
    else
    {
        // Set the first tab if cookie do not exist
        $('a[data-toggle="tab"]:first').tab('show');
    }
})

/* Set message alert */
setTimeout(function(){
    $("#message_time").hide(); // hide message
}, 5000); // 5000ms

/* Pin Header when scroll */
let header = document.getElementById("header-middle");
let section = document.getElementById("section");
let sticky = header.offsetTop;

function scrollWindowFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky-header");
    section.classList.add("sticky-section");
  } else {
    header.classList.remove("sticky-header");
    section.classList.remove("sticky-section");
  }
}

window.onscroll = function() {
  scrollWindowFunction();
};

// menu multi level
function getCategory(id_categorytype){
    $.ajax({
        url : "/get-category/" + id_categorytype,
        method : "get",
        dataType : "json",
        success: function(data){
            var content="";
            for (var i = 0; i < data.length; i++) {
                content+="<li><a href='/"+data[i].slug+"/category' id='dropdown-item'>"+data[i].name+"</a></li>";
                if(data[i].category_types_id == 1){
                    $("#list_category_food").html(content);
                }
                else{
                    $("#list_category_drink").html(content);
                }
            }
        }
    });
}
