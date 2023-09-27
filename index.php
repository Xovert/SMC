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
            <a href="#">Sales</a>
            <a href="#">Charts</a>
            <a href="#">Calculator</a>
            <a href="#">Calender</a>
            <a href="#">Patches</a>
            <a href="#">Discord</a>
            <a href="#">Find Games</a>
        </div>
        <div class="header-user hide-small">
            <a class="header-login" href="#">
                <span>Sign in</span>
            </a>
        </div>
    </div>
    <div class="calculator">
        <h1>Profit Calculator</h1>
        <label for="cost">Enter Cost:</label>
        <input type="number" id="costInput" placeholder="Enter cost">
        <label for="Revenue">Enter Revenue:</label>
        <input type="number" id="revenueinput" placeholder="Enter revenue">
        <div class="dropdown">
            <select id="dropdownInput">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </div>
        <button onclick="2">Calculate</button>
        <p id="profit">profit: </p>
      </div>    
</body>
</html>