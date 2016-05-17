<!DOCTYPE html>
<?php include '../dbcon.php';
if(isset($_SESSION['email'])){
	
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
    margin: -49px 0 0px 43px;
	cursor:pointer;
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
                   td{
                       text-align: center;
                   }
                    th{
                       text-align: center;
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
            <a href="index.php" >  <li class="dashboard"><label><img  class="sidenavicons" src="../images/dashboard.png"></label>Dashboard</li></a>
            <a href="user_detail.php" class="current">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>User Management</li></a>
            <a href="user_request.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/energyanalysis.png"></label>User Request</li></a>

            <a  href="javascript:void(o)">  <li class="reports"><label><img  class="sidenavicons" src="../images/reports.png"></label>Account Details</li></a>
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

<!--- mian table idv start -->

<div class="container-fluid dashboardContainer">
<div class="container-fluid dashboardContentHolder ">
 <div class="tenant" style="padding-left: 0px;">
  <div class="addTenant">
    <a href="add_users.html" class="addTenantButton">Add Company</a>
  </div>

  <!--- data view in table start here -->
<table class="table table-hover">
  <thead>

    <tr>
      <th>S.No.</th>
      <th>Company Name</th>
      <th>Email</th>
      <th>Subscription Date</th>
      <th>Total Employee</th>
      <th>Plan</th>
      <th>Action</th>
  
    </tr>

  </thead>
  <tbody>
  <?php

    $query="select * from companyreg_tbl where company_status='active' ";
    $rs=  mysqli_query($con, $query);
    $test= mysqli_num_rows($rs);
    
    if($test>0)
    {
    $counter=0;
    while($arr= mysqli_fetch_array($rs))
            {
  ?>


  <!---- start show data in row loop -->

   <!--- on click  redirect to usefull info page on click event not in href -->
    <tr >
      <th scope="row"><?php echo ++$counter;?></th>
  <input type="hidden" value="<?php echo $arr['company_id'];?>" id="companyid">
      <td onclick="myfunction('<?php echo $arr['company_id'];?>')"><?php echo $arr['company_name'];?></td>
      <td onclick="myfunction('<?php echo $arr['company_id'];?>')"><?php echo $arr['company_email'];?></td>
      <td onclick="myfunction('<?php echo $arr['company_id'];?>')"><?php echo $arr['subscription_date'];?></td>
      <td onclick="myfunction('<?php echo $arr['company_id'];?>')"><?php echo $arr['number_of_employee'];?></td>
      <td onclick="myfunction('<?php echo $arr['company_id'];?>')"><?php echo $arr['company_plan'];?></td>
      <td><a href="user_edit.php?view_user=<?php echo $arr['company_id'];?>"><img height="25px" src="../images/edit1.png"></a> &nbsp; &nbsp;   <a href="user_delete.php?view_user=<?php echo $arr['company_id'];?>"><img height="25px" src="../images/delete-icon.png"></a>
      </td>
      <td>
	  </td>
    </tr>
	<!--- //end loop data -->

   <!--- on click  redirect to usefull info page on click event not in href -->

	<!--- //end loop data -->
	<?php 
       
        }
    }
   else{
 
     ?>
 
     <tr >
         <td scope="row" class="text-center" colspan="7"><?php echo "no record found"?></td>

    </tr>
    <?php
 }
 
   ?>
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


	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }

	  </style>
          <!--- script for click on table row to show records -->
          <script>
          function myfunction(id){

              var company_id = id;

              window.location = "user_details_per_emp.php?view_user=" + company_id;

          }
          </script>
