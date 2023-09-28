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
                <select name="game" id="dropdownInput">
                    <option value="spec">CSGO</option>
                    <option value="spec">Dota 2</option>
                    <option value="spec">TF2</option>
                    <option value="general">Other Game</option>
                </select>
            </div>
            <label for="Item Name"><b>Enter Item Name</b></label>
            <input type="text" id="itemName">
            <label for="cost"><b>Enter Cost:</b></label>
            <input type="text" id="cost" placeholder="25000" min="1" inputmode="numeric" >
            <button onclick="calculate()" type="submit" id="calc">Calculate</button>
            <p id="profit"></p>
      </div>    
</body>
</html>