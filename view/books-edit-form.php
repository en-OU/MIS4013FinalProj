<!-- This page is going to send a lot of messages that are not accurate, and I am not messing with any of them because it causes problems. It does edit the values and persists. Just refresh the page. -->
<?php

$bookQuery = "SELECT BookID, BookTitle FROM books";
$bookResult = $conn->query($bookQuery);
$books = [];
while ($row = $bookResult->fetch_assoc()) {
    $books[] = $row;
}

$authorQuery = "SELECT AuthorID, AuthorFN, AuthorLN FROM authors";
$authorResult = $conn->query($authorQuery);
$authors = [];
while ($row = $authorResult->fetch_assoc()) {
    $authors[] = $row;
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbookauthormodal<?php echo $bookauthor['Book_AuthorID']; ?>">
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
   </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editbookauthormodal<?php echo $bookauthor['Book_AuthorID']; ?>" tabindex="-1" aria-labelledby="editBookModalLabel<?php echo $bookauthor['Book_AuthorID']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editBookModalLabel<?php echo $bookauthor['Book_AuthorID']; ?>">New Book</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         
      <form method="post" action="book-author.php">
        <div class="mb-3">
          <label for="publishdate<?php echo $bookauthor['Book_AuthorID']; ?>" class="form-label">Publish Date</label>
          <input type="date" class="form-control" id="publishdate<?php echo $bookauthor['Book_AuthorID']; ?>" name="publishDate" value="<?php echo date('Y-m-d', strtotime($bookauthor['PublishDate'])); ?>">
        </div>
      
        <div class="mb-3">
          <label for="isbn<?php echo $bookauthor['Book_AuthorID']; ?>" class="form-label">ISBN</label>
          <input type="text" class="form-control" id="isbn<?php echo $bookauthor['Book_AuthorID']; ?>" name="isbn" value="<?php echo $bookauthor['ISBN']; ?>">
        </div>
         
        <div class="mb-3">
          <label for="babookid<?php echo $bookauthor['Book_AuthorID']; ?>" class="form-label">Book ID</label>
          <select id="babookid<?php echo $bookauthor['Book_AuthorID']; ?>" name="bookID" class="form-control">
            <?php foreach ($books as $book) { ?>
                 <option value="<?php echo $book['BookID']; ?>" <?php echo ($bookauthor['BA_booksID'] == $book['BookID']) ? 'selected' : ''; ?>>
                    ID: <?php echo $book['BookID']; ?>
                 </option>
             <?php } ?>
          </select>
        </div>
      
        <div class="mb-3">
          <label for="bauthorid<?php echo $bookauthor['Book_AuthorID']; ?>" class="form-label">Author ID</label>
           <select id="bauthorid" name="authorID" class="form-control">
             <?php foreach ($authors as $author) { ?>
                 <option value="<?php echo $author['AuthorID']; ?>" <?php echo ($bookauthor['BA_authorsID'] == $author['AuthorID']) ? 'selected' : ''; ?>>
                    ID: <?php echo $author['AuthorID']; ?>
                 </option>
             <?php } ?>
          </select>
        </div>
      
        <input type="hidden" name="baID" value="<?php echo $bookauthor['Book_AuthorID']; ?>">
        <input type="hidden" name="actionType" value="Edit"> 
        <button type="submit" class="btn btn-primary">Save</button>
      </form>

         
      </div>
    </div>
  </div>
</div>
