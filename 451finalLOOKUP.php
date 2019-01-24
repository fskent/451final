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


<?php

$store_search = $_POST['store_search'];
$brand_search = $_POST['brand_search'];
$item_search = $_POST['item_search'];
$fname_search = $_POST['fname_search'];
$lname_search = $_POST['lname_search'];
//store search
if ($store_search != NULL){
  $q_store = "SELECT * FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE storename LIKE '%$store_search%';";
  $r_store = mysqli_query($conn, $q_store)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_store) == 0){
    print "NO STORES FOUND";

  } else {
    echo "<table class='tab'>
    <caption>Store Results</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Scale</th>
    <th>Written</th>
    </tr>";
    while($row = mysqli_fetch_array($r_store, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[scale] . "</td>";
       echo "<td>" . $row[written] . "</td>";
       echo "</tr>";
       print "<br>";
     }

   }
   mysqli_free_result($r_store);
}


//brand search
if ($brand_search != NULL){

  $q_brand = "SELECT * FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE compname LIKE '%$brand_search%';";
  $r_brand = mysqli_query($conn, $q_brand)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_brand) == 0){
    print "NO BRAND NAMES FOUND";

  } else {
    echo "<table class='tab'>
    <caption>Brand Results</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Scale</th>
    <th>Written</th>
    </tr>";
    while($row = mysqli_fetch_array($r_brand, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[scale] . "</td>";
       echo "<td>" . $row[written] . "</td>";
       echo "</tr>";
       print "<br>";
    }

  }
  mysqli_free_result($r_brand);
}

//item search
if ($item_search != NULL){

  $q_item = "SELECT * FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE itemname LIKE '%$item_search%';";
  $r_item = mysqli_query($conn, $q_item)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_item) == 0){
    print "NO ITEM NAMES FOUND";

  } else {
    echo "<table class='tab'>
    <caption>Item Results</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Scale</th>
    <th>Written</th>
    <th>Reviewer First Name</th>
    <th>Reviewer Last Name</th>
    </tr>";
    while($row = mysqli_fetch_array($r_item, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[scale] . "</td>";
       echo "<td>" . $row[written] . "</td>";
       echo "<td>" . $row[fname] . "</td>";
       echo "<td>" . $row[lname] . "</td>";
       echo "</tr>";
       print "<br>";
    }

  }
  mysqli_free_result($r_item);
}

//fname search
if ($fname_search != NULL){

  $q_fname = "SELECT * FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE fname LIKE '%$fname_search%';";
  $r_fname = mysqli_query($conn, $q_fname)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_fname) == 0){
    print "NO FIRST NAMES FOUND";

  } else {
    echo "<table class='tab'>
    <caption>First Name Results</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Scale</th>
    <th>Written</th>
    <th>Reviewer First Name</th>
    <th>Reviewer Last Name</th>
    </tr>";
    while($row = mysqli_fetch_array($r_fname, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[scale] . "</td>";
       echo "<td>" . $row[written] . "</td>";
       echo "<td>" . $row[fname] . "</td>";
       echo "<td>" . $row[lname] . "</td>";
       echo "</tr>";
       print "<br>";
    }

  }
  mysqli_free_result($r_fname);
}

//lname search
if ($lname_search != NULL){

  $q_lname = "SELECT * FROM Rating JOIN Item ON Rating.fk_itemID = Item.itemID
  JOIN Reviewer ON Rating.fk_revID = Reviewer.revID
  JOIN Store ON Store.storeID = Rating.fk_storeID
  WHERE lname LIKE '%$lname_search%';";
  $r_lname = mysqli_query($conn, $q_lname)
  or die(mysqli_error($conn));

  if (mysqli_num_rows($r_lname) == 0){
    print "NO LAST NAMES FOUND";

  } else {
    echo "<table class='tab'>
    <caption>Last Name Results</caption>
    <tr>
    <th>Store Name</th>
    <th>Brand Name</th>
    <th>Item Name</th>
    <th>Scale</th>
    <th>Written</th>
    <th>Reviewer First Name</th>
    <th>Reviewer Last Name</th>
    </tr>";
    while($row = mysqli_fetch_array($r_lname, MYSQLI_BOTH))
      {
       echo "<tr>";
       echo "<td>" . $row[storename] . "</td>";
       echo "<td>" . $row[compname] . "</td>";
       echo "<td>" . $row[itemname] . "</td>";
       echo "<td>" . $row[scale] . "</td>";
       echo "<td>" . $row[written] . "</td>";
       echo "<td>" . $row[fname] . "</td>";
       echo "<td>" . $row[lname] . "</td>";
       echo "</tr>";
       print "<br>";
    }

  }
  mysqli_free_result($r_lname);
}
mysqli_close($conn);
?>

</body>
</html>
