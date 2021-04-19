<?php
    $connect = mysqli_connect("localhost","root","","test");
    $sql  = "SELECT * FROM movie where title = 'WONDER WOMAN 1984'" ;
    $result = mysqli_query($connect,$sql);
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    //   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book My Seats</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="delete1.css" rel="stylesheet" type="text/css">	<link href="selectedMoviePage.css" rel="stylesheet" type="text/css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <meta name="google-signin-client_id" content="386918221572-ntvfo1s66g49ghamntgsc75ilp5aifi0.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="google.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

  <style>
h2{
	font-family: 'Roboto', sans-serif;
	margin: 40px 0px 0px 30px; 
	font-weight: 1000;
}
.container img{
	border-radius: 50%;
	height: 120px;
	width: 120px;
	object-fit: cover;
}

div.scrollimg{
	overflow: auto;
	white-space: nowrap;
}

.container p{
	font-family: -apple-system;
	font-weight: 250;
	text-align: center;
}

.container{
	margin-top: 20px;
	width:auto;
	height: 140px;
	display: inline-block;
}
.about{
	font-family: arial;
	font-size: 16px;
	font-weight: 400;
	margin: 30px 0px 0px 40px;
}

hr{
	height:2px;
	border-width:0;
	color:gray;
	background-color:gray;
}

.rating span{
	height: 140px;
	width: 140px;
}
</style>
</head>
<body>
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
			  <option id="selected" value="Location">{{ Location }}	</option>
			  <option>Montreal</option>
        <option>Toronto</option>
        <option>Vancouver</option>
        <option>Ottawa</option>
			</select>
		</div>
	</nav>

<!-- Signin -->
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

<!-- Dark mode --> 
<button onclick="darkMode()" class="dark-mode-button"><img src="dark-mode.png"></button>


	<div class="movie-board">
		<div class="movie-board-child1">
			<img src="Movies/wonderwoman1.jpg">
			<p class="availability">Available</p>
		</div>
		<div class="movie-board-child2">
            <img src="Movies/play.png">
            <?php
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result))
                    {
            ?>
			<p>PREMIERE</p>
			<p><?php echo $row["title"];?></p>
			<span class="movie-type">2D, MX4D, IMAX 3D, D-BOX</span>
			<p class="movie-language"><?php echo $row["language"];?></p>
			<a href="lastpage.html"><button class="booking-seats">Book seats</button></a>
		</div>
    </div>
    <?php } } ?>
<h2>About movie</h2>
	<p class="about">Diana, princess of the Amazons, trained to be an unconquerable warrior. Raised on a sheltered island paradise, when a pilot crashes on their shores and tells of a massive conflict raging in the outside world, Diana leaves her home, convinced she can stop the threat. Fighting alongside man in a war to end all wars, Diana will discover her full powers and her true destiny.</p>

<hr>
   <h2 class="title">Cast</h2>
<div class="scrollimg">
	<div class="container">
		<a href="https://en.wikipedia.org/wiki/Gal_Gadot">
			<img src="cast/cast1 2.jpg"/>
			<p>Gal Gadot</p>
		</a>
	</div>
	<div class="container">
		<a href="https://en.wikipedia.org/wiki/Gabriella_Wilde">
			<img src="cast/cast3 2.jpg"/>
			<p>Gabriella Wilde</p>
		</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast4 1.jpg"/>
			<p>Doutzen Kroes</p>
		</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast5.jpg"/>
			<p>Robin Wright</p>
	</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast6.jpg"/>	
			<p>Chris Pine</p>
	</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast7 1.jpg"/>
			<p>Natasha Rothwell</p>
		</a>
	</div>
	<div class="container">	
		<a href="#">
			<img src="cast/cast8.jpg"/>	
			<p>Connie Nielsen</p>
		</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast9 1.jpg"/>
			<p>Ravi Patel</p>
		</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast11.jpg"/>
			<p>Lily Aspell</p>
		</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast10 1.jpg"/>
			<p>Oliver Cotton</p>
		</a>
	</div>
	<div class="container">
		<a href="#">
			<img src="cast/cast12.jpg"/>
			<p>Oakley Bull</p>
	</a>
	</div>
</div>

<hr>
<h2 class="title">Crew</h2>
<div class="scrollimg">
	<div class="container">
		<img src="cast/crew1.jpg"/>
		<p>Patty Jenkins</p>
		<p>Director</p>
	</div>
	<div class="container">
		<img src="cast/cast1.jpg"/>
		<p>Gal Gadot</p>
		<p>Producer</p>
	</div>
	<div class="container">
		<img src="cast/cast2 2.jpg"/>
		<p>Jack Synder</p>
		<p>Producer</p>
	</div>
	<div class="container">
		<img src="cast/crew2.jpg"/>
		<p>Debora Synder</p>
		<p>Producer</p>
	</div>
	<div class="container">
		<img src="cast/crew3.jpg"/>
		<p>Geoff Johns</p>
		<p>Screenplay</p>
	</div>
	<div class="container">
		<img src="cast/crew5.jpg"/>
		<p>Matthew Jensen</p>
		<p>Cinematographer</p>
	</div>
</div>

<hr>

<h2>Rating</h2>
<div class="rating">
	<span>☆</span>
	<span>☆</span>
	<span>☆</span>
	<span>☆</span>
	<span>☆</span>
</div>

<hr>
<h2>Other videos about movie</h2>
	<div class="trailer-section" id="trailer" style="margin-bottom: 80px;">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/EvJDmeVUh_Y" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>


  	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="main.js"></script>
    <script>
    		function darkMode(){
			var ele = document.body;
			ele.classList.toggle("dark-mode");
		}
    </script>
  

</body>


<footer>

    <div class='top-div'>
        <div class="footer-ele">
            <ul>
                <li class="first-element"><b>Movies By Genre</b></li>
                <li><a href="#">Action</a></li>
                <li><a href="#">Romance</a></li>
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
