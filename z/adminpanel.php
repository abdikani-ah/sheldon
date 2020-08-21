<?php
session_start();echo '<center><div class="wrap"><a href="admin.php" class="go">Go Back Home</a></div></center>';?>
<style type="text/css">
body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: #2b2b2b;
  position: relative;

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
  margin: 0px 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
  border-collapse: collapse;;
  top:30px;

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
td {color: black;}
.row.header {
  font-weight: 900;
  color: white;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
th {
  background: #2980b9;
  color: white;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header {
    padding: 0;
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
    color: white;
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
.go {
	background:white; color:Black;
 padding:10px; 
 text-decoration:none; 
}
td {padding-left:50px; padding-right:50px; text-align: center;}
</style>
<?php
$conn = new PDO('sqlite:db_member.sqlite3');
$select = "select caschoices.id as notrem, * from caschoices where userid=:recid";
$stmt = $conn->prepare($select);
$stmt->bindParam(':recid', $_GET[id]);
$stmt->execute();
$result=$stmt->fetchAll();
if($_GET[del] and $_GET[id]){
$delete = "delete from orders where id=:getdel and userid=:seluser";
$ab = $conn->prepare($delete);
$ab->bindParam(':getdel', $_GET[del]);
$ab->bindParam(':seluser', $_GET[id]);
$ab->execute();
}
$userid = $_SESSION[id];
$id = $_GET[del];
echo '<center>';
echo '<table class="table row">';
echo '<th class="cell"><b>Action</b></th>
	<th class="cell"><b>Creativity</b></th>
	<th class="cell"><b>Activity</b></th>
	<th class="cell"><b>Service</b></th>
	<th class="cell"><b>Student Job</b></th>
	<th class="cell"><b>CAS Time</b></th>';
foreach($result as $x){
echo '
	<tr class="row"><td><a href=?del='.$x[notrem].' style="text-decoration: none;">Remove item</a></td><td>'.$x['creativity'].'</td><td>'.$x['activity'].'</td><td>'.$x['service'].'</td><td>'.$x['studentjob'].'</td><td>'.$x['tprice'].'</td></tr>';
}
echo '</table>';

echo '</center>';
?>