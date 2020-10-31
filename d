// id, name, price

$ta = $_REQUEST[카테고리]; // cpu

$result = $db->query("select * from $ta");
while ($result->fetch()) {
   echo $row[$pre[카테고리] . "id"];

}
