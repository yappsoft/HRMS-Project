<!DOCTYPE html>
<?php 
include '../dbcon.php';
if(isset($_SESSION['email'])){
	$emp_id = $_SESSION['login_emp_id'];
	$com_id = $_SESSION['company_id'];
	
	$sel = mysqli_query($con,"select * from `employee_tbl` where employee_id ='$emp_id' limit 1");
	if($sel){
		$r = mysqli_fetch_assoc($sel);
	
		
	}
	

	
}else{
	
	header('../index.html');
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
      <!--include calendar css-->
               <link href="../css/datepicker.min.css" rel="stylesheet" type="text/css">	
    
        <link rel="stylesheet" href="../css/index.css" media="screen" charset="utf-8">
			
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
                <!--chart for free and paid users-->
                <script src="../js/amcharts.js"></script>
                <script src="../js/pie.js"></script>
                <script src="../js/light.js"></script>
                <!--script for calender-->
		<script src="../js/datepicker.min.js"></script>
                
		<!-- Include English language -->
		<script src="../js/datepicker.en.js"></script>
<!--end of chart-->
                <style type="text/css">
				.alert{color:#fff}
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
                        height:330px;
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

.dialog__content {


    padding: 4em;
    text-align: center;

}
 .dialog h2 {
    margin: 0;
    font-weight: 400;
    font-size: 2em;
    padding: 0 0 0em;
    margin: 0;
	    color: #8cc63e;
    font-weight: 400;

    font-family: 'Raleway', Arial, sans-serif;
}
.dialog h3{
	font-size:1.2em;
}.dialog h4{
	font-size:12px;color:#354052;
	font-weight:bold;
}
</style> 
<script type="text/javascript">

<!-- Put the following code in your JS file or Head Tags ---->
<!--

function DisplayTime(){
if (!document.all && !document.getElementById)
return
timeElement=document.getElementById? document.getElementById("curTime"): document.all.tick2
var CurrentDate=new Date()
var hours=CurrentDate.getHours()
var minutes=CurrentDate.getMinutes()
var seconds=CurrentDate.getSeconds()
var DayNight="PM"
if (hours<12) DayNight="AM";
if (hours>12) hours=hours-12;
if (hours==0) hours=12;
if (minutes<=9) minutes="0"+minutes;
if (seconds<=9) seconds="0"+seconds;
var currentTime=hours+":"+minutes+":"+seconds+" "+DayNight;
timeElement.innerHTML="<font style='font-family:verdana, arial,tahoma;font-size:12px;color:#354052; font-weight:bold;'>"+currentTime+"</b>"
setTimeout("DisplayTime()",1000)
}
window.onload=DisplayTime
</script>

   </head>
   <script type="text/javascript">
   var emp_ida = '<?php echo $emp_id?>';
  $.ajax({
                         type: 'POST',
                         url: 'add_attdb.php',
                         data: 'em_id=' + emp_ida +'&status='+'check',
                         success: function(responce){
							 	var fullDate = new Date()
                               var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
                               var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
                                console.log(currentDate);
							 if(responce !=currentDate ){
								        $('#myModal1').modal({
                                       backdrop: 'static',
                                    keyboard: false
                                     });
								 
							 }
                         
                        },
                     });
    $(window).load(function(){

 

    });
</script>
  <!-- attendece model start --->
  
  <div class="modal fade dialog__content" id="myModal"tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" style="width:350px;">
    <div class="modal-content">
      
      <div class="modal-body dialog" style="height:235px;">
	  <form id="attform" method="post">
	  <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $emp_id;?>" />
	  <input type="hidden" name="com_id" id="com_id"  value="<?php echo $com_id;?>"/>
     <h2  class="text-center"><strong>Welcome</strong></h2>
	
		 <h3>Kindly mark your today attendance </h3>
		 <h4> <span><?php echo date("l d-m-Y");?></span> <span id=curTime> </span></h4>
		 <br>
	   <button   type="button"onclick="submitAtt()"class="col-md-12 btn btn-lg btn-primary btn-orange" id="submit_att">Submit
        </button>
		
		
		</form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  
  
  
  
  
  
  <!--- //end attende modal -->
  
  
  
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
        <a  href="emp_attendance.php">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>Attendance</li></a>
<a   href="javascript:void(0)">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/iac.png"></label>Leave Management</li></a>

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
	  
	  
      <div class="col-md-4 col-lg-4 col-sm-4  gridview">
      <div class="dashboardHeader">
        <p class="dashboardHeading">Total Attendance</p>
       
      </div>
    

         
      </div>
        <div class="col-md-4 col-lg-4 col-sm-4  gridview">
            <div class="dashboardHeader">
        <p class="dashboardHeading">Total Leave</p>
       
      </div>
    

         
      </div>
        <div class="col-md-4 col-lg-4 col-sm-4  gridview " style="height:260px;">
      <div class="dashboardHeader">
          <p class="dashboardHeading" >Calendar</p>
       
      </div>
     <div class="datepicker-here" data-language="en" inline="true"  ></div> 

         
      </div>
          </div>
      <!-- first grid ends -->
      
    <!--  second gride  -->
      
            
           
		  <!---- end second -->
	  
    </div>
	<div class="col-md-12 col-lg-12 col-sm-12 ">
      <!-- first grid starts -->
      <!-- start upcoming birthday here-->
      <div class="row">
          <div class="col-md-4 col-lg-4 col-sm-4 gridview  pointer" style="height:100%; margin-top: -50px; ">
          
          
          
          
          <div class="col-sm-12 col-md-12 col-lg-12 "style="height: 165px;" >
              <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header"  >
                  <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/calendar.png"/></div>
       <div class="col-sm-5 col-md-5 col-lg-5 text-center no-padding">Upcoming Birthday</div>
       <div class="col-sm-3 col-md-3 col-lg-3 text-right no-padding visibility-hidden"></div>
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
             
             <div class="col-sm-12 col-md-12 col-lg-12 text-center" style="padding-top:50px;">
                 <?php echo "No  birthday in this month";?></div>
           <?php
     } ?>
      </div>
          </div>
           
        
       <!-- end upcoming birthday here-->
        
      <!-- first grid ends -->
      <!-- second grid start for alerts -->
      <div class="row">
      <div class="col-md-4 col-lg-4 col-sm-4 gridview  pointer"style=" height:360px; margin-top: -50px; ">
        <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Alerts</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>

         <div class="col-sm-12 col-md-12 col-lg-12 " style="">
          <!-- out for loop here for alarm notification -->
          
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
          
         </div>
          <!-- out for loop here for alarm notification -->
        
        

          </div>
      
       <!--quick links gride start here-->
         <div class="col-md-4 col-lg-4 col-sm-4 gridview  pointer"style="height:311px;">
       <div class="quick-links  col-md-12 col-lg-12 col-sm-12 ">
        <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
       <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding "><img height="22px"src="../images/energyanalysis.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Quick Links</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>
           <div class=" col-sm-12 col-md-12 col-lg-12 quicklinksContent overflow" style="background:#fff;overflow: auto; height: 270px;">
          <ul class="quicklinkslist">
              <a href="#"><li class="quicklinksitems"><img src="../images/view.png" height="28px"/> &nbsp;&nbsp;&nbsp;View attendance</li></a>
              <a href="#"><li class="quicklinksitems"> &nbsp;<img src="../images/iac.png"/> &nbsp;&nbsp;&nbsp;&nbsp;Apply for leave</li></a>
            <a href="#"><li class="quicklinksitems"><img src="../images/upi.png"/> &nbsp;&nbsp;&nbsp;Account details</li></a>
          </ul>
      </div>
      </div>
        </div> 
       <!--../images/upi.png-->
        <div class="col-md-4 col-lg-4 col-sm-4  gridview fixed-left" style="margin-top: 130px; position: absolute;height: 180px;" >
         <div class="col-sm-12 col-md-12 col-lg-12 " >
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
            <div class="col-sm-5 col-md-5 col-lg-5 text-center no-padding " >Upcoming Holiday</div>
       <div class="col-sm-3 col-md-3 col-lg-3 text-right no-padding visibility-hidden">vijay</div>
      </div>
          <?php 
         
          $sel = "SELECT * FROM holiday_tbl where company_id='$com_id' and holiday_date > DATE_FORMAT(CURDATE(),'%m-%d-%Y')";
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
                  ?> <div class="col-sm-12 col-md-12 col-lg-12 text-center" style="padding-top: 50px;">
                 <?php echo "No holiday in this month";?></div>
                     
                     <?php  }
                 ?>
          </div>  
      
         </div>
        
        <!-- start upcoming holidays here-->
      </div>
      </div>
      </div>
     
	  <!----quick links gride end here -->


		  <!---- end pennding div -->
	  
	
	  
    
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
			
			     function  submitAtt() {
                      var datafrom = $('#attform').serialize();
					 // alert(datafrom);
                      $("#submit_att").text('');
                      $("#submit_att").css({'background': '#8cc63e', 'opacity': '.5'});
                      $("#submit_att").append("<img src='../images/loader.gif' />");
                      $.ajax({
                          method: "POST",
                          url: "add_attdb.php",
                          data: datafrom,
                          success: function (response) {
							//  alert(response);
							  if(response == 'true'){
                              $('html, body').animate({scrollTop: 0}, 500);
                      
							
                         window.setTimeout(function () {
                  $("#submit_att").text('Contiune'),
				  
				    $("#submit_att").css({'background':'#8cc63e','opacity': '1'})
            }, 3000)
							  }else  if(response == 'true'){
								  
								      $("#submit_att").text('Submit Attendance');
							  $("#submit_att").css({'background':'#354052','opacity': '1'});
							  	  $("#server_side_400").show();
							  }else if(response!=''){
								      $("#submit_att").text('Submit Attendance');
									  	  $("#server_side_500").show();
							  $("#submit_att").css({'background':'#354052','opacity': '1'});
								  
							  }
                            



                          },
                      });
                  }

		</script>



