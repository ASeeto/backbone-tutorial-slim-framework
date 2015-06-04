<?php

class Item{
    /**
    * Returns all items
    */
    public function getItems() {
 
        /** Connect to Database */
        require_once 'dbconfig.php';
        $db = connect_db();

        /** Execute SQL and return result */
        $sql = "SELECT * FROM items";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $results[] = array(
                'id'    => $row['id'],
                'name'  => $row['name'],
                'price' => $row['price']
            );
        }
        return $results;
    }
    /**
    * Returns item with given ID
    */
    public function getItem($id) {
 
        /** Connect to Database */
        require_once 'dbconfig.php';
        $db = connect_db();

        /** Execute SQL and return result */
        $sql = "SELECT * FROM items WHERE id = \"$id\"";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($result))
        {
            $results[] = array(
                'id'    => $row['id'],
                'name'  => $row['name'],
                'price' => $row['price']
            );
        }
        return $results;

    }
    /**
    * Removes item with given ID
    */
    public function removeItem($id) {
        
        /** Connect to Database */
        require_once 'dbconfig.php';
        $db = connect_db();

        /** Execute SQL and return result */
        $sql = "DELETE FROM items WHERE id = \"$id\"";
        mysqli_query($db,$sql);

    }
    /**
    * Adds item with given name and price
    */
    public function addItem($name, $price) {
        
        /** Connect to Database */
        require_once 'dbconfig.php';
        $db = connect_db();

        /** Execute SQL and return result */
        $sql = "INSERT INTO items VALUES(\"$name\", \"$price)\"";
        mysqli_query($db,$sql);
        
    }
    /**
    * Updates item with given ID with given name and price
    */
    public function updateItem($id, $name, $price) {
        
        /** Connect to Database */
        require_once 'dbconfig.php';
        $db = connect_db();

        /** Execute SQL and return result */
        $sql = "UPDATE items SET name = \"$name\", price = \"$price\" WHERE id = \"$id\"";
        mysqli_query($db,$sql);

    }
}
?>