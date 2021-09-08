<script type="text/javascript" src="{{ asset('js/web/product-detail.js') }}"></script>
<script>
    // Check Form submit
    $("#formStartRating").submit(function () {
        if ($("#review").val() === "") {
            alert("{{ __('custom.js_rating_empty') }}")
            return false;
        }
        if ($("#valueStar").val() == 0) {
            alert("{{ __('custom.js_rating_star') }}")
            return false;
        }
    });
</script>
