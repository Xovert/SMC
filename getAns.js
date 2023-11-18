function calculate() {
    var game = document.getElementById("dropdownInput")
    var itemName = document.getElementById('itemName').value
    var cost = document.getElementById("cost").value
    var finalCost
    if(game.value === "general"){
        finalCost = cost*1.05
    }
    addRow(itemName, finalCost)
}

function addRow(name, finalCost) {
    var table = document.getElementById("resultTable")
    var row = table.insertRow(-1)
    var c1 = row.insertCell(0)
    var c2 = row.insertCell(1)

    c1.innerText = name
    c2.innerText = finalCost
}