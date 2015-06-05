<?php 
error_reporting(E_ALL);

session_start();

require_once 'helpers/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
$result = isset($_SESSION['result']) ? $_SESSION['result'] : [];
        
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Express Your Interest | Foroige</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

    <!-- Video Section -->
    <div id="home">
      <section id="home-sec" class="player .overlay" data-property="{videoURL:'AtmRGDjEUk0',containment:'self', showControls:false, autoPlay:true, loop:true, vol:50, mute:true, startAt:0, opacity:1, addRaster:true, quality:'default', optimizeDisplay:true}">
           <!-- change Ycv5fNd4AeM to your youtube url-->
              <div class="overlay">
                 <div class="container">
                    <div class="row text-center">
                        <div class="col-md-6 col-md-offset-3">
                          <h1>Express your interest!</h1> 
                              <h3>Volunteer as a Big Brother or Big Sister to a young person who needs it.</h3>
                              <br>
                              <a href="#register"><button  type="button" class="btn btn-primary btn-lg btn-block"><h2>Click me to volunteer!</h2></button></a>
                        </div>
                    </div>
                  </div>
             </div>
              
      </section>
    </div>
     
    <!--Video END-->


    <!-- Form Section -->

    <div id="register" class="jumbotron">
      <div class="container">

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <img src="img/bbbs.png" class="img-responsive" alt="logo"/>
          </div>

        </div>

        <hr>
        <h3 class="text-center">
          Volunteer as a Big Brother or Big Sister to a young person who needs it.
        </h3>
        <hr>
        <h4 class="text-center">#bigbrotherbigsister #anhouraweek</h4>

        <hr>

           <form name="form" action="register.php" role="form" method="POST">
                  <div class="form-group col-md-3"> 
                      <input type="text" id="element-1" name="name" class="form-control" placeholder="Enter Name"  <?php echo isset($fields['name']) ? ' value="' . e($fields['name']) . '"' : '' ?> required/>
                  </div>
                  <div class="form-group col-md-3">
                      <input type="email" id="element-2" name="email" class="form-control col-md" placeholder="Enter Email" <?php echo isset($fields['email']) ? ' value="' . e($fields['email']) . '"' : '' ?> required/>
                  </div>
                  <div class="form-group col-md-3">
                      <input type="tel" id="element-3" name="tel" class="form-control" placeholder="Enter phone number" <?php echo isset($fields['tel']) ? ' value="' . e($fields['tel']) . '"' : '' ?> required/>
                  </div>
                <div class="form-group">
                  <div class="dropdown col-md-3">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="true" required>
                      Select County
                      <span class="caret" name="county" required> </span>
                      </button>
                        <ul class="dropdown-menu scrollable-menu" role="menu" aria-labelledby="dropdownMenu" required>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Antrim</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Armagh</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Carlow</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Cavan</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Clare</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Cork</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Derry</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Donegal</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Down</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Dublin</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Fermanagh</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Galway</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Kerry</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Kildare</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Kilkenny</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Laois</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Leitrim</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Limerick</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Longford</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Louth</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Mayo</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Meath</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Monaghan</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Offaly</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Roscommon</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Sligo</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Tipperary</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Tyrone</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Waterford</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Westmeath</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Wexford</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Co Wicklow</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 1</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 2</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 3</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 4</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 5</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 6</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 6W</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 7</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 8</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 9</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 10</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 11</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 12</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 13</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 14</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 15</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 16</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 17</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 18</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 19</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 20</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 21</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 22</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 23</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1">Dublin 24</a></li>
                        </ul>
                  </div>
                </div>

                  <hr>
                  <hr>
                  <hr>  
                   <div class="form-group">
                       <div class="row center-block">
                            <div class="col-sm-5 col-sm-offset-5">
                            <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Register now!</button>
                            </div>
                            
                        </div>
                   <br>
                   <br>
                    <?php if(!empty($errors)): ?>
                    <div class="form-group">
                        <div class="row center-block">
                            <div class="col-sm-5 col-sm-offset-4">
                                  <div class="alert alert-danger"><?php echo implode(', ', $errors); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                  
                  </div>  
           </form>
          <hr>
          <hr>
          <h4 class="text-center">
            The Big Brother Big Sister programme is operated in Ireland by Foróige,
            the National Youth Development Organisation.
          </h4>
      
      </div>
    </div>


    <!-- END of form section -->

    <!-- Sponsor section -->

      
      <div class="container">

      <h3 class="text-center">Our Testimonals</h3>
      <hr>

        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="caption">
                  <h3>Big Brother, Galway</h3>
                  <p class="text-justify">"I have a strong belief that young people need alternatives to what is available nowadays.... 
                  the Big Brother Big Sister Programme is a nice alternative, and it is a way for me to contribute to that, so rather than just saying it, it's a matter of doing it!"</p>

            </div>
          </div>
        <div class="col-sm-3 col-md-3">
          
          <div class="caption">
                <h3>Little Sister, Donegal</h3>
                <p class="text-justify">"My Little Sister and I have done lots of fun things together and each week I look forward to meeting her. She is a delight to be with and we always have a laugh. 
                Last week we chased the sunset until we got to a place where we could watch the sun sink into the sea! It's not everyone you could do that with, is it?”</p>
            </div>
          
        </div>
        <div class="col-sm-3 col-md-3">
         
            <div class="caption">
                <h3>Little Sister, Dublin</h3>
                <p class="text-justify">“I have got more confident and can be myself around people. Thank you for your help, you’ve made a difference.” </p>
            </div>
          
        </div>
        <div class="col-sm-3 col-md-3">
         
            <div class="caption">
                <h3>Little Brother, Sligo</h3>
                <p class="text-justify">“To have a friend for life, that gave me the confidence to stand up and sing in front of a crowd.”</p>
            </div>
        </div>
      </div>

      </div>

      <br>
      <br>



    <!-- End of Sponsor section -->
    <footer>
      <div class="alt2">
        <div class="container">
        <div class="row row-centered">
        <br>
        <br>
          <footer class="text-center">
            &copy; Foroige<br />
            <br>
            <a href="#home">
              <button type="button" class="btn btn-primary btn-md">
              <span class="glyphicon glyphicon-circle-arrow-up"></span> Back to top
            </button>
            </a>
            <a href="http://www.foroige.ie" target="_blank">
              <button type="button" class="btn btn-primary btn-md">
                <span class="glyphicon glyphicon-circle-arrow-right"></span> Main Website
              </button>
            </a>
          </footer>

          <br>
          

            <h3 class="text-center">Keep Updated On Social Media!</h3>
            <br>
            
            <div class="col-sm-3 col-md-3">
              <div class="thumbnail">
                <a href="https://www.facebook.com/foroige" target="_blank"><img src="img/social/fb.png" alt="facebook"/></a>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="thumbnail">
                <a href="https://twitter.com/foroige" target="_blank"><img src="img/social/tw.png" alt="twitter"/></a>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="thumbnail">
                <a href="https://www.youtube.com/user/ForoigeChannel" target="_blank"><img src="img/social/yt.png" alt="youtube"/></a>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="thumbnail">
                <a href="https://instagram.com/foroige/" target="_blank"><img src="img/social/insta.png" alt="instagram"/></a>
              </div>
            </div>

          </div>
          <br>
          <br>
        </div>
      </div>
    </footer>

  
    




    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
     <!-- EASING SCROLL SCRIPTS PLUGIN  -->
    <script src="js/jquery.easing.min.js"></script>
     <!-- VEDIO SCRIPT SCRIPTS  -->
    <script src="js/jquery.mb.YTPlayer.js"></script>
     <!-- PRETTY PHOTO SCRIPTS  -->
    <script src="js/jquery.prettyPhoto.js"></script>
     <!-- PORTFOLIO FILTER SCRIPTS  -->
    <script src="js/jquery.mixitup.min.js"></script>
     <!--SCRIPT FOR NICE LOOKING SCROLLBAR  -->
    <script src="js/jquery.nicescroll.min.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="js/custom.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/html5shiv.min.js"></script>
    <!-- Form Validation -->
    <script src="http://code.angularjs.org/1.2.5/angular.js" data-semver="1.2.5" data-require="angular.js@1.2.5"></script>
    <script src="js/showErrors.js"></script>
    

  <script>
          $(function() {
          $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });

          $(".dropdown-menu li a").click(function(){
            var selText = $(this).text();
            $(this).parents('.dropdown').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
          });
  </script>
    
</body>
</html>

<?php 
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>
