<!doctype html>
<html lang="en">

<head>
    <title>Review</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="result.php">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Questions</th>
                    <th>Bad</th>
                    <th>Good</th>
                    <th>Very Good</th>
                    <th>Excellent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Are you satisfied with the level of cleanliness ?</th>
                    <td><input type="radio" name="clean" id="clean" value="Bad"></td>
                    <td><input type="radio" name="clean" id="clean" value="Good"></td>
                    <td><input type="radio" name="clean" id="clean" value="VeryGood"></td>
                    <td><input type="radio" name="clean" id="clean" value="Excellent"></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the service price ?</th>
                    <td><input type="radio" name="price" id="price" value="Bad"></td>
                    <td><input type="radio" name="price" id="price" value="Good"></td>
                    <td><input type="radio" name="price" id="price" value="VeryGood"></td>
                    <td><input type="radio" name="price" id="price" value="Excellent"></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the nursing service ?</th>
                    <td><input type="radio" name="nursing" id="nursing" value="Bad"></td>
                    <td><input type="radio" name="nursing" id="nursing" value="Good"></td>
                    <td><input type="radio" name="nursing" id="nursing" value="VeryGood"></td>
                    <td><input type="radio" name="nursing" id="nursing" value="Excellent"></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the level of the doctor ?</th>
                    <td><input type="radio" name="doctor" id="doctor" value="Bad"></td>
                    <td><input type="radio" name="doctor" id="doctor" value="Good"></td>
                    <td><input type="radio" name="doctor" id="doctor" value="VeryGood"></td>
                    <td><input type="radio" name="doctor" id="doctor" value="Excellent"></td>
                </tr>
                <tr>
                    <th>Are you satisfied with the calmness in the hospital ?</th>
                    <td><input type="radio" name="calmness" id="calmness" value="Bad"></td>
                    <td><input type="radio" name="calmness" id="calmness" value="Good"></td>
                    <td><input type="radio" name="calmness" id="calmness" value="VeryGood"></td>
                    <td><input type="radio" name="calmness" id="calmness" value="Excellent"></td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-outline-dark offset-6">Submit</button>
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