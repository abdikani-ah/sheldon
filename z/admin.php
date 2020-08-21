<?php
session_start();echo '<center><div class="wrap"><a href="home.php" class="go">Go Back Home</a></div></center>';?>
<style type="text/css">
body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: #2b2b2b;
  position: relative;
  top:20px;
}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}
.wrap{margin: 20px;}
.table {
  margin: 0 0 40px 0;
  width: 70%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
  border-collapse: collapse;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
th {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}

@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  th {
    height: 6px;
  }
  .row.header .cell {
    display: none;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}
td {padding-left:50px; padding-right:50px; text-align: center; padding-top: 6px; padding-bottom: 6px;}
.go{background:white; color:Black;
 padding:10px; 
 text-decoration:none; }
</style>
<?php
$conn = new PDO('sqlite:db_member.sqlite3');
$adminsel = "select member.id as byuser, member.username as user, member.email as email, member.phone as phone, COUNT(*) as counter from caschoices join member where member.id=caschoices.userid group by userid";
$stmt = $conn->prepare($adminsel);
$stmt->execute();
$result=$stmt->fetchAll();
if($_GET[user]){
header('location:adminpanel.php?id='.$_GET[user].'');
}
echo '<center>';

echo '<table class="wrapper table row">';
echo '
<th class="cell"><b>User</b></th>
		<th class="cell"><b>Email address</b></th>
		<th class="cell"><b>Phone number</b></th>
	<th class="cell"><b>Number of CASES selected</b></th>
	<th class="cell"><b>Action</b></th>';
foreach($result as $x){
echo '
	<tr class="row"><td>'.$x["user"].'</td><td>'.$x["email"].'</td><td>'.$x["phone"].'</td><td>'.$x["counter"].'</td><td><a href=?user='.$x[byuser].' style="text-decoration: none;">View CASES</a></td></tr>';
}
echo '</table>';

echo '</center>';
?>