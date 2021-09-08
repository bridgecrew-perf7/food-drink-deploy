<script>
    $(document).ready(function () {
      // Submit Order
      $(this).on("click", "#cart_btn-order", function (event) {
          if (confirm("{{__('custom.message_confirm')}}")) {
              window.location.href = "{{ route('order-products') }}";
              /* Show loader */
              $("#loading").show();
          }
      });
    });
</script>
