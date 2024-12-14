
<?php
require_once("util-db.php");
require_once("model/store-locations-chart.php");

$pageTitle = "Store Locations";
include "header.php";

$conn = get_db_connection();
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$stores = selectStores($conn);

include "view/store-locations-chart.php";
?>
