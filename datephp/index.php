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
          <h1 class="text-center">Date</h1>
            <div class="row mb-3">
              <div class="col">
                <label for="">From</label>
                <input type="datetime-local" class="form-control" id="dateF" required name="date1" value="<?php if(isset($date1)){echo date1;}?>">
              </div>
              <div class="col">
                <label for="">To</label>
                <input type="datetime-local" class="form-control" id="dateT" required name="date2" value="<?php if(isset($date2)){echo date2;}?>">
              </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block" name="result">Calculate Difference</button>
              </div>
            </div>
            <h1>Result</h1>
        </form>
        <?php
            function datediff($date1,$date2){
                $diff = abs(strtotime($date2) - strtotime($date1));
                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                $hours = floor(($diff - $years * 365*60*60*24- $months*30*60*60*24 - $days*60*60*24)/ (60*60));
                $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
                $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                echo "<p>No. of Years: " . $years . "</p><p>No. of Months: " . $months . "</p><p>No. of Days: " . $days . "</p><p>No. of Hours: " . $hours . "</p><p>No. of Minutes: " . $minutes . "</p><p>No. of Seconds: " . $seconds . "</p>";
            }
            extract($_POST);
            if(isset($result))
            {
                datediff("$date1","$date2");
            }
        ?>
    </div> 
</body>
</html>