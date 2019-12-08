
window.addEventListener('load', () => {
  // localStorage.removeItem("a2Stocks");
  if(localStorage.getItem('a2Stocks') === null) {
    // fetch for data from api
    fetch("services/companies.php")
        .then(response => response.json())
        .then(data => {
            // store to local storage for future visits
            localStorage.setItem('a2Stocks', JSON.stringify(data));
            // populate sorted stocks using fetched data
            populateCompanies(sortObjects(data));
        })
        .catch(error => console.log(error));
  } else {
    // populate sorted stocks using local data
    populateCompanies(sortObjects(JSON.parse(localStorage.getItem('a2Stocks')), "symbol"));
  }

  // fuction populates the stock list
  function populateCompanies(stockList) {
  let table = document.querySelector('#companyTable');
  let columns = ['img', 'symbol', 'name'];

    for (let stock of stockList) {

      let tr = document.createElement('tr');

      for (let column of columns) {

        if(column == 'img') {
          let td = document.createElement('td');
          let img = document.createElement('img');
          img.setAttribute('src', `logos/${stock.symbol}.svg`);
          img.setAttribute('alt', stock.name);
          img.className = "companyImg";
          td.appendChild(img);
          tr.appendChild(td);

        }

        else {
          let td = document.createElement('td');
          let a = document.createElement('a');
          a.setAttribute('href', `single-company.php?symbol=${stock.symbol}`);
          a.appendChild(document.createTextNode(stock[column]));
          td.appendChild(a);
          tr.appendChild(td);
        }
      }
      table.appendChild(tr);
    }
    //setTimeout(hideLoad, 1000); Test for loadingscreen
    hideLoad();
  }

  // function to return sorted stocks alphabetically
  function sortObjects(items, property) {
    const stocksSorted = items.sort((a, b) => {
        var x = a[property];
        var y = b[property];
        if (x < y) {return -1;}
        if (x > y) {return 1;}
        return 0;
    });

    return stocksSorted;
  }

//-----------------------------------------------------------------------------------------

 
 
    const button = document.querySelector('button');
    const tableRows = document.querySelectorAll('#companyTable tr');
    const search = document.querySelector('#input');
 
    button.addEventListener('click', function() {
       const filter = search.value.toUpperCase();
       var foundMatch = false;
 
       for (let tr of tableRows) {
 
           const compSymb = tr.querySelector('td:nth-child(2)').textContent.toUpperCase();
 
            if (compSymb.startsWith(filter) == true) {
                tr.style.display = "table-row";
                foundMatch = true;
             }
 
 
             else {
                tr.style.display = "none";
             }
       }
 
 
 
       if(foundMatch ==false){
 
          for (let tr2 of tableRows) {
 
              tr2.style.display = "table-row";
          }
 
           alert('No Results Found');
       }
 
 
    });
    
  let div = document.createElement('div');
  let img = document.createElement('img');
  div.style.backgroundColor = "#f4f4f4";
  div.style.border = "5px solid#2cc185";
  div.style.padding = "20px";
  div.style.pointerEvents = "none";
  img.style.width = "200px";
  div.style.display = "none";
  div.style.position = "absolute";
  div.appendChild(img);
  document.querySelector('.content').appendChild(div);


  const table = document.querySelector('#companyTable');
  table.addEventListener('mouseover', (e) => {
    if (e.target.nodeName.toLowerCase() == 'img') {
      img.setAttribute('src', e.target.src);
      div.style.top = e.clientY + "px";
      div.style.left = e.clientX + "px";
      div.style.display = "block";
    }
  });

  table.addEventListener('mousemove', (e) => {
    if (e.target.nodeName.toLowerCase() == 'img') {
      div.style.top = e.clientY + "px";
      div.style.left = e.clientX + "px";
    }
  });

  table.addEventListener('mouseout', (e) => {
    if (e.target.nodeName.toLowerCase() == 'img') {
      div.style.display = "none";
    }
  });

//-----------------------------------------------------------------------------------------

});
//Function to hide loadingscreen overlay
function hideLoad(){
  document.getElementById("preload").style.display = "none";
}