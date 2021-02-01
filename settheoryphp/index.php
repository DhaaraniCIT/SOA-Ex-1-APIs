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
          <h1 class="text-center">Set Theory</h1>
            <div class="row mb-3">
              <div class="col">
                <label for="">Set 1</label>
                <input type="textarea" class="form-control" id="set1" required name="set1" value="<?php if(isset($set1)){echo set1;}?>">
              </div>
              <div class="col">
                <label for="">Set 2</label>
                <input type="textarea" class="form-control" id="set2" required name="set2" value="<?php if(isset($set2)){echo set2;}?>">
              </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block" name = "result">Set operations</button>
              </div>
            </div>
            <h1>Result</h1>
        </form>
        <?php
            function setTheory($set1,$set2){
                $i=0;$j=0;$count2=0;$count1=0;$total=0;
                $arr1 = array();
                $arr2 = array();
                $unionarr = '';
                $interarr = '';
                $minusB = '';
                $minusA = '';
                $count1 = strlen($set1);
                $count2 = strlen($set2);
                for($i=0;$set1{$i}!='';$i++){
                  if($set1{$i} != ","){
                    $arr1[$count1++]=$set1{$i};
                  }
                }

                for($i=0;$set2{$i}!='';$i++){
                  if($set2{$i} != ","){
                    $arr2[$count2++]=$set2{$i};
                  }
                }
                $unionarr = $set1 . "," . $set2;
                for($i=0;$i<$count1;$i++){
                  for($j=0;$j<$count2;$j++){
                      
                        if($arr1{$i} == $arr2{$j}){
                          if($interarr == ''){
                            $interarr = $arr1{$i};
                          }
                          elseif ($arr1{$i} == 0){
                            continue;
                          }
                          else{
                            $interarr = $interarr . "," . $arr1{$i};
                          }
                          $arr1[$i] = 0;
                          $arr2[$j] = 0;
                      }
                  }
              }
              for($i=0;$i<$count1;$i++){
                  if($arr1[$i]!=0){
                      if($minusA == ''){
                        $minusA = $arr1[$i];
                      }
                      else{
                        $minusA = $minusA . "," .$arr1[$i];
                      }
                  }
              }
              
              for($i=0;$i<$count2;$i++){
                if($arr2[$i]!=0){
                    if($minusB == ''){
                      $minusB = $arr2[$i];
                    }
                    else{
                      $minusB = $minusB . "," .$arr2[$i];
                    }
                }
            }
                echo "Union: " . $unionarr . "<br>Inter: " . $interarr . "<br>A-B: " . $minusA . "<br>B-A: " . $minusB ;
                //<p>No. of Months: " . $months . "</p><p>No. of Days: " . $days . "</p><p>No. of Hours: " . $hours . "</p><p>No. of Minutes: " . $minutes . "</p><p>No. of Seconds: " . $seconds . "</p>";
            }
            extract($_POST);
            if(isset($result))
            {
                setTheory("$set1","$set2");
            }
        ?>
    </div> 
</body>
</html>