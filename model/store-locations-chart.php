<?php 
function selectStores() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select StoreID, Address, City, State, Latitude, Longitude from stores;");
        $stmt->execute();
        $result = $stmt->get_result();

        $stores = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();

        return $stores;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
