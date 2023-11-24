<?php
    session_start();
    $isLoggedIn = (isset($_SESSION['is_login'])) ? true : false;
    // echo "<script>console.log('Debug Objects: " . $status . "' );</script>";
    // echo "<script>console.log('Debug Objects: " . $_SESSION['email'] . "' );</script>";
    if($isLoggedIn){
        require "./controllers/connection.php";
        global $conn;
        $user_id = $_SESSION['id']; 
        $query = "SELECT id, item, sell_price FROM items WHERE user_id = $user_id";
        $result = $conn->query($query);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SteamCalculator</title>
    <script src="jquery-3.7.1.js"></script>
    <script src="tableData.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>
    <div class="header">
        <div class="header-main-menu-button-container">
            <button type="button" class="header-button-menu">
                <a href="./index.php">Menu</a>
            </button>
        </div>
        <div class="header-navbar">
            <a href=""> Calculator </a>
            <a href="https://discord.gg/HqZrp82nAB"> Discord </a>
            <a href="#" style="color:red"> Article (Coming soon)</a>
            <a href="#"> </a>
        </div>
        <div class="header-user hide-small">
            <?php
            if(!$isLoggedIn){
                echo '<a class="header-login" href="./login.php">';
                echo '<span>Sign in</span>';
                echo '</a>';
            }else{
                echo '<a class="header-login" href="./controllers/logout.php">';
                echo '<span>Log out</span>';
                echo '</a>';
            }
            ?>
        </div>
    </div>
    <div class="Zeus">
        <img src="./assets/logo.png" alt="Zeus is not here">
    </div>
    <div class="flex-container">
    <div class="left-section">
        <img src="../assets/Untitled_design__6_-removebg-preview.png" alt="no image">
    </div>

    <!-- Calculator -->

    <div class="calculator">
        <h1>Steam Market Calculator</h1>
        <!-- Input Item -->
        <?php
            if($isLoggedIn){
                echo'<form action="/controllers/itemController.php" method="POST">';
            }
        ?>
            <div class="dropdown">
                <h4>Choose Game</h4>
                <select name="game" id="dropdownInput">
                    <option value="spec">CSGO</option>
                    <option value="spec">Dota 2</option>
                    <option value="spec">TF2</option>
                    <option value="general">Other Game</option>
                </select>
            </div>
            <label for="Item Name"><b>Enter Item Name</b></label>
            <input type="text" placeholder="put your item name here" id="itemName" name="itemName">
            <label for="cost">Enter Cost:</label>
            <input type="text" id="cost" placeholder="put the cost of your item here" min="1" inputmode="numeric" name="buyPrice">
            <button name="add" type="submit" onclick="<?php if(!$isLoggedIn){echo'calculate()';}?>" id="calc">Calculate</button>
        <?php
            if($isLoggedIn){
                echo'</form>';
            }
        ?>
    </div> 

    <!-- Items Table -->
    <div class="item-details">
        <form class="search-bar">
            <input id="searchItem" type="text" placeholder="Type to search">
            <button class="search-button"><ion-icon name="search-circle-outline"></ion-icon></button>
        </form>
        <div class="tables-size">
            <table id="resultTable" class="HistoryTable">
                <thead>
                    <th>Item Name</th>
                    <th>Price to Sell (in rp)</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php
                if ($isLoggedIn){
                    if($result->num_rows>0){
                        while ($row = $result->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>'. $row['item'] .'</td>';
                            echo '<td>'. $row['sell_price']. '</td>';
    
                            echo '<td>';
                            echo '<button class="Edit-button" value="'.$row['id'].'"><ion-icon class="editIcon" name="create-outline"></ion-icon></button>';
                            
                            echo '<button class="Delete-button" name="delete" value ="'.$row['id'].'"><ion-icon name="trash-outline"></ion-icon></button>';
                        
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                }
                ?>
                </tbody>
            </table>    
        </div>
        <div class="export-result">
            <button onclick="totalResult()" class="export">
                <span>Total Result: </span>
                <span id="result"></span>
            </button>
            <button onclick="exportTable()"class="total-result">
                <span>Export</span>
            </button>
        </div>
    </div>

    <!-- Images -->

    <div class="right-section">
        <img src="../assets/Untitled_design__3_-removebg-preview.png" alt="no pic">
    </div>

<div class="footer">
     &copy; 2023 Steam Market Calculator. All rights reserved.
</div>


</div>   
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>