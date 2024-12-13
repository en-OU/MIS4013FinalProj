
<?php
function selectBooks() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("select BookTitle, CONCAT(AuthorFN, ' ', AuthorLN) as Author_Name, Book_AuthorID, PublishDate, ISBN, BA_booksID as BookID, BA_authorsID as AuthorID, Rating, Price
                                from book_author JOIN books
                                ON BA_booksID = BookID
                                JOIN authors 
                                ON BA_authorsID = AuthorID");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertBooks($publishDate, $isbn, $bookID, $authID, $rating, $price) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare(
            "INSERT INTO book_author (PublishDate, ISBN, BA_booksID, BA_authorsID, Rating, Price) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("ssiiii", $publishDate, $isbn, $bookID, $authID, $rating $price);
        $stmt->execute();
        $conn->close();
        return true;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}


function updateBooks($baID, $publishDate, $isbn, $bookID, $authID, $rating, $price) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `4013hw3db`.`book_author` SET `PublishDate` = ?, `ISBN` = ?, `BA_booksID` = ?, `BA_authorsID` = ? WHERE (`Book_AuthorID` = ?);
");
        $stmt->bind_param("ssiiiii", $publishDate, $isbn, $bookID, $authID, $baID, $rating, $price);
        $success = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}


function deleteBooks($baID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from book_author where Book_AuthorID = ?");
        $stmt->bind_param("i", $baID);
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
