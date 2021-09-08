<script type="text/javascript">
    $(document).ready(function () {
        let url = new URL(window.location.href);
        let keyword = url.searchParams.get("keyword");
        let slug = url.pathname;
        if (slug && slug.indexOf("category-type") != -1) {
            slug = slug.slice(1).replace("/category-type", "");
        }else if (slug && slug.indexOf("category") != -1) {
            slug = slug.slice(1).replace("/category", "");
        } else {
            slug = "";
        }
        let page = 1, category = 0, sort_category = 0, sort_price = 0, min_price = 0, max_price = 0, rating = 0;
        // Set param old
        @if(isset($param['category'])){!! 'category='.$param['category'].';' !!}@endif
        @if(isset($param['sortCategory'])){!! 'sort_category='.$param['sortCategory'].';' !!}@endif
        @if(isset($param['sortPrice'])){!! 'sort_price='.$param['sortPrice'].';' !!}@endif
        @if(isset($param['minPrice'])){!! 'min_price='.$param['minPrice'].';' !!}@endif
        @if(isset($param['maxPrice'])){!! 'max_price='.$param['maxPrice'].';' !!}@endif
        @if(isset($param['rating'])){!! 'rating='.$param['rating'].';' !!}@endif
        // Button clear
        $('#buttonClear').click(function () {
            page = 1;
            category = 0;
            sort_category = 0;
            sort_price = 0;
            min_price = 0;
            max_price = 0;
            rating = 0;
            $('#minPrice').val('');
            $('#maxPrice').val('');
            $('#chkFoods').prop('checked', false);
            $('#chkDrinks').prop('checked', false);
            $("#filterRating1").removeClass("click-active");
            $("#filterRating2").removeClass("click-active");
            $("#filterRating3").removeClass("click-active");
            $("#filterRating4").removeClass("click-active");
            $("#filterRating5").removeClass("click-active");
            $('#sltPrice option[value=0]').prop('selected', true)
            $('#sltPrice option[value=0]').prop('selected', true);
            if (slug == "") {
                category = 0;
                $('#chkFoods').prop('checked', false);
                $('#chkDrinks').prop('checked', false);
            }
            filter_data();
        });
        // Sort Alphabet
        $('#sltCategory').on('change', function () {
            $('#sltPrice option[value=0]').prop('selected', true);
            sort_price = 0;
            sort_category = $(this).val();
        });
        // Sort Price
        $('#sltPrice').on('change', function () {
            $('#sltCategory option[value=0]').prop('selected', true);
            sort_category = 0;
            sort_price = $(this).val();
        });
        // Button rating
        $('#filterRating1').click(function () {
            rating = 1;
            activeStar('#filterRating1');
        });
        $('#filterRating2').click(function () {
            rating = 2;
            activeStar('#filterRating2');
        });
        $('#filterRating3').click(function () {
            rating = 3;
            activeStar('#filterRating3');
        });
        $('#filterRating4').click(function () {
            rating = 4;
            activeStar('#filterRating4');
        });
        $('#filterRating5').click(function () {
            rating = 5;
            activeStar('#filterRating5');
        });
        // Button Filter
        $('#filterApply').click(function () {
            let str_min_price = $('#minPrice').val();
            let str_max_price = $('#maxPrice').val();
            if (str_min_price || str_max_price) {
                if (!$.isNumeric(str_min_price) || !$.isNumeric(str_max_price)) {
                    min_price = 0;
                    max_price = 0;
                    alert("{{ __('custom.js_price_format') }}");
                    return;
                }
                str_min_price = Number(str_min_price);
                str_max_price = Number(str_max_price);
                if (str_min_price >= str_max_price) {
                    min_price = 0;
                    max_price = 0;
                    alert("{{ __('custom.js_price_value') }}");
                    return;
                }
                min_price = $('#minPrice').val();
                max_price = $('#maxPrice').val();
            }
            category = getValueCheckCategory();
            filter_data();
        });
        // Click page
        $('.pagination a').unbind('click').on('click', function (e) {
            e.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            filter_data();
        });
        // Filter data
        function filter_data() {
            if(keyword == null) {
                keyword = "";
            }
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url.origin + "/search",
                type: 'GET',
                contentType: "application/json; charset=utf-8",
                data: {keyword:keyword,slug:slug,page:page,category:category,sortCategory:sort_category,
                    sortPrice:sort_price,minPrice:min_price,maxPrice:max_price,rating:rating,
                },
                success: function (data) {
                    $('body').empty().html(data);
                }
            });
        }
    });
    // Check checked Category
    function getValueCheckCategory(){
        let chkFood = $("input#chkFoods");
        let chkDrink = $('input#chkDrinks');
        let value = 0;
        // Checked Food
        if (chkFood.is(':checked')) {
            value = 1;
        }
        // Checked Drink
        if (chkDrink.is(':checked')){
            value = 2;
        }
        if (chkFood.is(':checked') && chkDrink.is(':checked')) {
            value = 3;
        }
        return value;
    }
    // Click show CSS Star
    function activeStar(filterRating) {
        $("#filterRating1").removeClass("click-active");
        $("#filterRating2").removeClass("click-active");
        $("#filterRating3").removeClass("click-active");
        $("#filterRating4").removeClass("click-active");
        $("#filterRating5").removeClass("click-active");
        $(filterRating).addClass("click-active");
    }
</script>
