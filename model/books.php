<?php
function selectBooks() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select BookID, BookTitle, B_GenreID from books;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertBooks($bTitle,$bGenreID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO books (`BookTitle`, `B_GenreID`) VALUES (?,?) ");
        $stmt->bind_param("ss", $bTitle, $bGenreID);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateBooks($bID, $bTitle, $bGenreID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `4013hw3db`.`books` SET `BookTitle` = ?, `B_GenreID` = ? WHERE (`BookID` = ?)");
        $stmt->bind_param("sii", $bTitle, $bGenreID, $bID);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}


function deleteBooks($bID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from books where BookID = ?");
        $stmt->bind_param("i", $bID);
        $success = $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
