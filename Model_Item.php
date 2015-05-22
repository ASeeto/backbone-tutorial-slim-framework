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

class Model_ItemFinder {
    /**
    * Returns an Instance of Model_Item
    */
    public function getById($id) {
        $sql = "SELECT * FROM items WHERE id = $id";
        $result = $db->query($sql);
        return $result;
    }
}
?>