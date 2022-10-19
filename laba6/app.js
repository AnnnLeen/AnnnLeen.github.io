function priceList() {
  return {
    beadsTypes: [50, 25, 200],
    beadsOptions: {
      option2: 45,
      option3: 50,
    },
    beadsProperties: {
      prColored: 15,
      prClear: 10,
    }
  };
}

function updatePrice() {

  let s = document.getElementsByName("beadsType");
  let select = s[0];
  let price = 0;
  let prices = priceList();
  let priceIndex = parseInt(select.value) - 1;
  if (priceIndex >= 0) {
    price = prices.beadsTypes[priceIndex]; }
  
  let radioDiv = document.getElementById("radios");
  radioDiv.style.display = (select.value == "2" ? "block" : "none");
  
  let radios = document.getElementsByName("beadsOptions");
  radios.forEach(function(radio) {
    if (radio.checked) {
      let optionPrice = prices.beadsOptions[radio.value];
      if (optionPrice !== undefined) {
        price += optionPrice; } } });

  let checkDiv = document.getElementById("checkboxes");
  checkDiv.style.display = (select.value == "3" ? "block" : "none");

  let checkboxes = document.querySelectorAll("#checkboxes input");
  checkboxes.forEach(function(checkbox) {
    if (checkbox.checked) {
      let propPrice = prices.beadsProperties[checkbox.name];
      if (propPrice !== undefined) {
        price += propPrice;
      }
    }
  });

  let inputPrice = document.getElementById("field1").value;
  if (inputPrice!== undefined) { price *= inputPrice; } 

  let beadsPrice = document.getElementById("beadsPrice");
  beadsPrice.innerHTML = price + " рублей";
}

window.addEventListener('DOMContentLoaded', function (event) {

  let radioDiv = document.getElementById("radios");
  radioDiv.style.display = "none";
  
  // Находим select по имени в DOM.
  let s = document.getElementsByName("beadsType");
  let select = s[0];
  // Назначаем обработчик на изменение select.
  select.addEventListener("change", function(event) {
    let target = event.target;
    console.log(target.value);
    updatePrice();
  });
  
  let radios = document.getElementsByName("beadsOptions");
  radios.forEach(function(radio) {
    radio.addEventListener("change", function(event) {
      let r = event.target;
      console.log(r.value);
      updatePrice();
    });
  });

/*  let inputPrice = document.getElementById('field1').value; // не получилось создать обработчик 
  inputPrice.addEventListener("change", function(event) {    // количества товара, из-за него
  let inp = event.target;                                   // код перестает работать
      console.log(inp.value);
      updatePrice();
}); */

  updatePrice();

});

