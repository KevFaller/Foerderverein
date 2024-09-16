let price = document.getElementById("price");

function setTables() {
  let tableValue = document.getElementById("tables").value;
  //price.innerHTML = parseInt(price.innerHTML) + parseInt(tableValue) * 8;
  let selectElement = document.getElementById("cake");
  selectElement.innerHTML = "";
  // Loop to add options dynamically
  for (let i = 0; i <= tableValue; i++) {
    // Create a new option element
    let option = document.createElement("option");
    // Set the value and text content of the option
    option.value = i;
    option.textContent = i;
    // Append the option to the select element
    selectElement.appendChild(option);
  }
  price.innerText = tableValue * 8;
  document.getElementById("total").value = price.innerText;
  console.log(document.getElementById("total").value);
}
function setCake() {
  let cakeValue = document.getElementById("cake").value;
  let tableValue = document.getElementById("tables").value;
  //let sum = parseInt(cakeValue) * 4;
  price.innerHTML = tableValue * 8 - parseInt(cakeValue) * 4;
  document.getElementById("total").value = price.innerText;
  console.log(document.getElementById("total").value);
}
