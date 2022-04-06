<?php

if ($_POST) {
    if ($_POST['number1'] > $_POST['number2'] && $_POST['number1'] > $_POST['number3']) {
        $message =
            '
        the max number is ' . $_POST['number1'] . '
        
        ';
    } elseif ($_POST['number2'] > $_POST['number1'] && $_POST['number2'] > $_POST['number3']) {
        $message =
            '
    the max number is ' . $_POST['number2'] . '
   
    ';
    } elseif ($_POST['number3'] > $_POST['number1'] && $_POST['number3'] > $_POST['number2']) {
        $message =
            '
    the max number is ' . $_POST['number3'] . '
    
    ';
    }
}

if ($_POST) {
    if ($_POST['number1'] < $_POST['number2'] && $_POST['number1'] < $_POST['number3']) {
        $message1 =
            '
        the min number is ' . $_POST['number1'] . '
        
        ';
    } elseif ($_POST['number2'] < $_POST['number1'] && $_POST['number2'] < $_POST['number3']) {
        $message1 =
            '
    the min number is ' . $_POST['number2'] . '
  
    ';
    } elseif ($_POST['number3'] < $_POST['number1'] && $_POST['number3'] < $_POST['number2']) {
        $message1 =
            '
    the min number is ' . $_POST['number3'] . '
    
    ';
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <title>Max&Min</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center text-secondary mb-5">
                <h3>Max & Min Numbers </h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">

                        <input type="number" placeholder="Enter First Number" name="number1" class="form-control ">
                        <input type="number" placeholder="Enter Second Number" name="number2" class="form-control ">
                        <input type="number" placeholder="Enter Third Number" name="number3" class="form-control ">
                        <div class="alert alert-info">
                            <?php if (isset($message, $message1)) {
                                echo $message . "<br>" . $message1;
                            } ?>
                        </div>
                    </div>
                    <button class=" btn btn-outline-info rounded offset-5 mt-1">Calc</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>