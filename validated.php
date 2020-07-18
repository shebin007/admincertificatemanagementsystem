<?php  
//login_success.php  
session_start();  
if(!isset($_SESSION["username"]))  
{  
	header("location:login.php");  
}  
 require_once "conn.php";

?>  
<!DOCTYPE HTML>
<html>
<head>
<title>Award Badging System </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
    
<!--geo chart-->

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
							    <h4>Award Badging System  </h4>
														
							</div>
							<!--search-box-->
								
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="p1.png" alt=""> </span> 
												<div class="user-name">
													<p>Group</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											
											<li> <a href="uslogout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->

<H1 style="text-align: center;" >Certificate Validation</H1>
<hr>





 <?php
 $val = $_GET['hash'];

      $query = "SELECT * FROM certificate WHERE hash = :hash";  
      $statement = $db->prepare($query); 
      $statement->execute(  
        array(  
          'hash'     =>   $val
        )  
      ); 
         
       $count = $statement->rowCount();   
         
       if($count > 0)  
                {
                  $row = $statement->fetch(PDO::FETCH_ASSOC);
                  echo "<div class='jumbotron' id='printableArea'>";
                  echo "<div style='border-style: solid;color:black;'>";
                  echo "<h1 class='display-4' style='text-align: center;color:black;'>Certificate </h1>";
                  echo "<h3 style='text-align: center;color:black;'>of</h3>";
                  echo "<h4 style='text-align:center;color:black;'>".$row['issued']."</h4>";
                  echo "<hr>";
                  echo "<h2 style='text-align:center;color:black;'>Awarded To</h3>";
                  echo "<h4 style='text-align:center;color:black;'>".$row['fname']."&nbsp;".$row['lname']."</h4>";
                  echo "<hr>";
                  echo "<h4 style='text-align:center;color:black;'>On ".date("d-m-y")."</h4>";
                  echo "<div class='row'>";
                  echo "<div class='col-md-6'>";
                  echo "<br><br><br><h5 style='color:black;'>ID :<a href='http://localhost/adminaward/validated.php?hash=".$val."&assign=' style='color:black;' >".$row['hash']."</a></h5>";
                  echo "</div>";
                  echo "<div class='col-md-6'>";
                  echo "certificate is validated by blockchain";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";

                  

                }  
        else {
          echo "<div class='jumbotron' id='printableArea'>";
                  echo "<div style='border-style: solid;color:black;'>";
                  echo "<h3  style='text-align: center;color:black;'>Certificate is Not validated by blockchain </h3>";
                  echo "</div>";
                  echo "</div>";

                
        }


 

?>

  <a href="validate.php" class="btn btn-primary" >Return</a>










</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
<p>© 2020 KP INVENTORY MANAGEMENT SYSTEM. All Rights Reserved | Design by  <a href="http://shebinkp.co.in/" target="_blank">Shebin KP</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu  " style ="bgcolor:black;">
		  	<div class="logo"> <a href="#   " class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		      <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Generate Certificate</span></a></li>
				<li id="menu-home" ><a href="validate.php"><i class="fa fa-bitbucket "></i><span>Validate Certificate</span></a></li>
				
				
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
    var toggle = true;
                
    $(".sidebar-icon").click(function() {                
      if (toggle)
      {
        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
        $("#menu span").css({"position":"absolute"});
      }
      else
      {
        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
        setTimeout(function() {
          $("#menu span").css({"position":"relative"});
        }, 400);
      }               
                    toggle = !toggle;
                });
    </script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     