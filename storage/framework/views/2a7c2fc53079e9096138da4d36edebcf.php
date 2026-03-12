<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->

    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="<?php echo e($data['midtrans_secret']); ?>"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>

  <body>


    <form action="<?php echo e(route($data['fallback_url'],$data)); ?>" id="submit_form" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="json" id="json_callback">
    </form>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need

        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('<?php echo e($data['snap_token']); ?>', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })


      function send_response_to_form(result){
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }
    </script>
  </body>
</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/midtras/payment.blade.php ENDPATH**/ ?>