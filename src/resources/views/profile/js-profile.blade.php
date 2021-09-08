<script>
  $(document).ready(function () {
      $("#formCancelOrder").submit(function () {
          /* Check form submit */
          if (!confirm("{{__('custom.message_confirm')}}")) {
              return false;
          }

          /* Show loader */
          $("#loading").show();
      });
  });
</script>
