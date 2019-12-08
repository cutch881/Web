window.addEventListener('load', () => {
  let symbols = collectInformation("symbol");
  let amounts = collectInformation("amount");
  //checks if portfolio is empty
  if (symbols.length > 0) {
    populateCompanyInfo(symbols, amounts);
  }
  setTimeout(hideLoad, 300);
});
//takes className string and returns arrayList of returned node innertext
function collectInformation(className) {
  let nodeList = document.querySelectorAll("." + className + " p");
  let arrayList = [];
  for (let node of nodeList) {
    arrayList.push(node.textContent);
  }
  return arrayList;
}
//populates portfolio value and portfolio total
function populateCompanyInfo(symbols, amounts) {
  let stocks = "";
  for (let symbol of symbols) {
    stocks = stocks + symbol + ',';
  }
  fetch("https://api.iextrading.com/1.0/stock/market/batch?symbols=" + stocks + "&types=price")
    .then(response => {
      return response.json();
    })
    .then(info => {
      let value = 0;
      let total = 0;
      let formatter = new Intl.NumberFormat('en', { style: 'currency', currency: 'USD' });
      for (let i = 0; i < symbols.length; i++) {
        console.log(amounts[i]);
        value = info[symbols[i]].price * amounts[i];
        document.querySelector("." + symbols[i] + " .close").textContent = formatter.format(info[symbols[i]].price);
        document.querySelector("." + symbols[i] + " .value").textContent = formatter.format(value);
        total += value;
      }
      document.getElementById("total").innerHTML += formatter.format(total);
    })
}
//hides loader
function hideLoad(){
  document.getElementById("preload").style.display = "none";
}