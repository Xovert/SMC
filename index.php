<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SteamCalculator</title>
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
            <a href="#"> Discord </a>
            <a href="#" style="color:red"> Article (Coming soon)</a>
            <a href="#"> </a>
        </div>
        <div class="header-user hide-small">
            <a class="header-login" href="#">
                <span>Sign in</span>
            </a>
        </div>
    </div>

    <img src="./assets/top.png" alt="Zeus is not here">
    <div class="calculator">

        <h1>Steam Market Calculator</h1>
        <div class="dropdown">
            <h4>Choose Game</h4>
            <select id="dropdownInput">
                <option value="option1">CSGO</option>
                <option value="option2">Dota 2</option>
                <option value="option3">TF2</option>
                <option value="option3">Other Game</option>
            </select>
        </div>
        <h4>Item's name</h4>
        <input type="text">
        <label for="cost">Enter Cost:</label>
        <input type="number" id="costInput" placeholder="Enter cost">
        <button onclick="2">Calculate</button>

        <p id="profit">You Must Sell The Item at : </p>

      </div>    
</body>
</html>