function selectStore() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Select StoreID, Address, City, State, Latitude, Longitude from stores;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
