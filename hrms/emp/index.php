<!DOCTYPE html>
<?php 
include '../dbcon.php';
if(isset($_SESSION['email'])){
	$emp_id = $_SESSION['login_emp_id'];
	$com_id = $_SESSION['company_id'];
	

	
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

.dialog__content {


    padding: 4em;
    text-align: center;

}
 .dialog h2 {
    margin: 0;
    font-weight: 400;
    font-size: 1.3em;
    padding: 0 0 2em;
    margin: 0;
	    color: #c94e50;
    font-weight: 400;

    font-family: 'Raleway', Arial, sans-serif;
}
</style> 
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
								        $('#myModal').modal({
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
  
  <div class="modal dialog__content" id="myModal"tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" style="width:350px;">
    <div class="modal-content">
      
      <div class="modal-body dialog">
	  <form id="attform" method="post">
	  <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $emp_id;?>" />
	  <input type="hidden" name="com_id" id="com_id"  value="<?php echo $com_id;?>"/>
     <h2><strong>Howdy</strong>, Please mark your attendance</h2>
	 <div class="alert alert-success" role="alert" id="server_side_200" style="display:none"><strong>Welldone!</strong> Attendance mark successfully</div>
	 <div class="alert alert-warning" role="alert" id="server_side_400" style="display:none"><strong>Oh snap!</strong> Please try again</div>
	 <div class="alert alert-info" role="alert" id="server_side_500" style="display:none"><strong>Warning!</strong> server occur error  </div>
	 
	   <button   type="button"onclick="submitAtt()"class="btn btn-lg btn-primary btn-orange" id="submit_att">Submit Attendance
        </button>
		
		
		</form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  
  
  
  
  
  
  <!--- //end attende modal -->
  
  
  
  	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7%;border-top:1px solid #2C3543">
			
			<ul style="margin-left:-20%;margin-top:39px">
<a  href="index.html"><li class="dashboard"><span><img alt="" class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
<a  href="employee_management.php">  <li class="tenanticon"><span><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></span>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/iac.png"></span>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/energyanalysis.png"></span>Holiday Management</li></a>
<a  href="accounts_billing.html">  <li class="costanalysis"><span><img  class="sidenavicons" src="../images/costanalysis.png"></span>Accounts & Billing</li></a>
</ul>
			
		</nav>
  <body cz-shortcut-listen="true" class="cbp-spmenu-push" >
  
<main class="maindiv">
 <div class="header navbar-fixed-top">
  <ul class="logocontainer">
    <li><img  alt="" id="showLeftPush"class="menuLogo" src="../images/menuicon.png"></li>
   
    <li><img class="dashboardlogo" src="../images/dashboardlogo.png"/></li>
  </ul>
<ul class="management_navigation_holder">
  
  <li class="nav_item"><button type="button" class="navbtn" name="button">Log out</button></li>
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
        <ul class="dashboardList">
          <li>
        

          </li>
          <li></li>
        </ul>
      </div>
    

         
      </div>
   
      <!-- first grid ends -->
      <!-- second grid start for todays attendance -->
      <div class="col-md-4 col-lg-4 col-sm-4 gridview">
        <div class="dashboardHeader">
          <p class="dashboardHeading">Today's Attendance</p>
          <ul class="dashboardList">
          
          
          </ul>
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
      <div class="col-md-4 col-lg-4 col-sm-4 gridview alertpf pointer">
    <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/birthday.png"/></div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Upcoming Birthday</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>
      <!-- out for loop here for alarm notification -->
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/birthdays.png" height="12px" alt="" ></div>
            <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 " ><span class="textbold">Ruchi Pareta</span><br>
                    <span class="textnormal">Tomorrow  13/05/2016 </span>..
              </div>
           </div>
           <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
             <div class="col-sm-1 col-md-1 col-lg-1"></div>
             <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/birthdays.png" height="12px" alt="" ></div>
               <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 "><span class="textbold">Yogendra</span><br>
                     <span class="textnormal">birthday 26/05/2016</span>..
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
              <div class="col-sm-1 col-md-1 col-lg-1"></div>
              <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/birthdays.png" height="12px" alt="" ></div>
                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 "><span class="textbold">Vijay Ijardar</span><br>
                      <span class="textnormal">birthday 30/10/2016</span>..
                </div>
             </div>
       <!-- end upcoming birthday here-->
         <!-- start upcoming holidays here-->
          <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
            <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
            <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding ">Upcoming Holiday</div>
       <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
      </div>
       <?php 
         
          $sel = "SELECT * FROM holiday_tbl where company_id='$com_id' and holiday_date > DATE_FORMAT(CURDATE(),'%m-%d-%Y')";
		  //var_dump($sel);
          $query = mysqli_query($con, $sel);
          while($row = mysqli_fetch_array($query))
          {
           ?>
          
         <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
             <div class="col-sm-1 col-md-1 col-lg-1"></div>
             <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/green-dot.png" height="12px" alt="" ></div>
               <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2 "><span class="textbold"><?php echo $row['holiday_name']?></span><br>
                     <span class="textnormal">on <?php echo $row['holiday_date']." ".$row['holiday_days'] ?></span>
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
      <!-- second grid alerts ends -->
	  
	 
      <!-- <div class="col-md-4 col-lg-4 col-sm-4 gridview"  id="acc-div"style="float:right; margin-right: 12px;">
        <div class="dashboardHeader">
          <p class="dashboardHeading">Free/Paid Accounts</p>
          <div id="chartdiv"></div>
          <ul class="dashboardList" >
              <li></li>
          
          </ul>
        </div>
          </div>-->
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
             
          </ul>
      </div>
      </div>
        </div>   
      
      </div>
     
	  <!----quick links gride end here -->

		  <!---- end pennding div -->
	  
	
	  
    
		
	
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
			
			     function  submitAtt() {
                      var datafrom = $('#attform').serialize();
					 // alert(datafrom);
                      $("#submit_att").text('');
                      $("#submit_att").css({'background': '#fff', 'opacity': '.5'});
                      $("#submit_att").append("<img src='../images/loader.gif' />");
                      $.ajax({
                          method: "POST",
                          url: "add_attdb.php",
                          data: datafrom,
                          success: function (response) {
							//  alert(response);
							  if(response == 'true'){
                              $('html, body').animate({scrollTop: 0}, 500);
                              $("#submit_att").text('Submit Attendance');
							  $("#submit_att").css({'background':'#354052','opacity': '1'});
							  $("#submit_att").prop('disabled','true');
							  $("#server_side_200").show();
							
                         window.setTimeout(function () {
                     location.reload()
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


