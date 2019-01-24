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
  </head>

  <body bgcolor="white">
  <hr>
<?php

$brand = $_POST['brand'];
$item_name = $_POST['item_name'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$storename = $_POST['storename'];
$storeloc = $_POST['storeloc'];
$written = $_POST['written'];
$scale = $_POST['scale'];

#$name = mysqli_real_escape_string($conn, $name);
#form validation
$v_brand = 0;
if ($brand == NULL){
  print "ERROR: brand name not detected";
  print "<br>";
	$v_brand = 1;
}
$v_fname = 0;
if ($fname == NULL){
  print "ERROR: first name not detected";
  print "<br>";
	$v_fname = 1;
}
$v_lname = 0;
if ($lname == NULL){
  print "ERROR: last name not detected";
  print "<br>";
	$v_lname = 1;
}
$v_store = 0;
if ($storename == NULL){
  print "ERROR: store name not detected";
  print "<br>";
	$v_store = 1;
}
if ($age == NULL){
	$age = 1;
}

$not_int = 0;
if (is_numeric($age) == false){
  $not_int = 1;
  print "ERROR: age must be an integer";
  print "<br>";

}
// $v_written = 0;
// if ($written == 0 and $written == NULL){
//   print "ERROR written review not detected";
//   print "<br>";
// 	$v_written = 1;
// }

// print "first name = $fname";
// print "<br>";
// print "last name = $lname";
// print "<br>";
// print "age = $age\n";
// print "<br>";
// print "store name = $storename";
// print "<br>";
// print "store location = $storeloc";
// print "<br>";
// print "brand = $brand";
// print "<br>";
// print "item name = $item_name";
// print "<br>";
// print "written review = $written";
// print "<br>";
// print "scale = $scale";
// print "<br>";

$written = str_replace("'", '', $written);
$storename = str_replace("'", '', $storename);
$brand = str_replace("'", '', $brand);
$storeloc = str_replace("'", '', $storeloc);
$item_name = str_replace("'", '', $item_name);
$fname = str_replace("'", '', $fname);
$lname = str_replace("'", '', $lname);

if ($v_brand != 1 and $v_fname != 1 and $v_lname != 1 and $v_store != 1 and $v_written != 1 and $not_int != 1){
  //check if user exists
  $is_user = 0;
  $q_user = "SELECT * FROM 451final.Reviewer WHERE fname LIKE '%$fname%' AND lname LIKE '%$lname%';";
  $r_user = mysqli_query($conn, $q_user)
  or die(mysqli_error($conn));
  if (mysqli_num_rows($r_user) == 0){
    // print "no users found, INSERTING";
    // print "<br>";
    $insert_user = "INSERT INTO `451final`.`Reviewer` (`revID`, `fname`, `lname`, `age`) VALUES (NULL, '$fname', '$lname', '$age');";
    $r_insert_user = mysqli_query($conn, $insert_user)
    or die(mysqli_error($conn));
    $r_user2 = mysqli_query($conn, $q_user)
    or die(mysqli_error($conn));
    $found_user = mysqli_fetch_array($r_user2, MYSQLI_BOTH);
    // print "CREATED: ";
    // print "<br>";
    // print $found_user[fname];
    // print ", ID: ";
    // print $found_user[revID];
    // print "<br>";
    // print "<br>";
  } else {
    // print "found user: ";
    $is_user = 1;
    $found_user = mysqli_fetch_array($r_user, MYSQLI_BOTH);
    // print $found_user[fname];
    // print ", ID: ";
    // print $found_user[revID];
    // print "<br>";
  }

//---------------------------------------------------------------------------
  //check if store exists
  $is_store = 0;
  $q_store = "SELECT * FROM 451final.Store WHERE storename LIKE '%$storename%';";
  $r_store = mysqli_query($conn, $q_store)
  or die(mysqli_error($conn));
  if (mysqli_num_rows($r_store) == 0){
    // print "no stores found, INSERTING";
    // print "<br>";
    $insert_store = "INSERT INTO `451final`.`Store` (`storeID`, `storename`, `storeloc`) VALUES (NULL, '$storename', '$storeloc');";
    $r_insert_store = mysqli_query($conn, $insert_store)
    or die(mysqli_error($conn));
    $r_store2 = mysqli_query($conn, $q_store)
    or die(mysqli_error($conn));
    $found_store = mysqli_fetch_array($r_store2, MYSQLI_BOTH);
    // print "CREATED: ";
    // print "<br>";
    // print $found_store[storename];
    // print ", ID: ";
    // print $found_store[storeID];
    // print "<br>";
    // print "<br>";
  } else {
    // print "found store: ";
    $is_store = 1;
    $found_store = mysqli_fetch_array($r_store, MYSQLI_BOTH);
    // print $found_store[storename];
    // print ", ID: ";
    // print $found_store[storeID];
    // print "<br>";
  }

//---------------------------------------------------------------------------
  //check if item exists
  $is_item = 0;
  $q_item = "SELECT * FROM 451final.Item WHERE compname LIKE '%$brand%' AND itemname LIKE '%$item_name%';";
  $r_item = mysqli_query($conn, $q_item)
  or die(mysqli_error($conn));
  if (mysqli_num_rows($r_item) == 0){
    // print "no items found, INSERTING";
    // print "<br>";
    $insert_item = "INSERT INTO `451final`.`Item` (`itemID`, `compname`, `itemname`) VALUES (NULL, '$brand', '$item_name');";
    $r_insert_item = mysqli_query($conn, $insert_item)
    or die(mysqli_error($conn));
    $r_item2 = mysqli_query($conn, $q_item)
    or die(mysqli_error($conn));
    $found_item = mysqli_fetch_array($r_item2, MYSQLI_BOTH);
    // print "CREATED: ";
    // print "<br>";
    // print $found_item[compname];
    // print " ";
    // print $found_item[itemname];
    // print ", ID: ";
    // print $found_item[itemID];
    // print "<br>";
  } else {
    // print "found item: ";
    $is_item = 1;
    $found_item = mysqli_fetch_array($r_item, MYSQLI_BOTH);
    // print $found_item[compname];
    // print " ";
    // print $found_item[itemname];
    // print ", ID: ";
    // print $found_item[itemID];
    // print "<br>";
  }
  // print "NO ERRORS";
  // print "<br>";
  $good = 1;
} else {
  print "ERROR: incomplete form";
  print "<br>";
  print "Go back to start over.";
  $good = 0;
}

if ($good == 1){
  print "Review Submitted! Go back to create more reviews.";
  $insert_rating = "INSERT INTO `451final`.`Rating` (`ratingID`, `scale`, `written`, `fk_revID`, `fk_storeID`, `fk_itemID`)
  VALUES (NULL, '$scale', '$written', '$found_user[revID]', '$found_store[storeID]', '$found_item[itemID]');";
  $r_insert_rating = mysqli_query($conn, $insert_rating)
  or die(mysqli_error($conn));
}
//befree
mysqli_free_result($r_user);
mysqli_free_result($r_user2);
mysqli_free_result($r_insert_user);

mysqli_free_result($r_store);
mysqli_free_result($r_store2);
mysqli_free_result($r_insert_store);

mysqli_free_result($r_item);
mysqli_free_result($r_item2);
mysqli_free_result($r_insert_item);

mysqli_free_result($r_insert_rating);

mysqli_close($conn);
?>

</body>
</html>
