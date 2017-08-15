/* Insert zipcodes in select */
let total = 0;
const portion = 500;
const select = document.getElementById('zipcode');


const request = new XMLHttpRequest();
request.open('POST', './inc/ajax.php', true);

request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
    // Success!
    total = request.responseText;
    get_zipcodes();
  } else {
    // We reached our target server, but it returned an error
  }
};

request.onerror = function() {
  // There was a connection error of some sort
};

request.send(); 

function get_zipcodes() {

	for (let i = 1; i < Math.ceil(total/portion); i++) { 

	    let params = { from : portion * i, to : portion};

	    const request = new XMLHttpRequest();
	    request.open('POST', './inc/ajax.php', true);
	    request.setRequestHeader("Content-type", "application/json");
	    request.onload = function() {
	    if (request.status >= 200 && request.status < 400) {
	        // Success!
	        var data = JSON.parse(request.responseText);
	        
	        print_zipcodes(data);

	        
	      } else {
	        // We reached our target server, but it returned an error
	      }
	    };

	    request.onerror = function() {
	      // There was a connection error of some sort
	    };
	    request.send(JSON.stringify(params));
	}

}

function print_zipcodes(data) {

	data.forEach(function(line) {
	    let option = document.createElement("option");
	    option.setAttribute("value", line.id);
	    option.innerHTML = line.code_postal+' &ndash; '+line.localité;
	    select.append(option);
	});
}

// news ways to do :
// https://www.atatus.com/blog/fetch-api/
// https://developers.google.com/web/updates/2015/03/introduction-to-fetch

/* Graphique */
var ctx = document.getElementById('myChart').getContext('2d');
console.log(ctx);
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ["Bruxelles", "February", "March"],
        datasets: [{
            label: "My First dataset",
            data: [300,50, 100],
            backgroundColor: ["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"],
            borderColor: 'rgb(255, 99, 132)'
        }]
    },

    // Configuration options go here
    options: {}
});

