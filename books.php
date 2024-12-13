<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-books.php");

$pageTitle = "Books";
include "header.php";

if (isset($_POST['actionType'])) {
    
    switch ($_POST['actionType']) {
    case "Add": 
        if( insertBooks($_POST['publishDate'], $_POST['isbn'], $_POST['bookID'], $_POST['authID'])) {
            echo '<div class="alert alert-success" role="alert">
            Record successfully added to the database!
        </div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">
            Record could not be added to the database. 
            </div>';
        }
    break;

    case "Edit": 
        if( updateBooks($_POST['baID'], $_POST['publishDate'], $_POST['isbn'], $_POST['bookID'], $_POST['authID'])) {
            echo '<div class="alert alert-success" role="alert">
            Record successfully edited within the database! Refresh the page.
        </div>';
            header("Location: " . $_SERVER['PHP_SELF']);
            exit(); 
        } else {
            echo '<div class="alert alert-warning" role="alert">
            Record could not be edited within the database.
        </div>';
        }
    break;
        
    case "Delete": 
        if(deleteBooks($_POST['baID'])) {
            echo '<div class="alert alert-success" role="alert">
            Record successfully deleted from the database!
        </div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">
            Record could not be deleted from the database. 
            </div>';
        }
    break;
    }
}

$conn = get_db_connection();
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$books = selectBooks($conn);

include "view-books.php";
?>
