<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/intro.css">
    <link rel="stylesheet" href="css/challenge-form.css">
    <link rel="stylesheet" href="css/challenges.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <?php include 'elements/navbar.php'; ?>    
    <div id='intro'>
        <button onclick="document.getElementById('challenge-details').style.display='block'">Create Football Challenge</button>
        <div id='intro-overlay'></div>
    </div>

    <div id='challenges'>
        
    </div>

    <div id="challenge-details">
        <i class="fa fa-close" onclick="document.getElementById('challenge-details').style.display='none'"></i>
        <h1>Create Challenge</h1>
        <form action="validations/CreateChallenge.php" method="post" id="create-challenge">
            <p>UserId</p>
            <input type="text" name="userid" id="" value="10201" class="detail"> <br>
            <p>Team Size</p>
            <input type="number" name="team_size" class="detail selectors" id="" placeholder=' In Team' min='0'> <br>
            <p>Substitutes</p>
            <input type="number" name="substitutes" id="" class="detail selectors" placeholder=' Substitutes' min='0'> <br>
            <p>Challenge Date</p>
            <input type="date" name="challenge_date" id="challenge_date_input" class="detail" placeholder='YYYY/MM/DD' onclick='show(this, "Sdate-selec")'>
            <input type="checkbox" id="" name="challenge_date_negotiable"> <span> - Date Negotiable</span><br>
            <p>Challenge Time</p>
            <input type="time" name="challenge_time" id="challenge_time_input" class="detail"  placeholder='HH:MM'  onclick='show(this, "time-selector")'>
            <input type="checkbox" name="challenge_time_negotiable" id=""> <span> - Time Negotiable</span><br>
            <p>Challenge Location</p>
            <!-- <input type="text" class="detail" placeholder='Playing Address' name="address" id='address_input' onclick='show(this, "address-details")'> -->
            <textarea name="address" class="detail" placeholder='Playing Address' id="address_input" cols="50" rows="4" style='resize: none' onclick='show(this, "address-details")'></textarea>
            <input type="checkbox" name="address_negotiable" id="" name=""> <span> - Location Negotiable</span> <br>
            <p>Age Limit</p>
            <select name="age_limit" id="age-limit">
                <option value="No age limit">No age limit</option>
                <option value="12 - 14">12 - 14</option>
                <option value="15 - 18">15 - 18</option>
                <option value="19 - 21">19 - 21</option>
            </select> <br>
            <p>Challenge Type</p>
            <select name="challenge_type" id="">
                <option value="Friendly">Friendly</option>
                <option value="Loosers Pay (LP)">Loosers Pay (LP)</option>
                <option value="60% - 40%">60% - 40%</option>
            </select> <br>
            <p>Challenge Price</p>
            <input type="number" name="challenge_amount" id="" class="detail selectors" placeholder='Total Challenge Price'> <br>
            <input type="submit" value="submit" name="submit">
            
        </form>
            <div id="Sdate-selec">
            <h1>Select Challenge Date</h1>
            <select name="Syear" id="Syear">
                <option value=""selected="true" disabled="disabled"> -- Year -- </option>
            </select>
            <span id="seperator">/</span>
            <select name="Smonth" id="Smonth" onclick='setDates(this.value, document.getElementById("Syear").value)'>
                <option value="" selected="true" disabled="disabled"> -- Month -- </option>
            </select>
            <span id="seperator">/</span>
            <select name="Sdate" id="Sdate">
                <option value="" selected="true" disabled="disabled"> -- Date -- </option>
            </select> <br>
            <button class="info-confirmed" onclick="hideDateSelector('challenge_date_input', 'Sdate-selec')"><img src="https://img.icons8.com/dotty/80/000000/checkmark.png"/></button>
        </div>
        <div id='time-selector'>
            <h1>Select Challenge Time</h1>
            <select name="hours" id="hours">
                <option value=""selected="true" disabled="disabled"> -- HOURS -- </option>
            </select>
            <span id="seperator">:</span>
            <select name="minutes" id="minutes">
                <option value="" selected="true" disabled="disabled"> -- MINUTES -- </option>
            </select>
            <br>
            <button class="info-confirmed" onclick="hideTimeSelector('challenge_time_input', 'time-selector')"><img src="https://img.icons8.com/dotty/80/000000/checkmark.png"/></button>
        </div>

        <div id='address-details'>
            <h1>Address Detail</h1>
            <ul id='first-line'>
                <li>
                    <p>Ground Name</p>
                    <input type="text" name="" id="ground_name" class='first' placeholder='eg :Urban Sports Ground'>
                </li>
                <li>
                    <p>Street Name</p>
                    <input type="text" name="" id="street_name" class='first' placeholder='eg :4th Street'>
                </li>
            </ul>
            
            <ul id='second-line'>
                <li>
                    <p>Area</p>
                    <input type="text" name="" id="area" class='second' placeholder='eg :Lokhandwala, Millat Nagar etc.'>
                </li>
                <li>
                    <p>Near By</p>
                    <input type="text" name="" id="near_by" class='second' placeholder='eg :Infinity Mall (Goregoan)'>
                </li>
                <li>
                    <p>Locality</p>
                    <input type="text" name="" id="locality" class='second' placeholder='eg :Vashi, Panvel etc.'>
                </li>
            </ul>

            <ul id='third-line'>
                <li>
                    <p>Country</p>
                    <input type="text" name="" id="country" class='third' placeholder='eg :India'>
                </li>
                <li>
                    <p>State</p>
                    <input type="text" name="" id="state" class='third' placeholder='eg :Maharashtra'>                    
                </li>
            </ul>

            <ul id='fourth-line'>
                <li>
                    <p>City</p>
                    <input type="text" name="" id="city" class='fourth' placeholder='eg :Mumbai'>
                </li>
                <li>
                    <p>Zip/Postal Code</p>
                    <input type="text" name="" id="zip" class='fourth' placeholder='eg :400059'>
                </li>
            </ul>
            <button class="info-confirmed" onclick="hideAddressWindow('address_input', 'address-details')"><img src="https://img.icons8.com/dotty/80/000000/checkmark.png"/></button>
        </div>

        <div id='overlay'></div>
    </div>

    <script src="javascript/home-page.js"></script>
    <script src="javascript/challenges.js"></script>
</body>
</html>
