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
          <h1 class="text-center">Matrix</h1>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Matrix</label>
                    <pre>
                        1   2   3
                        4   5   6
                        7   8   9
                    </pre>
                </div>
                <div class="col mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block" name="result">Matrix functions</button>
                </div>
            </div>
        </form>
        <?php
            function transmatrix(){
                $matrix = array (
                    array(1,2,3),
                    array(4,5,6),
                    array(7,8,9),
                );
                $transposemat;
                for ($i = 0; $i < 3; $i++){ 
                    for ($j = 0; $j < 3; $j++) 
                        $transposemat[$i][$j] = $matrix[$j][$i]; 
                }
                echo "Transpose Matrix <br>";
                for ($i = 0; $i < 3; $i++) 
                { 
                    for ($j = 0; $j < 3; $j++) 
                    { 
                        echo $transposemat[$i][$j]; 
                        echo " "; 
                    } 
                    echo "<br>"; 
                } 
            }
            
            function diagonmatrix(){
                $matrix = array (
                    array(1,2,3),
                    array(4,5,6),
                    array(7,8,9),
                );
                echo "Lower Triangle Matrix<br>";
                for($i=0;$i<3;$i++)
                {
                    for($j=0;$j<3;$j++)
                    {
                        if ($i < $j) 
                        { 
                            echo "0" , " "; 
                        } 
                        else
                        echo $matrix[$i][$j] , " "; 
                    } 
                    echo "<br>";
                }
                echo "Upper Triangle Matrix<br>";
                for($i=0;$i<3;$i++)
                {
                    for($j=0;$j<3;$j++)
                    {
                        if ($i > $j) 
                        { 
                            echo "0" , " "; 
                        } 
                        else
                        echo $matrix[$i][$j] , " "; 
                    } 
                    echo "<br>";
                }
            }
            function rotation(){
                $matrix = array (
                    array(1,2,3),
                    array(4,5,6),
                    array(7,8,9),
                );
                for ($j = 0,$k=0; $j < 3,$k<3; $j++,$k++) 
                {
                    for ($i = 3 - 1,$l=0; $i >= 0,$l<3; $i--,$l++)
                    $clockrotate[$k][$l] = $matrix[$i][$j];
                }
                echo "Clockwise Rotation Matrix <br>";
                for ($i = 0; $i < 3; $i++) 
                { 
                    for ($j = 0; $j < 3; $j++) 
                    { 
                        echo $clockrotate[$i][$j]; 
                        echo " "; 
                    } 
                    echo "<br>"; 
                } 
            }
            extract($_POST);
            if(isset($result))
            {
                transmatrix();
                diagonmatrix();
                rotation();
            }
        ?>
    </div> 
</body>
</html>