window.addEventListener('load', () => {
  var symbol = document.getElementById("compSymb").textContent;
  const compStock = "https://api.iextrading.com/1.0/stock/" + symbol + "/chart/1m";
  fetch(compStock)

    .then(function(response2) {
      return response2.json()
    })


//Building the company table while fetching data from API
    .then(function(stock) {

      const table = document.querySelector('#data');
      table.style.height = "1100px";
      table.innerHTML = "";
      const tRow = document.createElement('tr');
      const dateHead = document.createElement('th');
      const openHead = document.createElement('th');
      const highHead = document.createElement('th');
      const lowHead = document.createElement('th');
      const closeHead = document.createElement('th');
      const volumeHead = document.createElement('th');

      dateHead.innerHTML = "Date";
      openHead.innerHTML = "Open";
      highHead.innerHTML = "High";
      lowHead.innerHTML = "Low";
      closeHead.innerHTML = "Close";
      volumeHead.innerHTML = "Volume";

      tRow.appendChild(dateHead);
      tRow.appendChild(openHead);
      tRow.appendChild(highHead);
      tRow.appendChild(lowHead);
      tRow.appendChild(closeHead);
      tRow.appendChild(volumeHead);
      table.appendChild(tRow);


      for (const s of stock) {
        const tr = document.createElement('tr');
        const date = document.createElement('td');
        const open = document.createElement('td');
        const high = document.createElement('td');
        const low = document.createElement('td');
        const close = document.createElement('td');
        const volume = document.createElement('td');

        date.innerHTML = s.date;
        open.innerHTML = s.open.toFixed(2);
        high.innerHTML = s.high.toFixed(2);
        low.innerHTML = s.low.toFixed(2);
        close.innerHTML = s.close.toFixed(2);
        volume.innerHTML = s.volume;

        tr.appendChild(date);
        tr.appendChild(open);
        tr.appendChild(high);
        tr.appendChild(low);
        tr.appendChild(close);
        tr.appendChild(volume);
        table.appendChild(tr);
      }


      //-------------------------------table sort section-------(SOURCE: https://www.youtube.com/watch?v=QxbJ9b-mpoA)-----------------------------------------------------
      const th = table.getElementsByTagName('th'); //getting th created and passed in

      for (let c = 0; c < th.length; c++) {

        th[c].addEventListener('click', item(c));
      }


      function item(c) {

        return function() {
          console.log(c);
          sortTable(c);
        };
      }



      function sortTable(c) { //functions can be declaire above calling section too
        //*table* is the global variable of this function//
        var rows, switching, i, x, y, shouldSwitch;
        //table = document.getElementById("myTable"); //table is global, so not needed here
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
          //start by saying: no switching is done:
          switching = false;
          rows = table.rows;
          /*Loop through all table rows (except the
          first, which contains table headers):*/
          for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[c];
            y = rows[i + 1].getElementsByTagName("TD")[c];
            //check if the two rows should switch place:
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
          if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
          }
        }
      }

    });
});
