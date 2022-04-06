<?php

if ($_POST) {

    if ($_POST['Operation'] == "add") {
        $message = $_POST['number1'] + $_POST['number2'];
    } elseif ($_POST['Operation'] == "sub") {
        $message = $_POST['number1'] - $_POST['number2'];;
    } elseif ($_POST['Operation'] == "multi") {
        $message = $_POST['number1'] * $_POST['number2'];
    } elseif ($_POST['Operation'] == "div") {
        $message = $_POST['number1'] / $_POST['number2'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Calculator</title>
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
                <h3>Calculator </h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">

                        <input type="number" placeholder="Enter First Number" name="number1" class="form-control ">
                        <input type="number" placeholder="Enter Second Number" name="number2" class="form-control ">
                        <div class="m-2">
                            <button name="Operation" value="add" class="btn btn-dark"> + </button>
                            <button name="Operation" value="sub" class="btn btn-dark"> - </button>
                            <button name="Operation" value="multi" class="btn btn-dark"> * </button>
                            <button name="Operation" value="div" class="btn btn-dark"> / </button>

                        </div>

                        <div class="alert alert-info">
                            <?php

                            if (isset($message)) {
                                echo $message;
                            }

                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>