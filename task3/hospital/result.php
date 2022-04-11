<?php

$result = 0;
foreach ($_POST as $key => $review) {
    if ($review == 'Bad') {
        $result += 0;
    } elseif ($review == 'Good') {
        $result += 3;
    } elseif ($review == 'VeryGood') {
        $result += 5;
    } elseif ($review == 'Excellent') {
        $result += 10;
    }
}
if ($result >= 25) {
    $answer = "
    <div class='alert alert-success text-center font-weight-bold'>
    Thank You
    </div>";
} else {
    $answer = "<div class='alert alert-danger text-center font-weight-bold'>
    We will call you later on this phone : 01000222344
    </div>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form method="post">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Questions</th>
                    <th>Reviews</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Are you satisfied with the level of cleanliness ?</th>
                    <td><?= $_POST['clean'] ?? "" ?></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the service price ?</th>
                    <td><?= $_POST['price'] ?? "" ?></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the nursing service ?</th>
                    <td><?= $_POST['nursing'] ?? "" ?></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the level of the doctor ?</th>
                    <td><?= $_POST['doctor'] ?? "" ?></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the calmness in the hospital ?</th>
                    <td><?= $_POST['calmness'] ?? "" ?></td>
                </tr>

            </tbody>
        </table>
        <?=
        $answer;
        ?>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>