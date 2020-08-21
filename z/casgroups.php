<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 12%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
</head>
<body>
<div class="wrap">
  <div class="search">
    <input type="text" class="searchTerm" placeholder="What are you looking for?">
    <button type="submit" class="searchButton">
      <i class="fa fa-search"></i>
    </button>
  </div>
</div>
</body>
</html>

<?php
session_start();
echo '<style>';
echo 'body {background-color: #2b2b2b; color: #3b3b3b; "Helvetica Neue", Helvetica, Arial; padding: 6px 12px;}';
echo 'table, th, td {text-align: center; width:70%; font-family:"Helvetica Neue", Helvetica, Arial; font-size: 14px; border-collapse: collapse; border-spacing: 0; line-height: 20px; font-weight: 550;}';
echo 'th {color: white;}';
echo 'td {padding-top:6px; padding-bottom:6px;}';
echo 'tr:nth-child(even) {background-color: #f6f6f6;}';
echo 'tr:nth-child(odd) {background-color: #e9e9e9;}';

echo '</style>';

$conn = new PDO('sqlite:db_member.sqlite3');
$adminsel = "select member.username as users, caschoices.creativity as creativity, caschoices.activity as activity, caschoices.service as service, caschoices.studentjob as studentjob from caschoices join member where member.id=caschoices.userid order by creativity, activity, service, studentjob DESC";
$stmt = $conn->prepare($adminsel);
$stmt->execute();
$result=$stmt->fetchAll();
if($_GET[user]){
header('location:adminpanel.php?id='.$_GET[user].'');
}
echo '<center>';
echo '<table style="position:relative; top:70px;">';
echo '<th style="background-color: #ea6153;"><b>CAS</b></th>
		<th style="padding: 6px; background-color: #ea6153;"><b>Students on the CAS</b></th>
		<b style="background-color: grey; color: white; font-size: 20px; padding: 5px;">CREATIVITY CASES</b>';
foreach($result as $x){
echo '
	<tr><td>'.$x["creativity"].'</td><td>'.$x["users"].'</td></tr>';
}
echo '</table>';

echo '</center>';
//Activity CAS
echo '<center>';
echo '<table style="position:relative; top:70px;">';
echo '<th style="background-color: #27ae60;"><b>CAS</b></th>
		<th style="padding: 6px; background-color: #27ae60;"><b>Students on the CAS</b></th>
		<div style="position: relative; margin-top: 50px;"><b style="color: white; font-size: 20px; padding: 5px; background-color: grey; position:relative; top: 40px; ">ACTIVITY CASES</b></div>';
foreach($result as $x){
echo '
	<tr><td>'.$x["activity"].'</td><td>'.$x["users"].'</td></tr>';
}


//end of Activity CAS
echo '</table>';

echo '</center>';
//Service CAS
echo '<center>';
echo '<table style="position:relative; top:70px;">';
echo '<th style="background-color: #2980b9;"><b>CAS</b></th>
		<th style="padding: 6px; background-color: #2980b9;"><b>Students on the CAS</b></th>
		<div style="position: relative; margin-top: 50px;"><b style="color: white; background-color:grey; font-size: 20px; padding: 5px; position:relative; top: 40px;">SERVICE CASES</b></div>';
foreach($result as $x){
echo '
	<tr><td>'.$x["service"].'</td><td>'.$x["users"].'</td></tr>';
}


//end of Service CAS
echo '</table>';

echo '</center>';
//Student Job CAS
echo '<center>';
echo '<table style="position:relative; top:70px;">';
echo '<th style="background-color: #ea6153;"><b>CAS</b></th>
		<th style="padding: 6px; background-color: #ea6153;"><b>Students on the CAS</b></th>
		<div style="position: relative; margin-top: 50px;"><b style="color: white; background-color: grey; font-size: 20px; padding: 5px; position:relative; top: 40px;">STUDENTJOB CASES</b></div>';
foreach($result as $x){
echo '
	<tr><td>'.$x["studentjob"].'</td><td>'.$x["users"].'</td></tr>';
}


//end of Student Job CAS
echo '</table>';

echo '</center>';
?>