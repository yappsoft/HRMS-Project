<!DOCTYPE html>
<?php include '../dbcon.php';

if(isset($_SESSION['email'])){
	
}else{
	header('location:../index.html');
}
?>
<html lang="en">
  
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	   <script src="../js/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>HRMS </title>
    <link rel="stylesheet" href="../js/animate.css" media="screen" charset="utf-8">
      <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" charset="utf-8">

      <link rel="stylesheet" href="../css/chartist.min.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="../css/index.css" media="screen" charset="utf-8">
			
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />

<!--end of chart-->
    
<!-- datepicker -->
 

  <!--end datepicker--> 
                <style type="text/css">
				body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;

}
a.addTenantButton {
    color: white;
    background: #8CC542;
    padding: 11px 31px 11px 31px;
    border-radius: 24px;
    text-align: center;
    margin: -49px 0 0px 0;
	cursor:pointer;
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
                </style>
 
   </head>
  
  	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7.8%;border-top:1px solid #2C3543">
			
	<ul style="margin-left:-20%;margin-top:39px">
  <a  href="index.html">  <li class="dashboard"><span><img alt="" class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
<a  href="employee_management.php">  <li class="tenanticon"><span><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></span>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/iac.png"></span>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/energyanalysis.png"></span>Holiday Management</li></a>
<a  href="accounts_billing.html">  <li class="costanalysis"><span><img  class="sidenavicons" src="../images/costanalysis.png"></span>Accounts & Billing</li></a>
</ul>
			
		</nav>
  <body cz-shortcut-listen="true" class="cbp-spmenu-push">
  
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

<!--- mian table idv start -->

<div class="container-fluid dashboardContainer"  >
<div class="container-fluid dashboardContentHolder ">
 <div class="tenant" style="padding-left:0px">
  
  <div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
    <span style="color:#fff; font-weight: bold;">Holiday Management</span>
 
</div>
  <!--- data view in table start here -->
<?php
   
   $holiday_id = $_GET["id"];
        $sql = "select * from holiday_tbl where holiday_id = $holiday_id";
         $result = mysqli_query($con , $sql);
    $row = mysqli_fetch_array($result)
    
    ?>
<div class="row tenantgridcontainer">
    <div class="addtenantcontainer col-sm-12 col-md-12-col-lg-12" style="margin-left:-25px; width: 103%">

<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12">
                 <form methode="post" id="update_holiday" class="ng-pristine ng-valid">
                     <input type="hidden" name="holiday_id" value="<?php echo $row["holiday_id"];?>">
                     
                   <div class="col-sm-12 col-md-12 col-lg-12">
                     <div class="row">
                       <div class="col-sm-5 col-md-5 col-lg-5 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Holiday name</span></div>
                       <div class="col-sm-7 col-md-7 col-lg-7 tenantmargin">
                           <input type="text" id="tenantname" value="<?php echo $row["holiday_name"];?>" name="holiday_name" placeholder="Holiday Name" class=" tenantform"  required="">
                        </div>
                       <div class="col-sm-5 col-md-5 col-lg-5 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Holiday date</span></div>
                       <div class="col-sm-7 col-md-7 col-lg-7 tenantmargin">
                     <input type="text" id="datepicker" value="<?php echo $row['holiday_date'];?>" name="holiday_date" placeholder="Holiday Date" class=" tenantform"  required="">
                       </div>
                       <div class="col-sm-5 col-md-5 col-lg-5 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Holiday day</span></div>
                       <div class="col-sm-7 col-md-7 col-lg-7 tenantmargin">
                           <select name="holiday_day" class="tenantform" style="padding-top: 7px">
                              <option ><?php echo $row['holiday_days'];?></option>>
                               <option value="sunday">Sunday</option>>
                              <option value="monday">Monday</option>
                              <option value="tuesday">Tuesday</option>
                              <option value="wednesday">Wednesday</option>
                              <option value="thursday">Thursday</option>
                              <option value="friday">Friday</option>
                              <option value="saturday">Saturday</option>
                          </select>
                       </div>
                    </div>
                   </div>
                     <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                         <div  class="alert alert-success col-md-5 col-md-offset-3" id="msg" style="display: none"></div></div>
                   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                         
                       <ul class="tenantform" style="margin-left: -185px">
                         <li><button type="submit" style="padding: 10px 20px;
border: 1px solid rgb(123, 193, 67);
border-radius: 24px;
font-weight: bold;
color: rgb(100, 101, 103);
margin: 0px;background:#fff">Submit</button></li>
                         <li><a href="holiday_management.php" id="" name="submit">Cancel</a></li>  
                     </ul>
                   </div>
                    
                 </form>
    
</div>
</div>
 </div>

<!---- end table  -->

</div>
</div>
</div>


<!--- //end -->

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
          <!--update data post-->
           <script type="text/javascript" src="../js/validation.min.js"></script>
           <script>
               	$("#update_holiday").validate({
                        rules:
                     {

                      holiday_name: {
                         required: true,
                         minlength: 3

                         }, 
                         holiday_date: {
                         required: true,
                         }, 
                          holiday_day: {
                         required: true,
                         }, 
                      },
                         messages:
                      {
                              holiday_name: "please enter a holiday name",
                              holiday_date: "please select a holiday date",
                              holiday_day: "please select a holiday day"

                         },
                      submitHandler: upt 
                         });
                           
                                  function upt(){
                                    var data = $('#update_holiday').serialize();
                                    $.ajax({
                                     type: 'POST',
                                     url: 'holiday_update.php',
                                     data: data,
                                     success: function(responce){
                                         $('#msg').show().text(responce);
                                         
                                        // alert(responce);
                                       // window.location.href = "holiday_management.php";
                                     },
                                     error: function (responce) {   
                                      
                                    }
                                 });
                                  }
                            
                              
                           </script>
      <!--end data post-->                     
	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }

	  </style>
                     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script>
$(function() {
$( "#datepicker" ).datepicker({
    mindate: 0,
    });
});
</script>
