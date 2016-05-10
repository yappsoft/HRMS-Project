<!DOCTYPE html>
<html lang="en">
<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
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
<a ng-href="#/dashboard" href="index.php">  <li class="dashboard"><span><img ng-src="http://127.0.0.1/leviton/images/dashboard/dashboard.png" alt="" class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
<a ng-href="#/tenant" href="user_detail.php">  <li class="tenanticon"><span><img ng-src="http://127.0.0.1/leviton/images/dashboard/tenanticon.png" alt="" class="sidenavicons" src="../images/tenanticon.png"></span>Employe Management</li></a>
<a ng-href="javascript:void(0);" href="unsafe:javascript:void(0);">  <li class="energyanalysis"><span><img ng-src="http://127.0.0.1/leviton/images/dashboard/energyanalysis.png" class="sidenavicons" src="../images/iac.png"></span>Leave Management</li></a>
<a ng-href="javascript:void(0);" href="unsafe:javascript:void(0);">  <li class="energyanalysis"><span><img ng-src="http://127.0.0.1/leviton/images/dashboard/energyanalysis.png" class="sidenavicons" src="../images/energyanalysis.png"></span>Holiday Management</li></a>
<a ng-href="javascript:void(0);" href="unsafe:javascript:void(0);">  <li class="costanalysis"><span><img ng-src="http://127.0.0.1/leviton/images/dashboard/costanalysis.png" class="sidenavicons" src="../images/costanalysis.png"></span>Accounts & Billing</li></a>
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

<div class="container-fluid dashboardContainer"  style="width:100%">
<div class="container-fluid dashboardContentHolder ">
 <div class="tenant" style="padding-left:0px">
  
  <div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
    <span style="color:#fff; font-weight: bold;">Holiday Management</span>
 
</div>
  <!--- data view in table start here -->

<div class="row tenantgridcontainer">
<div class="addtenantcontainer col-sm-12 col-md-12-col-lg-12">

<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12">
                 <form methode="post" id="add_holiday" class="ng-pristine ng-valid">
                   <div class="col-sm-6 col-md-6 col-lg-6">
                     <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Holiday name</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                           <input type="text" id="tenantname" name="holiday_name" placeholder="Holiday Name" class=" tenantform"  required="">
                        </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Holiday date</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                     <input type="text" id="datepicker" name="holiday_date" placeholder="Holiday Date" class=" tenantform"  required="">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Holiday day</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="accountno" name="holiday_day" placeholder="Holiday day" class=" tenantform"  required="">
                       </div>
                    </div>
                   </div>
                   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                     <ul class="tenantform">
                         <li><a href="" onclick="sub()" id="submit" name="submit">Submit</a></li>
                           
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
 <!--data post--> 
<script>
	  
	  <!-- jquery for fixed the div when open menu -->
	  $().ready(function(){
	  $('.menuLogo ').click(function(){
	  $("#acc-div").toggleClass('fixed-right');
	  });
	  });
	  </script>
           <script>
                           
                                  function sub(){alert("fdd");
                                 var data = $('#add_holiday').serialize();
                                    $.ajax({
                                     type: 'POST',
                                     url: 'addholiday_ins.php',
                                     data: data,
                                     success: function(responce){
        alert("fff");                                 
        //alert(responce);
                                     },
                                     error: function (responce) {
                                     alert(responce);
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
$( "#datepicker" ).datepicker();
});
</script>