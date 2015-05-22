<?php

require 'dbconfig.php';
$db = connect_db();

class Model_Item{
    $id;
    $name;
    $price;

    function __construct($id, $name, $price){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}

class Model_ItemSQL {
    /**
    * Returns an Instance of Model_Item
    */
    public function getById($id) {
        $sql = "SELECT * FROM items WHERE id = $id";
        $result = $db->query($sql);
        return $result;
    }
    /**
    * Returns an Instance of Model_Item
    */
    public function removeItem($id) {
        $sql = "DELETE FROM items WHERE id = $id";
        $result = $db->query($sql);
        return $result;
    }
    /**
    * Returns an Instance of Model_Item
    */
    // public function addItem($name, $price) {
    //     $sql = "INSERT INTO items VALUES($name, $price)";
    //     $result = $db->query($sql);
    //     return $result;
    // }
    /**
    * Returns an Instance of Model_Item
    */
    // public function updateItem($id, $name, $price) {
    //     $sql = "UPDATE items SET name = $name, price = $price WHERE id = $id";
    //     $result = $db->query($sql);
    //     return $result;
    // }
}
?>