<!DOCTYPE html>
<?php   include '../dbcon.php';
if(isset($_SESSION['email'])){
	
}else{
	header('location:../index.html');
}
?>
<html UTF-8 lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	   <script src="../js/jquery.min.js"></script>
            <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" charset="utf-8">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>HRMS </title>
    <link rel="stylesheet" href="../js/animate.css" media="screen" charset="utf-8">


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
@font-face {
    font-family: 'Glyphicons Halflings';

    src: url('../fonts/glyphicons-halflings-regular.eot');
    src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
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
                   .glyphicon{

                       font-size:20px;
                       font-weight:200;
                   }
                </style>


   </head>

  	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7.8%;border-top:1px solid #2C3543">
      <ul style="margin-left:-20%;margin-top:39px">
          <a href="index.php">  <li class="dashboard"><span><img  class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
          <a href="user_detail.php">  <li class="tenanticon"><span><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></span>User Management</li></a>
          <a href="user_request.php">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/energyanalysis.png"></span>User Request</li></a>

          <a  href="javascript:void(o)">  <li class="reports"><span><img  class="sidenavicons" src="../images/reports.png"></span>Account Details</li></a>
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


<div class="container-fluid dashboardContainer" >
<div class="container-fluid dashboardContentHolder ">
    <div class="tenant" style="padding-left:15px">
     <div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
    <span style="color:#fff; font-weight: bold;">Company Request</span>

     </div><br><br>

  <!--- data view in table start here -->
  <table class="table table-hover" style="padding-top:50px;">
  <thead>

    <tr>
      <th>#</th>
      <th>Company Name</th>
      <th>Request Date</th>
      <th>Email</th>
      <th>Plan</th>
      <th>No. of emp</th>
      <th>Country</th>
      <th>Approve/Reject</th>
      
    </tr>

  </thead>
  <tbody>
  <?php

        $sql = "select country_name, company_id, company_name, company_email, registration_date, company_plan, number_of_employee from master_country join companyreg_tbl ON master_country.country_id = companyreg_tbl.country_id where company_status = 'inactive' ";
         $result = mysqli_query($con , $sql);
    //var_dump($sql);
     $counter = 0;
    while($row = mysqli_fetch_array($result))
    {
    ?>
  <!---- start show data in row loop -->

   <!--- on click  redirect to usefull info page on click event not in href -->
    <tr id="tr"  >
      <th scope="row"><?php echo ++$counter;?></th>
      <td onclick="crt('<?php echo $row['company_id'];?>')"><?php echo $row['company_name'];?></td>
      <td onclick="crt('<?php echo $row['company_id'];?>')"><?php echo $row['registration_date'];?></td>
      <td onclick="crt('<?php echo $row['company_id'];?>')"><?php echo $row['company_email'];?></td>
      <td onclick="crt('<?php echo $row['company_id'];?>')"><?php echo $row['company_plan'];?></td>
      <td onclick="crt('<?php echo $row['company_id'];?>')"><?php echo $row['number_of_employee'];?></td>
      <td onclick="crt('<?php echo $row['company_id'];?>')"><?php echo $row['country_name'];?></td>
      <td><span style="color: green" id="approve" class="glyphicon glyphicon-ok-circle" onclick="Confirm_acc('<?php echo $row['company_id'];?>')" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;<span style="color: red"  class="glyphicon glyphicon-remove-circle"  onclick="rej_acc('<?php echo $row['company_id'];?>')" aria-hidden="true"></span></td>
      
    </tr>
    <?php
}?>
	<!--- //end loop data -->


  </tbody>
  
</table>
  <div class="col-sm-12 col-md-12 col-lg-12 text-center" onclick="crt('<?php echo $row['company_id'];?>')">
                         <div class="alert alert-success col-md-5 col-md-offset-3" id="msg" style="display: none; background-color: #fff !important;"></div></div>
<!---- end table  -->
 </div>
</div>
</div>

<!--approv modal-->
<div class="modal" id="myModal" role="dialog" style="top:35%" >
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Approve or Reject</h4>
                                                        </div>
                                                        <div align="center" class="modal-body con_pop" style="cursor: pointer">
                                                            
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                         <div  class="alert alert-success col-md-5 col-md-offset-3" id="masag" style="display: none; background-color: #fff !important;"></div></div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
<script>

    function crt(id){
        //alert(id);
        var com_id = id;
        //$("tr").data('c_id');
        $("#myModal").modal('show');
        var html = '<div class="content"><form id="myform"><td><span onclick="Confirm_acc('+com_id+')">Approve &nbsp;<span style="color: green" id="right" class="glyphicon glyphicon-ok-circle" onclick="Confirm_acc('+com_id+')" aria-hidden="true"></span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <td><span onclick="rej_acc('+com_id+')">Reject &nbsp;<span style="color: red"  class="glyphicon glyphicon-remove-circle" onclick="rej_acc('+com_id+')" aria-hidden="true"></span></span><div class="clearfix"></div></form></div>'
      $(".con_pop").html(html);
    }
</script>
<!--end modal-->


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

</script>
<script>

	  <!-- jquery for fixed the div when open menu -->
	  $().ready(function(){
	  $('.menuLogo ').click(function(){
	  $("#acc-div").toggleClass('fixed-right');
	  });
	  });
	  </script>
	  <script>
              function Confirm_acc(id){
                    var com_id = id;
                     $.ajax({
                         type: 'POST',
                         url: 'status_conform.php',
                         data: 'com_id=' + com_id +'&status_act='+'active',
                         success: function(responce){
                            $("#myModal").modal('hide');
                             $('#msg').show().text(responce);
                         $("#tr").fadeOut();
                         location.reload();
                        },
                     });

              }
          </script>
          <script>
              function rej_acc(id){
                    var com_id = id;

                     $.ajax({
                         type: 'POST',
                         url: 'status_conform.php',
                         data: 'com_id=' + com_id +'&status_rej='+'active',
                         success: function(responce){
                                     $("#myModal").modal('hide');
                             $('#msg').show().text(responce);
                             //$('.con_pop').append()text(responce);
                        $("#tr").fadeOut();
                        location.reload();
                        },
                     });

              }
          </script>
	  <!--- css for margin-regit div on paid & free Vijy -->
	  <style>
	  .fixed-right{
	  margin-right:5px !important;
	  }

	  </style>
