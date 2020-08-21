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
$adminsel = "Select member.username as name,caschoices.creativity as creativity, caschoices.activity as activity, caschoices.service as service, caschoices.studentjob as studentjob From caschoices join member where member.id=caschoices.userid Group by creativity,activity, service, studentjob, name HAVING Count(*)>1 and creativity<>'' and activity<>'' and service<>'' and studentjob<>''";
$stmt = $conn->prepare($adminsel);
$stmt->execute();
$result=$stmt->fetchAll();
if($_GET[user]){
header('location:adminpanel.php?id='.$_GET[user].'');
}
echo '<center>';
echo '<table style="position:relative; top:30px;">';
echo '<th style="background-color: #ea6153;"><b>CAS</b></th>
    <th style="padding: 6px; background-color: #ea6153;"><b>Students on the CAS</b></th>
    <b style="background-color: grey; color: white; font-size: 20px; padding: 5px;">CREATIVITY CASES</b>';
foreach($result as $x){
echo '
  <tr><td>'.$x["name"].'</td><td>'.$x["creativity"].'</td></tr>';
}
echo '</table>';

echo '</center>';
//Activity CAS
echo '<center>';
echo '<table style="position:relative; top:30px;">';
echo '<th style="background-color: #27ae60;"><b>CAS</b></th>
    <th style="padding: 6px; background-color: #27ae60;"><b>Students on the CAS</b></th>
    <div style="position: relative; margin-top: 70px;"><b style="color: white; font-size: 20px; padding: 5px; background-color: grey;">ACTIVITY CASES</b></div>';
foreach($result as $x){
echo '
  <tr><td>'.$x["name"].'</td><td>'.$x["activity"].'</td></tr>';
}


//end of Activity CAS
echo '</table>';

echo '</center>';
//Service CAS
echo '<center>';
echo '<table style="position:relative; top:30px;">';
echo '<th style="background-color: #2980b9;"><b>CAS</b></th>
    <th style="padding: 6px; background-color: #2980b9;"><b>Students on the CAS</b></th>
    <div style="position: relative; margin-top: 70px;"><b style="color: white; background-color:grey; font-size: 20px; padding: 5px;">SERVICE CASES</b></div>';
foreach($result as $x){
echo '
  <tr><td>'.$x["name"].'</td><td>'.$x["service"].'</td></tr>';
}


//end of Service CAS
echo '</table>';

echo '</center>';
//Student Job CAS
echo '<center>';
echo '<table style="position:relative; top:30px;">';
echo '<th style="background-color: #ea6153;"><b>CAS</b></th>
    <th style="padding: 6px; background-color: #ea6153;"><b>Students on the CAS</b></th>
    <div style="position: relative; margin-top: 70px;"><b style="color: white; background-color: grey; font-size: 20px; padding: 5px;">STUDENTJOB CASES</b></div>';
foreach($result as $x){
echo '
  <tr><td>'.$x["name"].'</td><td>'.$x["studentjob"].'</td></tr>';
}


//end of Student Job CAS
echo '</table>';

echo '</center>';
?>