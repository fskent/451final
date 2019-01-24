<?php

include('451finalCD.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>

<html>
<head>
  <title>CIS 451 Final Project</title>
  <link rel="stylesheet" type="text/css" href="451finalSTYLE.css">
</head>

  <body bgcolor="white">
  <hr>
<?php

$top_store = $_POST['top_store'];
$top_brands = $_POST['top_brands'];
$top_items = $_POST['top_items'];


if ($top_store != NULL){
  $q_store = "SELECT * FROM (SELECT storename, compname, itemname, ROUND(AVG(scale), 1) as average FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE storename LIKE '%$top_store%'  GROUP BY storename, compname, itemname) as t1 ORDER BY average DESC LIMIT 5;";
  $r_store = mysqli_query($conn, $q_store)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_store) == 0){
    print "NO STORES FOUND";

  } else {
    echo "<table class='tab'>
      <caption>Top Products by Store</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Average Rating</th>
    </tr>";
    while($row = mysqli_fetch_array($r_store, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[average] . "</td>";
       echo "</tr>";
       print "<br>";
     }

   }
   mysqli_free_result($r_store);
}


//
if ($top_brands != NULL){
  $q_brands = "SELECT * FROM (SELECT storename, compname, itemname, ROUND(AVG(scale), 1) as average FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE compname LIKE '%$top_brands%'  GROUP BY storename, compname, itemname) as t1 ORDER BY average DESC LIMIT 5;";
  $r_brands = mysqli_query($conn, $q_brands)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_brands) == 0){
    print "NO BRANDS FOUND";

  } else {
    echo "<table class='tab'>
    <caption>Top Products by Brand Name</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Average Rating</th>
    </tr>";
    while($row = mysqli_fetch_array($r_brands, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[average] . "</td>";
       echo "</tr>";
       print "<br>";
     }

   }
   mysqli_free_result($r_brands);
}


if ($top_items != NULL){
  $q_items = "SELECT * FROM (SELECT storename, compname, itemname, ROUND(AVG(scale), 1) as average FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE itemname LIKE '%$top_items%'  GROUP BY storename, compname, itemname) as t1 ORDER BY average DESC LIMIT 5;";
  $r_items = mysqli_query($conn, $q_items)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_items) == 0){
    print "NO ITEMS FOUND";

  } else {
    echo "<table class='tab'>
    <caption>Top Products by Item Name</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Average Rating</th>
    </tr>";
    while($row = mysqli_fetch_array($r_items, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[average] . "</td>";
       echo "</tr>";
       print "<br>";
     }

   }
   mysqli_free_result($r_items);
}

//top products overall
$q_ovr = "SELECT * FROM (SELECT storename, compname, itemname, ROUND(AVG(scale), 1) as average FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
JOIN Store ON Store.storeID = Rating.fk_storeID
GROUP BY storename, compname, itemname) as t1 ORDER BY average DESC LIMIT 20";
$r_ovr = mysqli_query($conn, $q_ovr)
or die(mysqli_error($conn));

if (mysqli_num_rows($r_ovr) == 0){
  print "NO ITEMS FOUND";

} else {
  echo "<table class='tab' >
  <caption>Top Products Overall</caption>
  <tr>
  <th>Store Name</th>
  <th>Brand Name</th>
  <th>Item Name</th>
  <th>Average Rating</th>
  </tr>";
  while($row = mysqli_fetch_array($r_ovr, MYSQLI_BOTH))
    {
     echo "<tr>";
     echo "<td>" . $row[storename] . "</td>";
     echo "<td>" . $row[compname] . "</td>";
     echo "<td>" . $row[itemname] . "</td>";
     echo "<td>" . $row[average] . "</td>";
     echo "</tr>";
     print "<br>";
   }

 }
 mysqli_free_result($r_ovr);
 mysqli_close($conn);
?>

</body>
</html>
