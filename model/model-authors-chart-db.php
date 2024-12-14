<?php
function selectAuthors($conn) {
    try {
        $stmt = $conn->prepare("select CONCAT(AuthorFN, ' ', AuthorLN) as Author_Name, 
                                COUNT(BookID) as Num_Books 
                                from authors 
                                JOIN book_author ON AuthorID = BA_authorsID
                                JOIN books ON BA_booksID = BookID
                                group by AuthorFN, AuthorLN;");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
