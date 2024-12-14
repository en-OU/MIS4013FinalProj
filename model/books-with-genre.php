<?php
function selectGenres() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select GenreID, GenreName from genres;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectBooksByGenre($gid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select g.GenreID, g.GenreName, b.BookTitle, a.AuthorID, a.AuthorFN, a.AuthorLN, ba.PublishDate, ba.ISBN from books b JOIN book_author ba
    ON b.BookID = ba.BA_booksID
    JOIN authors a
    ON ba.BA_authorsID = a.AuthorID
    JOIN genres g
    ON b.B_GenreID = g.GenreID
    Where g.GenreID = ?;");

        $stmt->bind_param("i", $gid);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>

