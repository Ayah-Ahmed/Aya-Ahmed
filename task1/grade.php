<?php
if ($_POST) {
    define('max_grade', 250);
    $total = $_POST['grade1'] + $_POST['grade2'] + $_POST['grade3'] + $_POST['grade4'] + $_POST['grade5'];
    $percentage_grade = (($total / max_grade) * 100);
    if ($percentage_grade >= 90) {
        $message = 'Grade A';
    } else if ($percentage_grade >= 80) {
        $message = 'Grade B';
    } else if ($percentage_grade >= 70) {
        $message = 'Grade C';
    } else if ($percentage_grade >= 60) {
        $message = 'Grade D';
    } else if ($percentage_grade >= 40) {
        $message = 'Grade E';
    } else if ($percentage_grade < 40) {
        $message = 'Grade f';
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Grades</title>
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
                <h3>Grades</h3>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                        <label for="grades">Enter Physics Grades </label>
                        <input type="number" name="grade1" value="Physics" class="form-control ">
                        <label for="grades">Enter Chemistry Grades </label>
                        <input type="number" name="grade2" value="Chemistry" class="form-control ">
                        <label for="grades">Enter Biology Grades </label>
                        <input type="number" name="grade3" value="Biology" class="form-control ">
                        <label for="grades">Enter Mathematics Grades </label>
                        <input type="number" name="grade4" value="Mathematics " class="form-control ">
                        <label for="grades">Enter Computer Grades </label>
                        <input type="number" name="grade5" value="Computer " class="form-control ">
                    </div>
                    <div class="alert alert-success ">
                        <?php if (isset($message,)) {
                            echo "Your grade: " . $message . "<br>" . "Percentage: " . $total . "%";
                        } ?>
                    </div>
                    <button class=" btn btn-outline-info rounded offset-5 mt-1">Result</button>
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