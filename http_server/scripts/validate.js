//
// AJAX Call to display the system status
//
function showStatus() {
  $.ajax({
    url: "scripts/status.php",
    dataType: "html",
    success: function(data){
      document.getElementById("sys").innerHTML = data;
    }
  });
}


//
// Validate manual report page
// Requires a Hostname
// Resuires status to be either 'ok' or 'bad'
//
function validateManualReport() {
    var x = document.forms["form"]["hostname"].value;
    var y = document.forms["form"]["status"].value;

    if (x == "" || y == "") {
      alert("Hostname and status are required");
      return false;
    }
    else {
      return true;
    }
}


//
// Validate manual report page
// Requires a Hostname
// Resuires status to be either 'ok' or 'bad'
//
function validateUpdateReport() {
    var i = document.forms["updateform"]["id"].value;
    var x = document.forms["updateform"]["updatehostname"].value;
    var y = document.forms["updateform"]["updatestatus"].value;

    if (i == "" || x == "" || y == "") {
      alert("Id, Hostname, and status are required");
      return false;
    }
    else {
      return true;
    }
}


//
// Validate custom query page
// Reuires a SELECT statement
//
function validateCustomQuery() {
    var x = document.forms["form"]["custom-query"].value;
    x = x.toLowerCase();

    if (x == "") {
        alert("Error, query is blank.");
        return false;
    }
    else if (x.includes("select") == false) {
      alert("You must use a SELECT statement");
      return false;
    }
    else {
      return true;
    }
}


//
// Validate quick stats page
// Requires an integer value greater than 0
//
function validateQuickStats() {
    var x = document.forms["form"]["numrecords"].value;

    if (isNaN(x) || x == "" || x < 1) {
    alert("You must input a numeric value greater than 0.");
    return false;
    }
    else {
      return true;
    }
}
