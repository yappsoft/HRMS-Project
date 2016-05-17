<!DOCTYPE html>
<?php 
include '../dbcon.php';

if(isset($_SESSION['email'])){
	$unique_id = $_SESSION['company_id'];	
	if(isset($_SESSION['status'])){
		
		if($_SESSION['status'] == 'inactive'){
			
			header('location:notactivated.php');
		}
	
	}
//query for check status 
	$query  = mysqli_query($con,"select * from companyreg_tbl where company_id ='$unique_id' limit 1");
	if($query){
		$row = mysqli_fetch_array($query);
		$check_status = $row['is_email_var'];
		if($check_status == 'inactive'){
				header('location:notactivated.php?notactive');
			
		}
		
	}

	
}else{
	header('location:../index.html');
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
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="screen" charset="utf-8">
    
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
    padding: 11px 0 0 13px;
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
<a  href="index.php"><li class="dashboard"><span><img alt="" class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
<a  href="employee_management.php">  <li class="tenanticon"><span><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></span>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/iac.png"></span>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/energyanalysis.png"></span>Holiday Management</li></a>
<a  href="accounts_billing.html">  <li class="costanalysis"><span><img  class="sidenavicons" src="../images/costanalysis.png"></span>Accounts & Billing</li></a>
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
  
  <li class="nav_item"><a href ="../logout.php"><button type="button" class="navbtn" name="button">Log out</button></a></li>
</ul>
</div>
</main>

<!---- side nav bar --->


		<!--- nav bar end -->

<div class="container-fluid dashboardContainer ">
<div class="container-fluid dashboardContentHolder">
  <div class="row dashboardgrid">
<div class="col-md-12 col-lg-12 col-sm-12 ">
      <!-- first grid for total Employs starts -->
	  
	  
      <div class="col-md-4 col-lg-4 col-sm-4 gridview">
      <div class="dashboardHeader">
        <p class="dashboardHeading">Total Employee</p>
        <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3 class="count">
                                            <h3 class="count" style="font-size: 75px;">
                                            <?php

                                            $sel = "SELECT * FROM employee_tbl where company_id='$unique_id'";
                                            $query = mysqli_query($con, $sel);
                                            $row = mysqli_num_rows($query);

                                            echo "$row";
                                            ?>
                                        </h3>
                                        </h3>

                                        <p>Total Employee Register TIll Now</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-person-stalker"></i>
                                    </div>
            <a href="employee_management.php" class="small-box-footer">More info <i class="ion ion-arrow-right-c"></i></a>
                                </div>
      </div>
    

         
      </div>
   
      <!-- first grid ends -->
      <!-- second grid start for todays attendance -->
      <div class="col-md-4 col-lg-4 col-sm-4 gridview">
        <div class="dashboardHeader">
          <p class="dashboardHeading">Today's Attendance</p>
          <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3 class="count" style="font-size: 75px;">
                                            3/<?php echo $row;?>
                                        </h3>

                                        <p>Today's Attendance </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-checkmark-round"></i>
                                    </div>
                                    <a href="user_request.php" class="small-box-footer">More info <i class="ion ion-arrow-right-c"></i></a>
                                </div>
        </div>
          </div>
      <!-- second grid ends -->
	  
	  <!---- third grid for calendar -->
	  <div class="col-md-4 col-lg-4 col-sm-4 gridview">
        <div class="dashboardHeader">
          <p class="dashboardHeading">Calendar</p>
          
          
          <ul class="dashboardList">
         
          
          </ul>
        </div>
              <div id="calendar" style="padding-left: 2px;padding-right: 2px; width: 100%;"></div>
          </div>
           <!---- third grid for calendar -->
		  <!---- end pennding div -->
	  
          
    </div>
	<div class="col-md-12 col-lg-12 col-sm-12 ">
      <!-- first grid starts -->
      <!-- start upcoming birthday here-->
      <div class="row">
      <div class="col-md-4 col-lg-4 col-sm-4 gridview alertpf pointer">
    <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/birthday.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Upcoming Birthday</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden"></div>
      </div>
          <?php 
      $sel ="   SELECT
 
    date_of_birth,
    date_of_birth + INTERVAL(YEAR(CURRENT_TIMESTAMP) - YEAR(date_of_birth)) + 0 YEAR AS currbirthday,
    date_of_birth + INTERVAL(YEAR(CURRENT_TIMESTAMP) - YEAR(date_of_birth)) + 1 YEAR AS nextbirthday
FROM employee_tbl
ORDER BY CASE
    WHEN currbirthday >= CURRENT_TIMESTAMP THEN currbirthday
    ELSE nextbirthday
END ";

          ?>
             <!-- out for loop here for alarm notification -->
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/birthdays.png" height="12px" alt="" ></div>
            <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 " ><span class="textbold"><?php echo $row['first_name']." ".$row['last_name'];?></span><br>
                    <span class="textnormal"> <?php echo $a;?></span>..
              </div>
            
           </div>
           <?php 
                    ?>
       <!-- end upcoming birthday here-->
         <!-- start upcoming holidays here-->
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
            <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding ">Upcoming Holiday</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>
          <?php 
         
          $sel = "SELECT * FROM holiday_tbl where company_id='$unique_id' and holiday_date > DATE_FORMAT(CURDATE(),'%m-%d-%Y')";
          $query = mysqli_query($con, $sel);
          while($row = mysqli_fetch_array($query))            // backend script for upcoming holidays
          {
           ?>
          
         <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
             <div class="col-sm-1 col-md-1 col-lg-1"></div>
             <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" ></div>
               <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 "><span class="textbold"><?php echo $row['holiday_name']?></span><br>
                     <span class="textnormal">on <?php echo $row['holiday_date']." ".$row['holiday_days'] ?></span>..
               </div>
            </div>
          <?php }?>
            
      </div>
   
      <!-- first grid ends -->
      <!-- second grid start for alerts -->
      <div class="col-md-4 col-lg-4 col-sm-4 gridview alertpf pointer">
        <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Alerts</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>


          <!-- out for loop here for alarm notification -->
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
              <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">User Update</span><br>
                    <span class="textnormal">a demo user send request for account approval</span>..
              </div>
           </div>
           <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
             <div class="col-sm-1 col-md-1 col-lg-1"></div>
             <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/green-dot.png"></div>
               <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Request for demo</span><br>
                     <span class="textnormal">a loren company request for register </span>..
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
              <div class="col-sm-1 col-md-1 col-lg-1"></div>
              <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/green-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Payment renew</span><br>
                      <span class="textnormal">a company renew payment at 5th may</span>..
                </div>
             </div>
           <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
              <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">User Update</span><br>
                    <span class="textnormal">a demo user send request for account approval</span>..
              </div>
           </div>
           <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
             <div class="col-sm-1 col-md-1 col-lg-1"></div>
             <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/green-dot.png"></div>
               <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Request for demo</span><br>
                     <span class="textnormal">a loren company request for register </span>..
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
              <div class="col-sm-1 col-md-1 col-lg-1"></div>
              <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/green-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Payment renew</span><br>
                      <span class="textnormal">a company renew payment at 5th may</span>..
                </div>
             </div>
          
           
          <!-- out for loop here for alarm notification -->
        
        

          </div>
      
       <!--quick links gride start here-->
        <div class="col-md-4 col-lg-4 col-sm-4  " style="padding-right:0px;">
       <div class="quick-links  col-md-12 col-lg-12 col-sm-12 ">
        <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
       <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding "><img height="22px"src="../images/energyanalysis.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Quick Links</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>
           <div class=" col-sm-12 col-md-12 col-lg-12 quicklinksContent overflow" style="background:#fff;overflow: auto; height: 470px;">
          <ul class="quicklinkslist">
              <a href="add_employee.php"><li class="quicklinksitems"><img src="../images/ati.png"/> &nbsp;&nbsp;&nbsp;Add Employee</li></a>
              <a href="employee_management.php"><li class="quicklinksitems"> <img src="../images/upi.png"/> &nbsp;&nbsp;&nbsp;View Employee</li></a>
            <a href="account.php"><li class="quicklinksitems"><img src="../images/upi.png"/> &nbsp;&nbsp;&nbsp;Account Details</li></a>
          </ul>
      </div>
      </div>
        </div>   <!--../images/upi.png-->
      </div>
      </div>
     
	  <!----quick links gride end here -->

		  <!---- end pennding div -->
	  
	
	  
    
		<div class="col-md-12 col-lg-12 col-sm-12 ">
		
			  <!--- msg div strat -->
	  
	  
	  <!--msg div end -->
	  <!---- alert start -->
		
	  <!--- calnder div-->
	  	
         
	  <!--- calnder div end-->
	  
		
		</div>
	
</div>
</div></div>
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
	  </style>
                
