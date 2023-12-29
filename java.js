
        function fill() {
            var vente = document.getElementById("listproduit").value;
            var element = vente.split("#");
            document.querySelector("[name='id']").value = element[0];
            document.querySelector("[name='Libelle']").value = element[1];
            document.querySelector("[name='QteStck']").value = element[2];
            document.querySelector("[name='PU']").value = element[3];
        }

        // Use the onchange property to attach the fill function to the input element
        // document.getElementById("listproduit").onchange = fill;


    function updatetime(){
        var today = new Date();
        var time = today.toLocaleTimeString();
        document.getElementById("time").innerHTML = time;

        var date = today.toLocaleDateString();
        document.getElementById("date").innerHTML = date;
    }

    setInterval(updatetime,1000);
   
    function glower1(){
        var glow = document.getElementById("glow")
        glow.style.backgroundColor = "#00a284";
    }

    function glower2(){
        var glow = document.getElementById("glow")
        glow.style.backgroundColor = "#006c58";
    }
    
    var current = 1;

    function switcher(){
        if (current == 1){
            glower1();
            current = 2;
        } else {
            glower2();
            current = 1;
        }
    }

    setInterval(switcher,300);



    let total = 0;
var panier = {}; // create an empty dictionary
function addRow() {
  let hidden = document.getElementById("lines");
  var vente = document.getElementById("listproduit").value;
  var element = vente.split("#");
  // Get the input values
  var id = document.querySelector("[name='id']").value;
  var libelle = document.querySelector("[name='Libelle']").value;
  var pu = Number(document.querySelector("[name='PU']").value);
  var qte = Number(document.querySelector("[name='QteCmd']").value);
  var qte_stock = Number(document.querySelector("[name='QteStck']").value);
  if (!(id in panier) && (parseInt(qte) < parseInt(qte_stock) && parseInt(qte) !== 0)) {
    // check if the id is not in the dictionary
    // document.cookie =
    //   "panier=" + id + "#" + libelle + "#" + pu + "#" + qte + "#" + ";" + decodeURI(document.cookie);
    var newRow = [id, libelle, pu, qte,qte_stock]; // create a new array with the data
    // alert(document.cookie);
    panier[id] = newRow; // add the key-value pair to the dictionary
    for (let value of Object.values(panier)) {
      // iterate over the values of the dictionary
      for (let j = 0; j < 4; j++) {
        console.log(value[j]);
      }
    }

    // Get the table element
    var table = document.getElementById("table");
    console.log(qte,pu);
    total = Number(document.querySelector("[name='total']").value);
    total = total + (qte * pu);
    // Create a new row
    var row = table.insertRow();
    // Create three cells
    var cell1 = row.insertCell();
    var cell2 = row.insertCell();
    var cell3 = row.insertCell();
    var cell4 = row.insertCell();
    // Set the cell content
    cell1.innerHTML = id;
    cell2.innerHTML = libelle;
    cell3.innerHTML = pu;
    cell4.innerHTML = qte;
    document.querySelector("[name='total']").value = total;
    //console.log("La Qantite demande ne peut etre satisfaite");
  } else if (parseInt(qte) > parseInt(qte_stock) || parseInt(qte) == 0) {
    alert("La quantite commander ne peut etre satisfaite.");
  } else {
    alert("Produit est deja present dans la liste");
  }
}

// Get the table or table body element
document.addEventListener('DOMContentLoaded',function(){
    var table = document.getElementById("table");
    // Add a click event listener
    table.addEventListener("click", function(e) {
    // Get the target element
    var target = e.target;
    // Check if it is a table cell or a child of a table cell
    if (target.tagName !== "TD") {
        target = target.closest("td");
    }
    // If a table cell was clicked
    if (target) {
        // Get the parent row
        var row = target.parentNode;
        // Create an empty array to store the values
        var values = [];
        // Loop through the cells of the row
        for (var i = 0; i < row.cells.length; i++) {
        // Get the text content or inner HTML of each cell
        var value =  row.cells[i].innerHTML;
        // Push the value to the array
        values.push(value);
        }
        
        var id = row.cells [0].innerHTML;
        var libelle = row.cells [1].innerHTML;
        var pu = row.cells [2].innerHTML; // get the third cell value
        var qte = row.cells [3].innerHTML; // get the fourth cell value
        var qte_stock = panier[id][4];
        document.querySelector("[name='id']").value = id;
        document.querySelector("[name='Libelle']").value = libelle;
        document.querySelector("[name='QteStck']").value = qte_stock;
        document.querySelector("[name='PU']").value = pu;
        document.querySelector("[name='QteCmd']").value = Number(qte);
        console.log(pu,qte);
        var total = document.querySelector("[name='total']").value;
        total = total - (pu*qte);
        document.querySelector("[name='total']").value = total;
        console.log(total);
        row.parentNode.removeChild (row);
        delete panier[id];
        // Do something with the values, for example, alert them
        // alert(values);
     }
    });

});

// function deleteArticle(btn){
//     var row = btn.parentNode.parentNode;
//     var id = row.cells [0].innerHTML;
//     var pu = row.cells [2].innerHTML; // get the third cell value
//     var qte = row.cells [3].innerHTML; // get the fourth cell value
//     console.log(pu,qte);
//     var total = document.querySelector("[name='total']").value;
//     total = total - (pu*qte);
//     document.querySelector("[name='total']").value = total;
//     console.log(total);
//     row.parentNode.removeChild (row);
//     delete panier[id];
// }

function ErgClient(){
    var id = document.getElementById("listclient").value;
    document.cookie= "client=" + id +"#";
}