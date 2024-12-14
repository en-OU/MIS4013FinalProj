<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model/books.php");
require_once("model/books-with-genre.php");

$pageTitle = "Genres";
include "header.php";


$conn = get_db_connection();
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$books = selectBooks($conn);

?>
