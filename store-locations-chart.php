
<?php
require_once("util-db.php");

$pageTitle = "Store Locations";
include "header.php";

$conn = get_db_connection();
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$authors = selectStores($conn);

include "view/store-locations-chart.php";
?>
