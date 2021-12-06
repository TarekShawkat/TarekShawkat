
function search() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue, td_length;
    input = document.getElementById("table_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("searchable");
    tr = table.getElementsByTagName("tr");
    td_length= tr[1].getElementsByTagName("td").length;
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      for (j = 0; j < td_length-1; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            break;
          } else {

            tr[i].style.display = "none";
          }
        }
      }
    }
  }