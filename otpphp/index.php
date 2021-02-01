<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form method="post">
          <h1 class="text-center">OTP</h1>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Length of otp</label>
                    <input type="text" class="form-control" id="len" required name="digit">
                  </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block" name="result">Generate OTP</button>
              </div>
            </div>
        </form>
        <?php
            function otp($len)
            {
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  
                $size = strlen( $chars );  
                echo "OTP: ";  
                for( $i = 0; $i < $len; $i++ ) {  
                $str= $chars[ rand( 0, $size - 1 ) ];  
                echo $str; 
                }
            }
            extract($_POST);
            if(isset($result))
            {
                otp("$digit");
            }
        ?>
    </div> 
</body>
</html>