<!DOCTYPE html>
<?php include '../dbcon.php';?>
<?php

if(isset($_SESSION['email'])){
	 $uniqe_id = $_SESSION['company_id']; 
}else{
	header('location:../index.php');
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

      <link rel="stylesheet" href="../css/chartist.min.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="../css/index.css" media="screen" charset="utf-8">
			
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
                <!--chart for free and paid users-->
                <script src="./js/amcharts.js"></script>
                <script src="./js/pie.js"></script>
                <script src="./js/light.js"></script>
<!--end of chart-->
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
                <style>
                    th{
                        background-color: #354052;
                        color: #fff;
                    }
                </style>
   
   </head>
  
  	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7.8%;border-top:1px solid #2C3543">
			
            <ul style="margin-left:-20%;margin-top:39px">
  <a  href="index.php">  <li class="dashboard"><span><img alt="" class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
<a  href="employee_management.html">  <li class="tenanticon"><span><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></span>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/iac.png"></span>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/energyanalysis.png"></span>Holiday Management</li></a>
<a  href="accounts_billing.php">  <li class="costanalysis"><span><img  class="sidenavicons" src="../images/costanalysis.png"></span>Accounts & Billing</li></a>

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
 <div class="tenant" style="padding-left: 0px;">
  <div class="addTenant">
  </div>
  
  <!--- data fatch from company table -->

  
  

<!---- end table  for company details -->
<!--start table for employ of the perticuler company-->
<div class="row ">

<div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
    <span style="color:#fff; font-weight: bold;">Account Details</span>
 
</div>
<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12">
          
                 <form name="addTenantForm" class="ng-pristine ng-valid">
                       <?php
  
                        $sql = "select * from companyreg_tbl where company_id = $uniqe_id";
                         $result = mysqli_query($con , $sql);

                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                   <div class="col-sm-6 col-md-6 col-lg-6">
                     <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Name:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                        <?php echo $row['company_name'];?> 
                        </div>
                     </div>
                        <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Email:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                     <?php echo $row['company_email'];?> 
                       </div>
                        </div>
                       <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Contact:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                      <?php echo $row['company_contact'];?> 
                       </div>
                        </div>
                        
                   </div>

                   <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Employees:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <?php echo $row['number_of_employee'];?> 
                       </div>
                         </div>
                       <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Plan:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                        <?php echo $row['company_plan'];?> 
                       </div>
                        </div>
                     
                   </div>
                         <!--submit cancel reset group of buttons-->
            <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
				   	<div class="alert alert-info " id="reposnse"  style="display:none;">

                                        </div>
				   
                     <ul class="tenantform">
                            <li><a href="update_company_account.php?id=<?php echo $row['company_id'];?>">Edit</a></li>
                            <li><a href="index.php">close</a></li>
                     </ul>
                   </div>
            </div>
                 
                 </form>
    
                     </div>
    <div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
    <span style="color:#fff; font-weight: bold;">Billing Details</span>
 
</div>
<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12">
                 <form name="addTenantForm" class="ng-pristine ng-valid">
                   <div class="col-sm-6 col-md-6 col-lg-6">
                       <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Registration Date:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <?php echo $row['registration_date'];?> 
                       </div>
                     </div>
                       <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Last Pyment Date:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <?php echo $row['subscription_date'];?> 
                        </div>
                     </div>
                      
                     
                   </div>

                   <div class="col-sm-6 col-md-6 col-lg-6 ">
                       <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Subscription Date:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <?php echo $row['subscription_date'];?> 
                       </div>
                        </div>
                        <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Plan Expiry:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <?php echo $row['subscription_date'];?>
                       </div>
                        </div>
                        
                      
                   </div>
                      <?php
                 
    }?>  
                     </div>
                   </div>


<!--table for employee details of particuler-->

  


<!---- end table  for company employee details -->
 
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
	  
	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }

	  </style>
          <!--- script for click on table row to show records -->
          <script>
          function myfunction(){
              
              
              
              
              
          }
          
          
          
          </script>  