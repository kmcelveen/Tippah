<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Tippah</title>
  </head>
  <body>
    <div class="container form-area">
      <h1>Tippah</h1>
      <div class="row flexcontainer">
        <form method= "post" class="tip-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>
            <h4>Tab:</h4><input type="text" class="form-control" step="any" name="tabtotal" placeholder="Enter total bill amount.."></label><br>
            <label>
            <h4>Party Size:</h4> <input type="number" class="form-control" name="numberofpeople" placeholder="Number of guest.."></label><br>
            <h4>Tip:</h4>
            <input type="radio" name="tippercentage" value= .1> 10%
            <input type="radio" name="tippercentage" value= .15> 15%
            <input type="radio" name="tippercentage" value= .2> 20%
            <br>
            <input type="submit" class="btn btn-primary" id="bill-submit" name="submit" value ="Submit">

            <?php
              $bill = 0;
              $tippercentage = 0;
              $people = 0;

              if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $bill = $_POST["tabtotal"];
                $tippercentage = $_POST["tippercentage"];
                $people = $_POST["numberofpeople"];
              }
            ?>
          </form>
        </div>
        <h1 style="margin-top: 50px">Bill</h1>
        <div class="row flexcontainer">
          <?php
          if ($bill < 0){
            echo "<h4>Yo..either you are a freeloader or you did not enter a proper value</h4>";
          }
          else{
            if ($people < 0){
              echo "Bill is on the high roller..cannot split!";
            }
            else{
              $tip = $bill * $tippercentage;
              $totalwithtip = $bill + $tip;
              echo "Tip: $".round($tip, 2);
              if ($people > 1){
                echo "<br>";
                $totalsplit = $totalwithtip / $people;
                $splitted = $tip / $people;
                echo "Everyone Tips: $".round($splitted, 2);
                echo "<br>";
                echo "Split Amount: $".round($totalsplit, 2);
              }
              echo "<br>";
              echo "Total: $".round($totalwithtip, 2);
            }
          }
          ?>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
