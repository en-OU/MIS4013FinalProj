<?php
// error reporting (from php manual) (I was tired of log stream)
// https://www.php.net/manual/en/function.error-reporting.php
// https://www.php.net/manual/en/function.ini-set.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model/books-with-genre.php");
require_once("model/books.php");


$pageTitle = "Books with Genres";
include "header.php";

$conn = get_db_connection();
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

try {
    $genres = selectGenres($conn); 
    } catch (Exception $e) {
    echo "Error fetching genres: " . $e->getMessage();
    exit;
}

include "view/books-with-genres.php";
?>
