<?php
    $db = mysqli_connect("localhost","root","","test");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book My Seats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link href="delete1.css" rel="stylesheet" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <meta name="google-signin-client_id" content="386918221572-ntvfo1s66g49ghamntgsc75ilp5aifi0.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <link href="seatSelection1.css" rel="stylesheet" type="text/css">
  <script src="google.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<style>
    .qr-code { 
      max-width: 200px; 
      margin: 10px; 
    } 
    .confirm{
        text-align: center;
    }
    .bodyofQR{
        display: none;
    }
</style>

</head>

<body onload="onLoader()">


<nav>
        <div class="navbar" id="app">
            <img v-bind:src="Image" height="60" width="60">
            <h1>{{ Title }}</h1>
            <div class="search-box">
                <input type="text" autocomplete="off" placeholder="Search Movies..." />
                <div class="result"></div>
            </div>

        <button type="button" id="google" class="google-profile" value="signin">Signin</button>
            <button type="button" data-toggle="modal" data-target="#mymodal" class="google-signin" value="SignIn">Sign in</button>
            <select name="select" readonly>
        <option id="selected"  value="Location">{{ Location }} </option>
        <option>Montreal</option>
        <option>Toronto</option>
        <option>Vancouver</option>
        <option>Ottawa</option>
            </select>
        </div>
    </nav>

<button onclick="darkMode()" class="dark-mode-button"><img src="dark-mode.png"></button>
    <div class="modal fade" id="mymodal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign in</h4>
      </div>

      <div class="modal-body">
        <div class="g-signin2" data-onsuccess="onsignin"></div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="inputForm">
<div>
<center>

  Name *: <input type="text" id="Username" required>
  Number of Seats *: <input type="number" id="Numseats" required>
  <br/><br/>
  <button onclick="takeData()">Start Selecting</button>
</center>
</div>

</div>
  

<div class="seatStructure">
    <div>
<center>
  
<table id="seatsBlock">
 <p id="notification"></p>
  <tr>
    <td colspan="14"><div class="screen">SCREEN</div></td>
    <td rowspan="20">
      <div class="smallBox greenBox">Selected Seat</div> <br/>
      <div class="smallBox redBox">Reserved Seat</div><br/>
      <div class="smallBox emptyBox">Empty Seat</div><br/>
    </td>
    
    <br/>
  </tr>
  
  <tr>
    <td></td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td></td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
</tr>
  
<tr>
    <td>A</td>
    <td><input type="checkbox" class="seats" value="A1"></td>
    <td><input type="checkbox" class="seats" value="A2"></td>
    <td><input type="checkbox" class="seats" value="A3"></td>
    <td><input type="checkbox" class="seats" value="A4"></td>
    <td><input type="checkbox" class="seats" value="A5"></td>
    <td class="seatGap"></td>
    <td><input type="checkbox" class="seats" value="A6"></td>
    <td><input type="checkbox" class="seats" value="A7"></td>
    <td><input type="checkbox" class="seats" value="A8"></td>
    <td><input type="checkbox" class="seats" value="A9"></td>
    <td><input type="checkbox" class="seats" value="A10"></td>
    <td><input type="checkbox" class="seats" value="A11"></td>
    <td><input type="checkbox" class="seats" value="A12"></td>
  </tr>
  
  <tr>
    <td>B</td>
    <td><input type="checkbox" class="seats" value="B1"></td>
    <td><input type="checkbox" class="seats" value="B2"></td>
    <td><input type="checkbox" class="seats" value="B3"></td>
    <td><input type="checkbox" class="seats" value="B4"></td>
    <td><input type="checkbox" class="seats" value="B5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="B6"></td>
    <td><input type="checkbox" class="seats" value="B7"></td>
    <td><input type="checkbox" class="seats" value="B8"></td>
    <td><input type="checkbox" class="seats" value="B9"></td>
    <td><input type="checkbox" class="seats" value="B10"></td>
    <td><input type="checkbox" class="seats" value="B11"></td>
    <td><input type="checkbox" class="seats" value="B12"></td>
  </tr>
  
  <tr>
    <td>C</td>
    <td><input type="checkbox" class="seats" value="C1"></td>
    <td><input type="checkbox" class="seats" value="C2"></td>
    <td><input type="checkbox" class="seats" value="C3"></td>
    <td><input type="checkbox" class="seats" value="C4"></td>
    <td><input type="checkbox" class="seats" value="C5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="C6"></td>
    <td><input type="checkbox" class="seats" value="C7"></td>
    <td><input type="checkbox" class="seats" value="C8"></td>
    <td><input type="checkbox" class="seats" value="C9"></td>
    <td><input type="checkbox" class="seats" value="C10"></td>
    <td><input type="checkbox" class="seats" value="C11"></td>
    <td><input type="checkbox" class="seats" value="C12"></td>
</tr>
  
<tr>
    <td>D</td>
    <td><input type="checkbox" class="seats" value="D1"></td>
    <td><input type="checkbox" class="seats" value="D2"></td>
    <td><input type="checkbox" class="seats" value="D3"></td>
    <td><input type="checkbox" class="seats" value="D4"></td>
    <td><input type="checkbox" class="seats" value="D5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="D6"></td>
    <td><input type="checkbox" class="seats" value="D7"></td>
    <td><input type="checkbox" class="seats" value="D8"></td>
    <td><input type="checkbox" class="seats" value="D9"></td>
    <td><input type="checkbox" class="seats" value="D10"></td>
    <td><input type="checkbox" class="seats" value="D11"></td>
    <td><input type="checkbox" class="seats" value="D12"></td>
</tr>
  
<tr>
    <td>E</td>
    <td><input type="checkbox" class="seats" value="E1"></td>
    <td><input type="checkbox" class="seats" value="E2"></td>
    <td><input type="checkbox" class="seats" value="E3"></td>
    <td><input type="checkbox" class="seats" value="E4"></td>
    <td><input type="checkbox" class="seats" value="E5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="E6"></td>
    <td><input type="checkbox" class="seats" value="E7"></td>
    <td><input type="checkbox" class="seats" value="E8"></td>
    <td><input type="checkbox" class="seats" value="E9"></td>
    <td><input type="checkbox" class="seats" value="E10"></td>
    <td><input type="checkbox" class="seats" value="E11"></td>
    <td><input type="checkbox" class="seats" value="E12"></td>
</tr>
  
<tr class="seatVGap"></tr>
  
<tr>
    <td>F</td>
    <td><input type="checkbox" class="seats" value="F1"></td>
    <td><input type="checkbox" class="seats" value="F2"></td>
    <td><input type="checkbox" class="seats" value="F3"></td>
    <td><input type="checkbox" class="seats" value="F4"></td>
    <td><input type="checkbox" class="seats" value="F5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="F6"></td>
    <td><input type="checkbox" class="seats" value="F7"></td>
    <td><input type="checkbox" class="seats" value="F8"></td>
    <td><input type="checkbox" class="seats" value="F9"></td>
    <td><input type="checkbox" class="seats" value="F10"></td>
    <td><input type="checkbox" class="seats" value="F11"></td>
    <td><input type="checkbox" class="seats" value="F12"></td>
</tr>
  
<tr>
    <td>G</td>
    <td><input type="checkbox" class="seats" value="G1"></td>
    <td><input type="checkbox" class="seats" value="G2"></td>
    <td><input type="checkbox" class="seats" value="G3"></td>
    <td><input type="checkbox" class="seats" value="G4"></td>
    <td><input type="checkbox" class="seats" value="G5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="G6"></td>
    <td><input type="checkbox" class="seats" value="G7"></td>
    <td><input type="checkbox" class="seats" value="G8"></td>
    <td><input type="checkbox" class="seats" value="G9"></td>
    <td><input type="checkbox" class="seats" value="G10"></td>
    <td><input type="checkbox" class="seats" value="G11"></td>
    <td><input type="checkbox" class="seats" value="G12"></td>
</tr>
  
<tr>
    <td>H</td>
    <td><input type="checkbox" class="seats" value="H1"></td>
    <td><input type="checkbox" class="seats" value="H2"></td>
    <td><input type="checkbox" class="seats" value="H3"></td>
    <td><input type="checkbox" class="seats" value="H4"></td>
    <td><input type="checkbox" class="seats" value="H5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="H6"></td>
    <td><input type="checkbox" class="seats" value="H7"></td>
    <td><input type="checkbox" class="seats" value="H8"></td>
    <td><input type="checkbox" class="seats" value="H9"></td>
    <td><input type="checkbox" class="seats" value="H10"></td>
    <td><input type="checkbox" class="seats" value="H11"></td>
    <td><input type="checkbox" class="seats" value="H12"></td>
</tr>
  
<tr>
    <td>I</td>
    <td><input type="checkbox" class="seats" value="I1"></td>
    <td><input type="checkbox" class="seats" value="I2"></td>
    <td><input type="checkbox" class="seats" value="I3"></td>
    <td><input type="checkbox" class="seats" value="I4"></td>
    <td><input type="checkbox" class="seats" value="I5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="I6"></td>
    <td><input type="checkbox" class="seats" value="I7"></td>
    <td><input type="checkbox" class="seats" value="I8"></td>
    <td><input type="checkbox" class="seats" value="I9"></td>
    <td><input type="checkbox" class="seats" value="I10"></td>
    <td><input type="checkbox" class="seats" value="I11"></td>
    <td><input type="checkbox" class="seats" value="I12"></td>
</tr>
  
<tr>
    <td>J</td>
    <td><input type="checkbox" class="seats" value="J1"></td>
    <td><input type="checkbox" class="seats" value="J2"></td>
    <td><input type="checkbox" class="seats" value="J3"></td>
    <td><input type="checkbox" class="seats" value="J4"></td>
    <td><input type="checkbox" class="seats" value="J5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="J6"></td>
    <td><input type="checkbox" class="seats" value="J7"></td>
    <td><input type="checkbox" class="seats" value="J8"></td>
    <td><input type="checkbox" class="seats" value="J9"></td>
    <td><input type="checkbox" class="seats" value="J10"></td>
    <td><input type="checkbox" class="seats" value="J11"></td>
    <td><input type="checkbox" class="seats" value="J12"></td>
</tr>
  
  
</table>
<br/><button onclick="updateTextArea()">Confirm Selection</button>
<a href="" id="emaila"><p id="email"></p></a>
</center>
</div>
</div>
      
<br/><br/>

<div class="displayerBoxes">
<center>
  <table class="Displaytable">
  <tr>
    <th>Name</th>
    <th>Number of Seats</th>
    <th>Seats</th>
  </tr>
  <tr>
    <td><textarea id="nameDisplay"></textarea></td>
    <td><textarea id="NumberDisplay"></textarea></td>
    <td><textarea id="seatsDisplay"></textarea></td>
  </tr>
</table>

</center>
</div>

<div class="bodyofQR">
<div class="container-fluid"> 
    <div class="text-center"> 
  
      <!-- Get a Placeholder image initially, 
       this will change according to the 
       data entered later -->
      <img src= 
"https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
        class="qr-code img-thumbnail img-responsive" /> 
    </div> 
  
    <div class="form-horizontal"> 
      <div class="form-group"> 
        <label class="control-label col-sm-2"
          for="content"> 
          Content: 
        </label> 
        <div class="col-sm-10"> 
  
          <!-- Input box to enter the  
              required data -->
          <input type="text" size="60" 
            maxlength="60" class="form-control"
            id="content" placeholder="Enter content" /> 
        </div> 
      </div> 
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
  
          <!-- Button to generate QR Code for 
           the entered data -->
          <button type="button" class= 
            "btn btn-default" id="generate"> 
            Generate 
          </button> 
        </div> 
      </div> 
    </div> 
  </div> 
</div>
  <script src= 
    "https://code.jquery.com/jquery-3.5.1.js"> 
  </script> 
  
  <script> 
   function htmlEncode(value) { 
      return $('<div/>').text(value) 
        .html(); 
    } 
  
    $(function () { 
  
      // Specify an onclick function 
      // for the generate button 
      $('#generate').click(function () { 
  
        // Generate the link that would be 
        // used to generate the QR Code 
        // with the given data  
        let finalURL = 
'https://chart.googleapis.com/chart?cht=qr&chl=' + 
          htmlEncode($('#content').val()) + 
          '&chs=160x160&chld=L|0' 
  
        // Replace the src of the image with 
        // the QR code image 
        $('.qr-code').attr('src', finalURL); 
      }); 
    }); 
  </script> 
<script>
function onLoader()
{
  $(".seatStructure *").prop("disabled", true);
  $(".displayerBoxes *").prop("disabled", true);
}

function takeData()
{
  if (( $("#Username").val().length == 0 ) || ( $("#Numseats").val().length == 0 ))
  {
  alert("Please Enter your Name and Number of Seats");
  }
  else
  {
    $(".inputForm *").prop("disabled", true);
    $(".seatStructure *").prop("disabled", false);
    document.getElementById("notification").innerHTML = "<b style='margin-bottom:0px;background:yellow;'>Please Select your Seats NOW!</b>";
  }
}


function updateTextArea() { 
    
  if ($("input:checked").length == ($("#Numseats").val()))
    {
      $(".seatStructure *").prop("disabled", true);
      
     var allNameVals = [];
     var allNumberVals = [];
     var allSeatsVals = [];
  
     //Storing in Array
     allNameVals.push($("#Username").val());
     allNumberVals.push($("#Numseats").val());
     $('#seatsBlock :checked').each(function() {
       allSeatsVals.push($(this).val());
     });
    
     //Displaying 
     $('#nameDisplay').val(allNameVals);
     $('#NumberDisplay').val(allNumberVals);
     $('#seatsDisplay').val(allSeatsVals);
    $(".bodyofQR").css("display","block");

    }
  else
    {
      alert("Please select " + ($("#Numseats").val()) + " seats")
    }
  }


function myFunction() {
  alert($("input:checked").length);
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}



$(":checkbox").click(function() {
  if ($("input:checked").length == ($("#Numseats").val())) {
    $(":checkbox").prop('disabled', true);
    $(':checked').prop('disabled', false);
  }
  else
    {
      $(":checkbox").prop('disabled', false);
    }
});


  </script>
  <script>
    function darkMode(){
            var ele = document.body;
            ele.classList.toggle("dark-mode");
        }
  </script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="main.js"></script>
</body>

<footer>

    <div class='top-div'>
        <div class="footer-ele">
            <ul>
                <li class="first-element"><b>Movies By Genre</b></li>
                <li><a href="GenreAction/GenreAction.html">Action</a></li>
                <li><a href="GenreRomance/GenreRomance.html">Romance</a></li>
                <li><a href="#">Comedy</a></li>
                <li><a href="#">Drama</a></li>
                <li><a href="#">Sci-fi</a></li>
                <li><a href="#">Crime</a></li>
                <li><a href="#">Mystery</a></li>
                <li><a href="#">Thriller</a></li>
            </ul>
            <ul>
                <li class="first-element"><b>Movies By language</b></li>
                <li><a href="English.html">English</a></li>
                <li><a href="French.html">French</a></li>
                <li><a href="#">Hindi</a></li>
                <li><a href="#">Tamil</a></li>
                <li><a href="#">Telugu</a></li>
            </ul>
            <ul>
                <li class="first-element"><b>Popular Movies by Language</b></li>
                <li><a href="#">Popular Hindi Movies</a></li>
                <li><a href="#">Popular English Movies</a></li>
                <li><a href="#">Popular Telugu Movies</a></li>
                <li><a href="#">Popular Tamil Movies</a></li>
            </ul>
            <ul>
                <li class="first-element"><b>Movies review</b></li>
                <li><a href="#">Trending Articles</a></li>
                <li><a href="#">IMDB ratings</a></li>
                <li><a href="home.html">Search movies and cast</a></li>
            </ul>
        </div>
    </div>
    <div class="middle-div">
        <ul class='middle-ele'>
            <li class="middle"><a href="aboutproject.html">About Us</a></li>
            <li class="middle"><a href="About_us/about.html">Contact Us</a></li>
            <li class="middle"><a href="help.html">Help</a></li>
        </ul>
        <div id="bottom-div">
            <ul class="footer-ul">
                <a href="#"><li id="fa" class="fa fa-facebook"></li></a>
                <a href="#"><li id="fa" class="fa fa-instagram"></li></a>
                <a href="#"><li id="fa" class="fa fa-twitter"></li></a>
            </ul>
        </div>
    </div>

</footer>
</html>
 