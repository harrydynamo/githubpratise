document.getElementById("time-selector").style.display = "none";
document.getElementById("address-details").style.display = "none";
document.getElementById("Sdate-selec").style.display = "none";
document.getElementById("challenge-details").style.display = "none";

function show(element, id) {
    document.getElementById("time-selector").style.display = "none";
    document.getElementById("address-details").style.display = "none";
    document.getElementById("Sdate-selec").style.display = "none";

    document.getElementById("challenge_date_input").disabled = false;
    document.getElementById("challenge_time_input").disabled = false;
    document.getElementById("address_input").disabled = false;

    element.disabled = true;
    
    document.getElementById(id).style.display = "block";
}

function hideDateSelector(element, id) {

    document.getElementById(element).disabled = false;
    document.getElementById(id).style.display = "none";

    let year = document.getElementById("Syear").value;
    let month = document.getElementById("Smonth").value;
    let date = document.getElementById("Sdate").value;

    if (month <= 9) {
        month = "0"+month
    }
    if (date <= 9) {
        date = "0"+date
    }
    document.getElementById("challenge_date_input").value = year+"-"+month+"-"+date;
}

function hideTimeSelector(element, id) {

    document.getElementById(element).disabled = false;
    document.getElementById(id).style.display = "none";

    let hours = document.getElementById("hours").value;
    let minutes = document.getElementById("minutes").value;

    if (hours <= 9) {
        hours = "0"+hours;
    }
    if (minutes <= 9) {
        minutes = "0"+minutes
    }
    document.getElementById("challenge_time_input").value = hours+":"+minutes;
}

function hideAddressWindow(element, id) {

    document.getElementById(element).disabled = false;
    document.getElementById(id).style.display = "none";

    let address = document.getElementById("ground_name").value +", "+ document.getElementById("street_name").value +", "+ document.getElementById("area").value +", "+ document.getElementById("near_by").value +", "+ document.getElementById("locality").value +", "+ document.getElementById("country").value +", "+ document.getElementById("state").value +", "+ document.getElementById("city").value +", "+ document.getElementById("zip").value
    
    document.getElementById(element).value = address;
}

var hrs = document.getElementById("hours");
for (i = 0; i < 24; i++) {
    var op = document.createElement("option");
    op.value = i;
    op.innerHTML = i;
    hrs.appendChild(op);
}

var minu = document.getElementById("minutes");
for (i = 0; i <= 59; i++) {
    var op = document.createElement("option");
    op.value = i;
    op.innerHTML = i;
    minu.appendChild(op);
}

var yrs = document.getElementById("Syear");
for (i = 2017; i <= 2040; i++) {
    var op = document.createElement("option");
    op.value = i;
    op.innerHTML = i;
    yrs.appendChild(op);
}

var mon = document.getElementById("Smonth");
var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
for (i = 0; i < 12; i++) {
    var op = document.createElement("option");
    op.value = i;
    op.innerHTML = months[i];
    mon.appendChild(op);
}

function setDates(month, year) {
    var n = 30;
    var dates = document.getElementById('Sdate');
    while(dates.firstChild) 
        dates.removeChild(dates.firstChild);

    var op = document.createElement("option");
    op.selected = "selected";
    op.disabled = "disabled";
    op.innerHTML = "-- Dates -- ";
    dates.appendChild(op);

    if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
        n = 31;
    } else if ( month == 1 ) {
        if (month%4 == 0 && (month%100 == 0 || month%400 == 0))
            n = 29;
        else 
            n = 28;
    }

    for (i = 1; i <= n; i++) {
        var op = document.createElement("option");
        op.value = i;
        op.innerHTML = i;
        dates.appendChild(op);
    }
}
