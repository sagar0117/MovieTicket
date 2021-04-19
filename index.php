<?php
    $db = mysqli_connect("localhost","root","","test");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book My Seats</title>
  <meta charset="utf-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
  <script src="google.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
        <button type="button" id="google" data-toggle="modal" data-target="#mymodal" class="google-profile"  >Signin</button>
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
      <a href="#" onclick="signOut();">Sign out</a>
<!--       <a onclick="logout()">Logout</a>
 -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Dark mode --> 
<button onclick="darkMode()" class="dark-mode-button"><img src="dark-mode.png"></button>


<!-- Recommanded movies -->
 
    <div class="ScriptTop">
        <div class="rt-container">
            <div class="col-rt-4" id="float-right">

            </div>
        </div>
    </div>

    <header class="ScriptHeader">
        <div class="rt-container">
            <div class="col-rt-12">
                <div class="rt-heading">
                    <h2>Recommended Movies</h2>
                </div>
            </div>
        </div>
    </header>


    <section class="carousel">
        <div class="rt-container">
            <div class="col-rt-12">
                <div class='demo-container'>
                    <div class='carousel'>
                        <input checked='checked' class='carousel__activator' id='carousel-slide-activator-1'
                            name='carousel' type='radio'>
                        <input class='carousel__activator' id='carousel-slide-activator-2' name='carousel' type='radio'>
                        <input class='carousel__activator' id='carousel-slide-activator-3' name='carousel' type='radio'>
                        <div class='carousel__controls'>
                            <label class='carousel__control carousel__control--forward'
                                for='carousel-slide-activator-2'>
                                >
                            </label>
                        </div>
                        <div class='carousel__controls'>
                            <label class='carousel__control carousel__control--backward'
                                for='carousel-slide-activator-1'>
                                < </label>
                                    <label class='carousel__control carousel__control--forward'
                                        for='carousel-slide-activator-3'>
                                        >
                                    </label>
                        </div>
                        <div class='carousel__controls'>
                            <label class='carousel__control carousel__control--backward'
                                for='carousel-slide-activator-2'> <
                                 </label>
                        </div>
                        <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 2");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                        <div class='carousel__screen'>
                            <div class='carousel__track'>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
	                                    <img class='demo-content' src="img/1.jpg" alt="img1"/>
	                                    <h5><?php echo $data['title']?></h5>
	                                    <h6 class="genre"><?php echo $data['genre']?></h6>
                                    <?php } ?>
                               	 	</div>
                                </div>
                          <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 3");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
	                                    <img class='demo-content' src="img/2.jpg" alt="img2">

	                                    <h5><?php echo $data['title']?></h5>
	                                    <h6><?php echo $data['genre']?></h6>
                                	</div>
                                <?php } ?>
                                </div>
                          <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 4");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
	                                    <img class='demo-content' src="img/3.jpeg" alt="img3">
	                                    <h5><?php echo $data['title']?></h5>
	                                    <h6><?php echo $data['genre']?></h6>
                                	</div>
                                <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 5");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
	                                    <img class='demo-content' src="img/4.jpeg" alt="img4">
	                                    <h5><?php echo $data['title']?></h5>
		                                <h6><?php echo $data['genre']?></h6>
                                	</div>
                                <?php } ?>
                                	</div>
                                  <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 6");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
	                                    <img class='demo-content' src="img/5.jpeg" alt="img5">
	                                    <h5>GREENLAND</h5>
		                                <h6>Action/Disaster</h6>
                                	</div>
                                <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 7");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
                                    <img class='demo-content' src="img/6.jpg" alt="img6">
                                    <h5><?php echo $data['title']?></h5>
	                                <h6><?php echo $data['genre']?></h6>
                                	</div>
                                <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 8");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
                                    <img class='demo-content' src="img/7.jpg" alt="img7">
                                    <h5><?php echo $data['title']?></h5>
	                                <h6><?php echo $data['genre']?></h6>
                                </div>
                              <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 9");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
                                    <img class='demo-content' src="img/8.jpg" alt="img8">
                                    <h5><?php echo $data['title']?></h5>
	                                <h6><?php echo $data['genre']?></h6>
                                </div>
                              <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 10");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
                                    <img class='demo-content' src="img/9.jpeg" alt="img9">
                                    <h5><?php echo $data['title']?></h5>
	                                <h6><?php echo $data['genre']?></h6>
                                </div>
                              <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 1");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
                                      <a href="selectedMoviePage.php">
	                                    <img class='demo-content' src="img/10.png" alt="img10">
                                       </a>
	                                    <h5><?php echo $data['title']?></h5>
	                                    <h6><?php echo $data['genre']?></h6>

                                </div>
                              <?php } ?>
                                </div>
                                <?php 
                              $rec = mysqli_query($db,"SELECT * FROM movie WHERE m_id = 11");
                                while($data = mysqli_fetch_array($rec)){
                                      ?>
                                <div
                                    class='carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-5'>
                                    <div class="carousel_inner">
	                                    <img class='demo-content' src="Movies/dreamgirls.jpg" alt="img10">
	                                    <h5><?php echo $data['title']?></h5>
	                                    <h6><?php echo $data['genre']?></h6>
                                </div>
                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


	<!-- trailer -->
	<div class="trailer-section" id="trailer">
		<h2>{{ Title }}</h2>
		<iframe src="https://www.youtube-nocookie.com/embed/XW2E2Fnh52w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
	</div>

<!-- Animation -->
<div class="Animation">
    <div class="marquee">
	 <!-- <div class="item"> -->

	 	<h3>Premiere</h3>
        <ul class="marquee-content">
          <li><img src="black.jpg"></li>
          <li><img src="Movies/NoTimeToDie.jpeg"></li>
          <li><img src="assassin.jpg"></li>
          <li><img src="greenroomjpg.jpg"></li>
          <li><img src="Movies/FreeGuy.jpeg"></li>
          <li><img src="Movies/Wonder_Woman_1984.png"></li>
          <li><img src="batman.jpg"></li>
          <li><img src="ironman.jpg"></li>
          <li><img src="Movies/promisingyoungwoman.jpg"></li>
          <li><img src="insidious.jpg"></li>
          <li><img src="clean.jpg"></li>
          <li><img src="batman.jpg"></li>
        </ul>
      </div>
</div>

    <!-- Upcoming Movie -->
 <div class="container">
<!--   <h2 id="upcoming-movies1">UPCOMING MOVIES</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel"> -->

    <h2 id="upcoming-movies1">UPCOMING MOVIES</h2>
  <div id="myCarousel" class="carousel-slide" data-ride="carousel">
  
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="upcoming_movies/blackwidow.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>BLACK WIDOW</h3>
          <p>Marvels highlight is astonishing</p>
        </div>
      </div>

      <div class="item">
        <img src="upcoming_movies/fastandfurious.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>FAST AND FURIOUS</h3>
          <p>One more</p>
        </div>
      </div>
    
      <div class="item">
        <img src="upcoming_movies/Ghostbusters.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>GHOST BUSTERS</h3>
          <p>I am waiting for you!</p>
        </div>
      </div>

        <div class="item">
        <img src="upcoming_movies/spiderman3.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Spiderman 3</h3>
          <p>Let me show you how the boss does it</p>
        </div>
      </div>

        <div class="item">
        <img src="upcoming_movies/kingsman.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>kingsman</h3>
          <p>Only one king</p>
        </div>
      </div>

       <div class="item">
        <img src="upcoming_movies/GodzillaVsKong.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>GODZILLA VS KONG</h3>
          <p>We are still here</p>
        </div>
      </div>

       <div class="item">
        <img src="upcoming_movies/venom2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Venom 2</h3>
          <p>It is not leaving me</p>
        </div>
      </div>

       <div class="item">
        <img src="upcoming_movies/BossBaby.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Baby Boss 2</h3>
          <p>I am the only baby</p>
        </div>
      </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>

<div class="google-maps">
 <script type="text/javascript" src="scripts/map.js"></script>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</div>

 
	
	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="main.js"></script>
    <script>
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }


	// Animatation
		const root = document.documentElement;
		const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
		const marqueeContent = document.querySelector("ul.marquee-content");

		root.style.setProperty("--marquee-elements", marqueeContent.children.length);

		for(let i=0; i<marqueeElementsDisplayed; i++) {
  			marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
		}

		function darkMode(){
			var ele = document.body;
			ele.classList.toggle("dark-mode");
		}
    </script>

</body>
<!-- Footer -->
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