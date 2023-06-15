
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction Failed </title>
    <link rel="canonical" href="">
    <?php $this->load->view('fronts/inc/layout'); ?>
</head>
<body>
    <div class="main-wrapper">
        <?php $this->load->view('fronts/inc/header_final'); ?>
        <div class="why-gamma-prep-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-danger">Your transaction was canceled!</h1>
                                <p id = "result"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
    </div>
    <?php $this->load->view('fronts/inc/footer_final'); ?>
    <?php $this->load->view('fronts/inc/js'); ?>
        
<script>
    redirect ();
      function redirect () {
         setTimeout(myURL, 5000);
         var result = document.getElementById("result");
         result.innerHTML = "<b> The page will redirect after delay of 5 seconds";
      }

      function myURL() {
         document.location.href = '<?= base_url('Products'); ?>';
      }
   </script>
</body>
</html>
