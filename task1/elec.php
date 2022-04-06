<?php
if ($_POST) {
    define('surcharge', 0.20);
    if ($_POST['units'] <= 50) {
        $unit = 0.50;
    } elseif ($_POST['units'] > 50 && $_POST['units'] <= 100) {
        $unit = 0.75;
    } elseif ($_POST['units'] > 100 && $_POST['units'] <= 150) {
        $unit = 1.20;
    } else {
        $unit = 1.50;
    }
    $vatPrice = surcharge * 100;
    $totalUnitPrice = $_POST['units'] * $unit;
    $pricevat = $totalUnitPrice * surcharge;
    $totalPriceAfterVat = $totalUnitPrice + $pricevat;
    $message = "Unit Price: " . $unit . "<br>" . "Total Price: " . $totalUnitPrice . "<br>"
        . "Vat: " . $vatPrice . "%" . "<br>" . "Total Price: " . $totalPriceAfterVat . "EPG" . "<br>";
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
                <h3>elec Invoice </h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                        <input type="number" placeholder="Enter Unit Charges" name="units" class="form-control ">
                    </div>
                    <button class="btn btn-outline-info rounded offset-5 ">Invoice</button>
                    <div class="alert alert-info">
                        <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
                    </div>
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