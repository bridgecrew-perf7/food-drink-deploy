<script>tinymce.init({selector: '#content'});</script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: ["advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | link image"
    });

    var jcAlert = $.alert({
        title: "{{__('custom.message')}}",
        lazyOpen: true,
    });

    $(document).ready(function () {
        /* Init Category */
        let category_food = $("#categoryFood");
        let category_drink = $("#categoryDrink");
        let category_remove = "drink";
        category_drink.hide();
        /* Select radio */
        $("input[type=radio][name=categoryType]").change(function () {
            if (this.value == 'food') {
                category_food.show();
                category_drink.hide();
                category_remove = "drink";
            } else if (this.value == 'drink') {
                category_food.hide();
                category_drink.show();
                category_remove = "food";
            }
        });
        /* Set select */
        $("#categoryFood").on("change", function () {
            $("#categoryDrink").val("");
        });
        $("#categoryDrink").on("change", function () {
            $("#categoryFood").val("");
        });
        /* Print image */
        let imagesPreview = function (input, placeToInsertImagePreview) {
            if (input.files) {
                let filesAmount = input.files.length;
                for (let i = 0; i < filesAmount; i++) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $($.parseHTML("<img>")).attr("src", event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        /* Click select images */
        $("#gallery-photo-add").on("change", function () {
            const files = $(this)[0].files;
            /* Remove all image */
            $("div.gallery-photo img").remove();
            /* Validete file */
            let validate = validateFileImage(files);
            if (validate === true) {
                /* Display images */
                imagesPreview(this, "div.gallery-photo");
            }
        });
        /* Submit Form */
        $("#suggestForm").submit(function () {
            let validate = validateForm(category_remove);
            if (validate != false) {
                jcAlert.content = validate;
                jcAlert.toggle();
                return false;
            }
            if (!confirm("{{__('custom.message_confirm')}}")) {
                return false;
            }
            /* Remove select */
            if (category_remove == 'food') {
                category_food.remove();
            } else if (category_remove == 'drink') {
                category_drink.remove();
            }
            /* Show loader */
            $("#loading").show();
        });
    });
    /* Validate File input */
    function validateFileImage(files) {
        const images = $("#gallery-photo-add");
        const validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
        let length = files.length;
        let fileSize = 0;
        /* Check empty */
        if (length == 0) {
            return false;
        }
        /* Check length files */
        if (length > 3) {
            jcAlert.content = "{{__('custom.message_file_length')}}";
            jcAlert.toggle();
            images.val("");
            return false;
        }
        for (let i = 0; i < length; i++) {
            let file = files[0];
            let fileType = file["type"];
            if (!validImageTypes.includes(fileType)) {
                jcAlert.content = "{{__('custom.message_file_image')}}";
                jcAlert.toggle();
                images.val("");
                return false;
            }
            fileSize = fileSize + files[i].size; // get file size
        }
        /* Check file size > 2MB */
        if (fileSize > 2097152) {
            jcAlert.content = "{{__('custom.message_file_size')}}";
            jcAlert.toggle();
            images.val("");
            return false;
        }
        return true;
    }
    /* Validate Form input */
    function validateForm(category_remove) {
        const category_food = $("#categoryFood").val();
        const category_drink = $("#categoryDrink").val();
        const name = $("#name").val();
        const price = $("#price").val();
        const amount_of = $("#amount_of").val();
        const images = $("#gallery-photo-add").val();

        if ((category_remove === "food" && category_drink === "") ||
            (category_remove === "drink" && category_food === ""))
        {
            return "{{ __('custom.message_category_empty') }}";
        }
        if (images === "") {
            return "{{ __('custom.message_suggest_validate_images') }}";
        }
        if (name === "" || price === "" || amount_of === "") {
            return "{{ __('custom.message_suggest_validate_form') }}";
        }
        return false;
    }
</script>
