<!DOCTYPE html>
<?php include '../dbcon.php';?>
<?php

if(isset($_SESSION['email'])){
	 $uniqe_id = $_GET['id'];  
}else{
	header('location:../index.php');
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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
#reg_button:hover{
background:#efefef;
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
				   .col-lg-6{
				   padding-bottom:10px;
				   padding-top:4px;
				   }
                </style>


   </head>

  	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7%;border-top:1px solid #2C3543">
			<ul style="margin-left:-20%;margin-top:39px">
<a  href="index.php"><li class="dashboard"><label><img alt="" class="sidenavicons" src="../images/dashboard.png"></label>Dashboard</li></a>
<a  href="employee_management.php">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/iac.png"></label>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/energyanalysis.png"></label>Holiday Management</li></a>
<a  href="accounts_billing.php">  <li class="costanalysis"><label><img  class="sidenavicons" src="../images/costanalysis.png"></label>Accounts & Billing</li></a>
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

  <li class="nav_item"><a href ="../logout.php"><button type="button" class="navbtn" name="button">Log out</button></a></li>
</ul>
</div>
</main>

<!---- side nav bar --->



<div class="container-fluid dashboardContainer ng-scope">
<div class="container-fluid dashboardContentHolder" style="height:auto">
<div class="row tenantgridcontainer">
<div class="addtenantcontainer col-sm-12 col-md-12-col-lg-12">
<div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
  <span>Update Account</span>
  <img class="pull-right" src="../images/edit2.png" height="22px">
</div>
<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12" >
    <form class=""id="com_acc_update" method="post" enctype="multipart/form-data">
           <?php
 
                        $sql = "select * from companyreg_tbl where company_id = $uniqe_id";
                        
                         $result = mysqli_query($con , $sql);

                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                   <div class="col-sm-6 col-md-6 col-lg-6">
                     <div class="row">
                         <input type="hidden" name="uniqe_id" id="uniqe_id" value="<?php echo $uniqe_id;?>">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Comapny name</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                   <input type="text" class="tenantform " id="company_name" name="company_name"  placeholder="Update Company Name" aria-describedby="basic-addon1"value=" <?php echo $row['company_name'];?>" required="">
                        </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Email</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                           <input type="text" class="tenantform " id="company_email"  placeholder="" aria-describedby="basic-addon1"  disabled="disabled" value=" <?php echo $row['company_email'];?>">
                           <input type="hidden" class="tenantform " id="company_email" name="company_email" placeholder="" aria-describedby="basic-addon1"  value=" <?php echo $row['company_email'];?>">
                        </div>
                       
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Contact</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

    <input type="text" class="tenantform" placeholder="Update Contact No" name="company_contact" id="company_contact" value=" <?php echo $row['company_contact'];?>">
                       </div>
                     
                       
                     </div>
                   </div>

                   <div class="col-sm-6 col-md-6 col-lg-6 ">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">No of emp</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <select  name="num_of_emp">
                              <option> <?php echo $row['number_of_employee'];?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                           
                          </select>
                       </div>
                     <div class="row">
                       
                        <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Enter New Password</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                      
                           <input type="password" class="tenantform" placeholder="*********" id="company_password" value=" <?php echo $row['company_password'];?>" name="company_password"data-toggle="tooltip" data-placement="right" title="Minimum 8 char">
                    
                       </div>
                       
                        <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Update Profile Picture:</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                           
                           <input type="file" value="<?php echo $row['company_img'];?>" name="company_img" id="company_img" style="color:transparent" ><span id="company_img" style="position: absolute; text-align: center;  left: 33%; top: 10px; "><?php echo $row['company_img']; ?></span>
                                                                                                                                                                                               
                                                                                                                                                                                              
                            
                       </div>
                        </div>
                       
                     </div>
                   </div>
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                         <div  class="alert alert-success col-md-5 col-md-offset-3" id="msg" style="display: none; color: #fff;"></div></div>
                   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
				   	<div class="alert alert-info " id="reposnse"  style="display:none;">

   </div>
				   
                     <ul class="tenantform">
					 <button type="submit" style="    padding: 10px 20px 10px 20px;
    border: 1px solid #7BC143;
    border-radius: 24px;
    font-weight: bold;
    color: #646567;
    margin: 0 0 0 0;background:#fff;outline:none;" id="reg_button">Update </button>
                   
    <li><a href="accounts_billing.php">cancel</a></li>
                             <li><a href="index.php">close</a></li>
                     </ul>
                   </div>
           <?php 
                    }?>
                 </form>
</div>
</div>



</div>
</div>
</div>
</body>

</html>
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
		
<script type="text/javascript" src="../js/validation.min.js"></script>
<script>
	
$(document).ready(function(){
    
	
	/// start singup form validation 
	
	
$("#com_acc_update").validate({
      rules:
   {
   company_name: {
      required: true,
   minlength: 3
   },
   company_password: {
   required: true,
   minlength: 8,
   maxlength: 15
   }
   		
    },
       messages:
    {
            com_update_name: "please enter company new name",
            com_new_password:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     }
           
   
       },
    submitHandler: com_update
       });
         function com_update(){
                                    var data = $('#com_acc_update').serialize();
                               
                                    $.ajax({
                                     type: 'POST',
                                     url: 'company_update_account_ins.php',
                                     data: data,
                                     success: function(responce){
                                
                                         $('#msg').show().text(responce);
                                        
                                            window.setTimeout(function(){
                                         window.location='accounts_billing.php'

                                                  },3000)   
                                     },
                                     error: function (responce) {   
                                      
                                    }
                                 });
                                  }
	/*function  submitForm(){
	var datafrom = $('#com_acc_update').serialize();
	     $("#reg_button").text('').prop("disabled",'true');
		      $("#reg_button").css({'background':'#fff','opacity':'.5'});
		     $("#reg_button").append("<img src='../images/loader.gif' height='20px' />");
	$.ajax({
	method:"POST",
	url:"company_update_account_ins.php",
	data:datafrom,
	
	success:function(response){
	$('html, body').animate({scrollTop:0},500);
	    $("#reg_button").text('Register');
		 $("#reg_button").text('').prop("disabled",false);
	$("#reposnse").text("Update Successfully").show();
	   window.setTimeout(function(){
	 window.location='accounts_billing.php';
	   
	   },3000)

	
	
	},
		
	});
	}
	*/
	
	
});
</script>
