var parent = document.getElementById("challenges");
var xhttp = new XMLHttpRequest();
var d = new Date();


function display(challenge, index) {
    let div = document.createElement("div");
    div.className = "challenge";

    let gn = document.createElement("p");
    gn.appendChild(document.createTextNode(challenge['address'].split(",")[0]));
    gn.style.fontWeight = "bold";
    gn.style.fontSize = "1.2em";
    let type = document.createElement("p");
    type.appendChild(document.createTextNode(challenge['challenge_type']))
    
    let date = document.createElement("p");
    date.appendChild(document.createTextNode(challenge['challenge_date']))

    d.setHours(challenge['challenge_time'].split(":")[0]);
    d.setMinutes(challenge['challenge_time'].split(":")[1]);
    d.setSeconds("00");
    
    let time = document.createElement("p");
    time.appendChild(document.createTextNode(d.toLocaleTimeString()))
    let rightInfo = document.createElement("span");

    let datetime = document.createElement("div");
    let name = document.createElement("p");
    name.appendChild(document.createTextNode("by "+""+challenge['firstname']+" "+challenge['lastname']));
    
    let contact = document.createElement("p");
    contact.appendChild(document.createTextNode(challenge['contact']));
    
    rightInfo.appendChild(name);
    datetime.appendChild(date);
    datetime.appendChild(time);

    rightInfo.appendChild(datetime);
    rightInfo.appendChild(contact);
    
    

    let address = document.createElement("p");
    address.appendChild(document.createTextNode(challenge['address']));
        
    div.appendChild(rightInfo);
    div.appendChild(gn);
    div.appendChild(type);
    div.appendChild(address);
    let accept = document.createElement("button");
    accept.innerHTML = "Accept Challenge";
    accept.className = "accept";
    div.appendChild(accept);
    parent.appendChild(div);
}

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
        var challenges = JSON.parse(this.responseText);
        challenges.forEach(display);
    }
}

xhttp.open("GET", "http://localhost/SportsVision/validations/Challenges.php", true);
xhttp.send();