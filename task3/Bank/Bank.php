<?php

function CalcLoan(&$name, &$loanAmount, &$LoanYears)
{
    if ($_POST) {
        $name = $_POST['Username'];
        $loanAmount = $_POST['loan-amount'];
        $LoanYears = $_POST['loanPerYear'];
        if ($LoanYears < 3) {
            $interesrPeryear = 0.10;
        } else {
            $interesrPeryear = 0.15;
        }
        $loanmonthly = $LoanYears * 12;
        $interestAmount = $loanAmount * $interesrPeryear * $LoanYears;
        $Loanafterinterest = $loanAmount + $interestAmount;
        $Monthlyamount = round($Loanafterinterest / $loanmonthly);

        $table = "<table class='table table-striped  '> 
        <thead class='text-primary'> 
        <tr> 
        <th> User name</th> 
        <th> Interest Amount</th> 
        <th> Loan after Interest</th> 
        <th> Monthly</th> 
        </tr>
        </thead>
        <tbody> 
        <tr>
        <td>" . $name;
        $table .= "</td>
        <td>"  . $interestAmount;
        $table .= "</td>
        <td>" . $Loanafterinterest;
        $table .= "</td>
        <td>" . $Monthlyamount;
        $table .= "</td>
        </tr>
        </tbody>
        </table>";
        return $table;
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <title>Loan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 text-center text-primary ">
                <h1>Bank</h1>
            </div>
            <div class="col-6 offset-3 text-info ">
                <form method="post">
                    <div class="form-group">
                        <label for="username">
                            <h5>Username</h5>
                        </label>
                        <input type="text" name="Username" class="form-control"
                            value="<?= $_POST['Username'] ?? " " ?>">
                        <label for="loanAmount">
                            <h5>Loan Amount</h5>
                        </label>
                        <input type="number" name="loan-amount" class="form-control"
                            value="<?= $_POST['loan-amount'] ?? " " ?>">
                        <label for=" loanYears">
                            <h5>Loan Years</h5>
                        </label>
                        <input type="number" name="loanPerYear" class="form-control"
                            value="<?= $_POST['loanPerYear'] ?? " " ?>">
                    </div>
                    <button class=" btn btn-outline-info">Calculate</button>
                    <?=
                    CalcLoan($name, $loanAmount, $LoanYears);
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"
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