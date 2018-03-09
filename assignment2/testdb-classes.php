<?php
require_once('config.php');

$sql = "SELECT * FROM Countries";
$statement = DatabaseHelp::runQuery($connection, $sql, null); // retrieve before markup
?>

<html>
<body>
<h1>Countries (using DatabaseHelp)</h1>
<?php
// execute statement var within markup
while($row = $statement -> fetch()) {
    echo $row['ISO'] . ' ' . $row['CountryName'] . '<br>';
}
?>
</body>
</html>