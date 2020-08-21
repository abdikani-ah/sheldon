<?php 
session_start()
?>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <title>CAS WEBSITE &mdash; CAS Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
<style type="text/css">
  @import url(
  https://fonts.googleapis.com/css?family=Roboto:400,
  300,
  600,
  400italic
);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: grey;
}

.container {
  max-width: 900px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #f9f9f9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}


fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}



#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4caf50;
  color: #fff;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43a047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}


#contact input:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
.headers {width: 100%; height: 30px; background: rgb(10,154,145); color: white; font-size:18px; text-align: center; padding: 5px;
border-top-right-radius: 10px; border-top-left-radius: 10px;}
</style>
<div class="container">
  <form id="contact" action="caslist.php" method="POST">
    <center><h2 style="color:red;">CAS Selection Form</h2></center>
    <fieldset>
  <div>
    <h4 class="headers" value="creativity">SERVICE CAS</h4>
  </div>
</fieldset>
</fieldset>
<fieldset>
      <div class="dropdown show">                                     
<?php
$conn = new PDO('sqlite:db_member.sqlite3');
$select = "select DISTINCT service from caschoices where service IS NOT NULL";
$stmt = $conn->prepare($select);
$stmt->execute();
$result=$stmt->fetchAll();

echo '<select class="form-control" name="service" required>'; // Open your drop down box
// Loop through the query results, outputing the options one by one
echo '<option selected disabled></option>';
foreach($result as $y){
   echo '<option value="'.$y['service'].'">'.$y['service'].'</option>';
}

echo '</select>';// Close your drop down box?>
</div>
    </fieldset>
  <fieldset>
  <div>
    <h4 class="headers" value="creativity">Creativity CAS</h4>
  </div>
</fieldset>
<fieldset>
<div class="dropdown show">                                     
<?php
$select = "select DISTINCT creativity from caschoices where creativity IS NOT NULL";
$stmt = $conn->prepare($select);
$stmt->execute();
$result=$stmt->fetchAll();

echo '<select class="form-control" name="creativity" required>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
echo '<option selected disabled></option>';
foreach($result as $y){
   echo '<option value="'.$y['creativity'].'">'.$y['creativity'].'</option>';
}

echo '</select>';// Close your drop down box?>
</div>
</fieldset>
    <fieldset>
  <div>
    <h4 class="headers" value="creativity">ACTIVITY CAS</h4>
  </div>
</fieldset>
<fieldset>
<div class="dropdown show">                                     
<?php
$select = "select DISTINCT activity from caschoices where activity IS NOT NULL";
$stmt = $conn->prepare($select);
$stmt->execute();
$result=$stmt->fetchAll();

echo '<select class="form-control" name="activity" required>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
echo '<option selected disabled></option>';
foreach($result as $y){
   echo '<option value="'.$y['activity'].'">'.$y['activity'].'</option>';
}

echo '</select>';// Close your drop down box?>
</div>
</fieldset>
    <fieldset>
  <div>
    <h4 class="headers" value="creativity">STUDENT JOB CAS</h4>
  </div>
</fieldset>
<fieldset><div class="dropdown show">                                     
<?php
$select = "select DISTINCT studentjob from caschoices where studentjob IS NOT NULL";
$stmt = $conn->prepare($select);
$stmt->execute();
$result=$stmt->fetchAll();

echo '<select class="form-control" name="studentjob" required>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
echo '<option selected disabled></option>';
foreach($result as $y){
   echo '<option value="'.$y['studentjob'].'">'.$y['studentjob'].'</option>';
}

echo '</select>';// Close your drop down box?>
</div></fieldset>
    <fieldset>
      <button type="submit" name="casregister" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
<?php
          if($_SESSION['submitted']){
        ?>
        <center><div class="alert alert-success"><?php echo $_SESSION['submitted'];?></div></center>
        <?php
          $_SESSION['submitted']="";
          }
        ?>
  </form>
</div>