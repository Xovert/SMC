<?php

    session_start();
    require "./connection.php";

    function addItem($name, $buyp, $sellp) {
        global $conn;
        $userid = $_SESSION['id'];
        $query = "INSERT INTO items (user_id, item, buy_price, sell_price) VALUES (?, ?, ?, ?);";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isdd", $userid, $name, $buyp, $sellp);
        $stmt->execute();
        $stmt->close();
    }
    
    function deleteItem($itemID) {
        global $conn;
        $query = "DELETE FROM items WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $itemID);
        $stmt->execute();
        $stmt->close();
    }
    
    function updateItem($id, $itemname, $sellp){
        global $conn;
        $query = "UPDATE items SET item=?, sell_price=? WHERE id = ?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sdi", $itemname, $sellp, $id);
        $stmt->execute();
        $stmt->close();
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        //add car into table
        if (isset($_POST['add'])) {
            unset($_POST['add']);
            $name = $_POST['itemName'];
            $buyp = $_POST['buyPrice'];
            $game = $_POST['game'];
            $sellp = 0;
            if($game === "general"){
                $sellp = $buyp*1.05;
            }
            if($game === "spec"){
                $sellp = $buyp*1.15;
            }
            addItem($name, $buyp, $sellp);
        }
        
        // update car from table
        if (isset($_POST['update'])){
            unset($_POST['update']);
            $id = $_POST['id'];
            $itemName = $_POST['itemName'];
            $sellp = $_POST['sellp'];
            updateItem($id, $itemName, $sellp);
        }
        
        //delete car from table
        if(isset($_POST['delete'])) {
            unset($_POST['delete']);
            $itemId = $_POST['item_id'];
            deleteItem($itemId);
        }

        header("Location: ../calculator.php");
        die();
    }

?>