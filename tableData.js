function calculate() {
    var game = document.getElementById("dropdownInput")
    var itemName = document.getElementById('itemName').value
    var cost = document.getElementById("cost").value
    var finalCost
    if(game.value === "general"){
        finalCost = cost*1.05
    }else{
        finalCost = cost*1.15 
    }
    addRow(itemName, finalCost)   
}

function updateData(id, itemName, sellp){
    $.post("./controllers/itemController.php",
        {
            update:"upd",
            id: id,
            itemName: itemName,
            sellp:sellp
        })
}

function deleteData(id){
    $.post("./controllers/itemController.php",
    {
        delete:"del",
        item_id: id
    })
}

function addRow(name, finalCost) {
    finalCost = +finalCost.toFixed(2);

    $('#resultTable').find('tbody').append('<tr>\
    <td>'+name+'</td>\
    <td>'+finalCost+'</td>\
    <td>\
    <button type="submit" class="Edit-button"><ion-icon class="editIcon" name="create-outline"></ion-icon></button>\
    <button class="Delete-button"><ion-icon name="trash-outline"></ion-icon></button>\
    </td></tr>');
}

function totalResult(){
    $(document).ready(function(){
        var currentTR = $('#resultTable').find('tbody').find('tr');
        var totalValue = 0;
        $.each(currentTR, function(){
            totalValue += parseFloat($(this).find('td:nth-child(2)').text())
        })
        $(this).find('#result').text("Rp." + totalValue);
    })
}

function checkLoginStatus(callback){
    $.post("./controllers/AuthController.php",
        {
            loginStatus:"?",
        },function(data){
            if(data === "isLoggedIn"){
                callback(true);
            }else{
                callback(false);
            }
        }
    )
}

$(document).on("click", ".Edit-button", function () {
    var currentTD = $(this).parents('tr').find('td');
    var icon = currentTD.find('.editIcon');
    if (icon.attr("name") == "create-outline") {
        icon.attr("name", "checkmark-outline");
        currentTD = $(this).parents('tr').find('td');
        $.each(currentTD, function () {
            $(this).prop('contenteditable', true)
        });
    } else {
        icon.attr("name", "create-outline");
        $.each(currentTD, function () {
            $(this).prop('contenteditable', false)
        });
        var upTD = this;
        checkLoginStatus(function (param) {
            if(param == true){
                var name = $(upTD).parents('tr').find('td:first-child').text();
                var sellp = $(upTD).parents('tr').find('td:nth-child(2)').text();
                var id = $(upTD).val();
                updateData(id, name, sellp);
            }
        })
    }
});

$(document).on("click", ".Delete-button", function () {
    var currentTR = $(this).parents('tr');
    var id = $(this).val();
    currentTR.remove();
    checkLoginStatus(function(param){
        if(param==true){
            deleteData(id);
        }
    })
});

function exportTable(){
    let rows = document.getElementsByTagName('tr');

    let cells;
    let csv = "";

    let csvSeparator = ","; // Sets the separator between fields
    let quoteField = false; // Adds quotes around fields

    // let regex = /.*<img.*src="(.*?)"/i

    for (let row = 0; row < rows.length; row++) {
        cells = rows[row].getElementsByTagName('td');
        if (cells.length === 0) {
            cells = rows[row].getElementsByTagName('th');
        }
        for (let cell = 0; cell < (cells.length)-1; cell++) {
            if (quoteField) { csv += '"'; }
            
            csv += cells[cell].innerText;
            
            if (quoteField) { csv += '"'; }
            
            if (cell === cells.length - 2) {
                csv += "\n";
            } else {
                csv += csvSeparator;
            }
        }
    }

    downloadToFile(csv, 'data.csv', 'text/plain')
}

function downloadToFile(content, filename, contentType) {
    const a = document.createElement('a');
    const file = new Blob([content], {type: contentType});
    
    a.href = URL.createObjectURL(file);
    a.download = filename;
    
    // // To generate a link, use this:
    // a.innerHTML = "Download CSV";
    // document.body.appendChild(a);
  
    // If you want to automatically download then use this instead:
    a.click();
      URL.revokeObjectURL(a.href);
}

// $(document).on("keyup", "#searchItem", function(){
//     alert("WOARHHH")
// })

// var $rows = $('#resultTable').find('tr');
// $(document).on("keyup", "#searchItem", debounce(function() { 
//   var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
//     reg = RegExp(val, 'i'),
//     text;
//     $rows.show().filter(function() {
//         text = $(this).text().replace(/\s+/g, ' ');
//         alert("WOI")
//     return !reg.test(text);
//   }).hide();
// }, 300));

$(document).on("keyup", "#searchItem", debounce(function() {
    var input, filter, table, tr, td, i;
    input = $("#searchItem");
    filter = input.val().toUpperCase();
    table = $("#resultTable");
    tr = table.find("tbody").find("tr");
    tr.each(function () {
        var linha = $(this);
        $(this).find('td:first-child').each(function () {
            td = $(this);
            if (td.html().toUpperCase().indexOf(filter) > -1) {
                linha.show();
                return false;
            } else {
                linha.hide();
            }
        })
    })
},300))

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this,
        args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
};