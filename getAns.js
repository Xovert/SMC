function calculate() {
    var game = document.getElementById("dropdownInput")
    var itemName = document.getElementById('itemName').value
    var cost = document.getElementById("cost").value
    var sellPrice = document.getElementById('profit')
    var finalCost
    if(game.value === "general"){
        finalCost = cost*1.05
    }else{
        finalCost = cost*1.15 
    }
    sellPrice.innerHTML = "You must sell " + itemName + " at: " + finalCost
}