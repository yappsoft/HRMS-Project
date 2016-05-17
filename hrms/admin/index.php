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
		 <!--include calendar css-->
               <link href="../css/datepicker.min.css" rel="stylesheet" type="text/css">	
               
               
               
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
                <!--chart for free and paid users-->
                <script src="../js/amcharts.js"></script>
                <script src="../js/pie.js"></script>
                <script src="../js/light.js"></script>
             
              
		<script src="../js/datepicker.min.js"></script>
                
		<!-- Include English language -->
		<script src="../js/datepicker.en.js"></script>
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

   </head>
     <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left cbp-spmenu-open" id="cbp-spmenu-s1">
		<ul style="margin-top:63px">
		<li class="dropdown navbar-user open user_profile" id="userOptionsDropdown" align="center">
						
							<img src="../images/deflt.gif" class="img-circle"alt="" width="60" height="60"> 
							<label class="user_msg">Welcome,</label>
							<label class="user_name"><?php echo $_SESSION['username'];?></span></label>
									
						</button>
					
					</li>
		</ul>
    
      <ul style="margin-left:-20%;margin-top:21px;background:#354052;height:100%">
        <a  href="index.php" class="current"><li class="dashboard"><label><img alt="" class="sidenavicons" src="../images/dashboard.png"></label>Dashboard</li></a>
<a  href="employee_management.php">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/iac.png"></label>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/energyanalysis.png"></label>Holiday Management</li></a>
<a  href="accounts_billing.php">  <li class="costanalysis"><label><img  class="sidenavicons" src="../images/costanalysis.png"></label>Accounts & Billing</li></a>
        </ul>

    </nav>
    <body cz-shortcut-listen="true" class="cbp-spmenu-push cbp-spmenu-push-toright">
  
<main class="maindiv">
 <div class="header navbar-fixed-top">
  <ul class="logocontainer">
   
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
                                            0/<?php echo $row;?>
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
         </div>
            
             <div class="datepicker-here" data-language="en" inline="true"  style="background-color:#354052 ; color: #fff"></div> 
            
          </div>
           <!---- third grid for calendar -->
		  <!---- end pennding div -->
	  
          
    </div>
	<div class="col-md-12 col-lg-12 col-sm-12 ">
      <!-- first grid starts -->
      <!-- start upcoming birthday here-->
      <div class="row">
      <div class="col-md-4 col-lg-4 col-sm-4 gridview alertpf pointer">
          <div class="col-sm-12 col-md-12 col-lg-12" style="height: 240px;">
              <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header"  >
                  <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/calendar.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Upcoming Birthday</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden"></div>
       </div>
         <?php 
         $rs=0;
            if ($rs==1)
            {
          ?>
             <!-- out for loop here for alarm notification -->
             <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"></div>
            <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 " ><span class="textbold">Yogendra chouhan</span><br>
                    <span class="textnormal"> Birthday on  26/05/2016</span>..
              </div>
            
           </div>
           <?php 
            } else {?>
             
             <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                 <?php echo "No  birthday in this month";?></div>
           <?php
     } ?>
      </div>
      
        
       <!-- end upcoming birthday here-->
         <!-- start upcoming holidays here-->
         <div class="col-sm-12 col-md-12 col-lg-12" style="height:250px;">
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
            <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding " style="height:250px;">Upcoming Holiday</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>
          <?php 
         
          $sel = "SELECT * FROM holiday_tbl where company_id='$unique_id' and holiday_date > DATE_FORMAT(CURDATE(),'%m-%d-%Y')";
          $query = mysqli_query($con, $sel);
          $test= mysqli_num_rows($query);
          if($test)
          {
          while($row = mysqli_fetch_array($query))
                  // backend script for upcoming holidays
          {
           ?>
          
         <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
             <div class="col-sm-1 col-md-1 col-lg-1"></div>
             <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" ></div>
               <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 "><span class="textbold"><?php echo $row['holiday_name']?></span><br>
                     <span class="textnormal">on <?php echo $row['holiday_date']." ".$row['holiday_days'] ?></span>..
               </div>
            </div>
          <?php }}
                 else {
                  ?> <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                 <?php echo "No holiday in this month";?></div>
                     
                     <?php  }
                 ?>
          </div>  
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
          $('.my-datepicker').datepicker({
	language: 'my-lang'
})
	  </script>
         
	 
	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }
	  </style>
                
