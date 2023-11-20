<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SteamCalculator</title>
    <script src="/getAns.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>
    <div class="header">
        <div class="header-main-menu-button-container">
            <button type="button" class="header-button-menu">
                <span>Menu</span>
            </button>
        </div>
        <div class="header-navbar">
            <a href="#"> Calculator </a>
            <a href="https://discord.gg/HqZrp82nAB"> Discord </a>
            <a href="#" style="color:red"> Article (Coming soon)</a>
            <a href="#"> </a>
        </div>
        <div class="header-user hide-small">
            <a class="header-login" href="#">
                <span>Sign in</span>
            </a>
        </div>
    </div>
    <div class="Zeus">
        <img src="./assets/logo.png" alt="Zeus is not here">
    </div>
    <div class="flex-container">
    <div class="left-section">
        <img src="../assets/Untitled_design__6_-removebg-preview.png" alt="no image">
    </div>
    <div class="calculator">

        <h1>Steam Market Calculator</h1>
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
        <input type="text" placeholder="put your item name here" id="itemName">
        <label for="cost">Enter Cost:</label>
        <input type="text" id="cost" placeholder="put the cost of your item here" min="1" inputmode="numeric">
        <button onclick="calculate()" type="submit" id="calc">Calculate</button>
      </div> 
      <div class="item-details">
        <form action="" class="search-bar">
            <input type="text" placeholder="search" name="">
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
                <td>asd</td>
                <td>asd</td>
                <td>
                    <button class="Edit-button"><ion-icon name="create-outline"></ion-icon></button>
                    <button class="Delete-button"><ion-icon name="trash-outline"></ion-icon></td></button>
            </tbody>
        </table>    
        </div>
        <div class="export-result">
        <button class="export">
            <span>Total Result</span>
        </button>
        <button class="total-result">
            <span>Export</span>
        </button>
        </div>
    </div>
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