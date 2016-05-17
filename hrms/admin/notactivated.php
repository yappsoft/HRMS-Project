<!DOCTYPE html>
<?php 
include '../dbcon.php';
if(isset($_SESSION['email'])){
if($_SESSION['status']!='inactive'){
	
	header('location:index.php');
}
}else{
header('location:index.php');
}
?>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	   <script src="../js/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>HRMS </title>
    <link rel="stylesheet" href="../js/animate.css" media="screen" charset="utf-8">
      <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" charset="utf-8">

    
        <link rel="stylesheet" href="../css/index.css" media="screen" charset="utf-8">
			
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
                <!--chart for free and paid users-->
                <script src="../js/amcharts.js"></script>
                <script src="../js/pie.js"></script>
                <script src="../js/light.js"></script>
               <script src="../js/calendar.js"></script>
<!--end of chart-->
                <style type="text/css">
				body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;

}
 ul >a li {
    color: #a0abbf;
    width: 208px;
    height: 40px;
    padding: 11px 0 0 0px;
    border: 0px;
    margin: 0 0 8px 0px;
    border-left: 4px solid transparent;
}
nav>ul >a{
  border-left: 12px solid transparent;
}
 nav>ul >a:hover {
    color: #fff !important;
		background: #2C3543;
       border-left: 12px solid #8cc63e;;
}
nav>ul >a:hover li{    color: #fff !important;}
ul li{list-style:none;}
                    .alertpf{
                        height:511px;
                        overflow-y: auto;
                        overflow-x: hidden;
                        
                    }
                    #chartdiv {
	               width: 100%;
	               height: 200px;
	              font-size	: 8px;
                      padding: 20px;
                      padding-top: 20px !important;
                       
                   }
                   .pointer{
                       cursor: pointer;
                   }
                </style>
<style> 
.monthPre{
 color: gray;
 text-align: center;
}
.monthNow{
 color: blue;
 text-align: center;
}
.dayNow{
 border: 2px solid green;
 color: #FF0000;
 text-align: center;
}
.calendar td{
 htmlContent: 2px;
 width: 80px;
}
.monthNow th{
 background-color: #8CC63E;
 color: #FFFFFF;
 text-align: center;
}
.dayNames{
 background: #354052;
 color: #FFFFFF;;
 text-align: center;
}
 
</style> 
   </head>
  
  	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7%;border-top:1px solid #2C3543">
			
			<ul style="margin-left:-20%;margin-top:39px">
<a  href="javascript:void(0)"><li class="dashboard"><label><img alt="" class="sidenavicons" src="../images/dashboard.png"></label>Dashboard</li></a>
<a href="javascript:void(0)">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>Employe Management</li></a>
<a  href="javascript:void(0)">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/iac.png"></label>Leave Management</li></a>
<a  href="javascript:void(0)">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/energyanalysis.png"></label>Holiday Management</li></a>
<a  href="javascript:void(0)">  <li class="costanalysis"><label><img  class="sidenavicons" src="../images/costanalysis.png"></label>Accounts & Billing</li></a>
</ul>
			
		</nav>
  <body cz-shortcut-listen="true" class="cbp-spmenu-push" onload="displayCalendar()">
  
<main class="maindiv">
 <div class="header navbar-fixed-top">
  <ul class="logocontainer">
    <li><img  alt="" id="showLeftPush"class="menuLogo" src="../images/menuicon.png"></li>
   
    <li><img class="dashboardlogo" src="../images/dashboardlogo.png"/></li>
  </ul>
<ul class="management_navigation_holder">
  
  <li class="nav_item"><a href="javascript:void(0)"><button type="button" onclick='logout()' class="navbtn" name="button">Log out</button></a></li>
</ul>
</div>
</main>

<div class="account-activation">
  <div class="container text-center">

    <img src="../images/ico_detail.png" alt="">

    <h2>
      Thank you for creating an account with us!    </h2>

    <p>
      Your account is currently idling on the runway waiting for takeoff.    </p>

	  <?php if(isset($_GET['notactive'])){?>
		  
    <p class="info-block">
      <img src="..	/images/ico_detail.png" alt="">
      Please check your inbox for an email from HRMS and click on the activation link to verify your email address.    </p>

    <div>
      <a href="" class="btn btn-lg btn-primary btn-orange" id="">
       
        Resend activation e-mail      </a>
    </div>
	  <?php } else {?>
<p class="info-block">
      <img src="..	/images/ico_detail.png" alt="">
        Your account is currently in review, please wait some time we touch soon Thank you.     </p>

    <div>
	  <?php }?>
  </div>
</div>
		
		
		
   <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>


</body>
</html>
	<script src="../js/classie.js"></script>
		<script>
		
		$().ready(function(){
		$(".maindiv").click(function(){
		//alert();
		//$('.cbp-spmenu').removeClass('cbp-spmenu-open');
		});
		});
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				menuRight = document.getElementById( 'cbp-spmenu-s2' ),
				menuTop = document.getElementById( 'cbp-spmenu-s3' ),
				menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
				showLeft = document.getElementById( 'showLeft' ),
				showRight = document.getElementById( 'showRight' ),
				showTop = document.getElementById( 'showTop' ),
				showBottom = document.getElementById( 'showBottom' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				showRightPush = document.getElementById( 'showRightPush' ),
				body = document.body;

			
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
		

			function disableOther( button ) {
				
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
				
			}
		</script>
  <script>
  var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "24 Paid Account",
    "value": 24
  }, {
    "title": "10 Free Account",
    "value": 10
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "50%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
</script>
<script>
	  function logout(){
		  window.location.href="../logout.php";
	  }
	  <!-- jquery for fixed the div when open menu -->
	  $().ready(function(){
	  $('.menuLogo ').click(function(){
	  $("#acc-div").toggleClass('fixed-right');
	  });
	  });
	  </script>
	  
	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }
	  .account-activation {
    margin-bottom: 115px;
    margin-top: 115px;
	    font-family: "Roboto";
    font-weight: 400;
    padding: 0;
}

	  </style>
                
