<!DOCTYPE html>
<?php include '../dbcon.php';?>
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
 <div class="tenant" style="padding-left:15px">
  <div class="addTenant">
    <a href="add_holiday.php" class="addTenantButton">Add Holiday</a>
  </div>
  <div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
    <span style="color:#fff; font-weight: bold;">Holiday Management</span>
 
</div>
  <!--- data view in table start here -->
<table class="table table-hover"  >
  <thead>
 
    <tr>
      <th>#</th>
      <th>Name of Holiday</th>
      <th>Date of Holiday</th>
      <th>Day of Holiday</th>
      <th>Edit/Delete</th>
     
      
    </tr>

  </thead>
  <tbody>
 <?php
  
        $sql = "select * from holiday_tbl";
         $result = mysqli_query($con , $sql);
     $counter = 0;
    while($row = mysqli_fetch_array($result))
    {
    ?>
  <!---- start show data in row loop -->
  
   <!--- on click  redirect to usefull info page on click event not in href --> 
    <tr onclick="">
      <th scope="row"><?php echo ++$counter;?></th>
      <td><?php echo $row["holiday_name"]; ?></td>
      <td><?php echo $row["holiday_date"];?></td>
      <td><?php echo $row["holiday_days"];?></td>
      <td><a href="holiday_edit.php?id=<?php echo $row["holiday_id"];?>"><img height="25px"  src="../images/edit1.png"></a>&nbsp;&nbsp;&nbsp;<a href="holiday_delete.php?id=<?php echo $row["holiday_id"];?>"><img height="25px" src="../images/delete-icon.png"></a></td>
      <td>
	  </td>
    </tr>
	<!--- //end loop data -->
    <?php
    
    }?>	  
  </tbody>
</table>
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
	  
	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }

	  </style>
                
