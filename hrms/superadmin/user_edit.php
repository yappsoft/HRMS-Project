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
    padding: 11px 0 0 13px;
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

  <li class="nav_item"><button type="button" class="navbtn" name="button">Log out</button></li>
</ul>
</div>
</main>

<!---- side nav bar --->

<?php

    $companyid=$_GET['view_user'];
    $query=$sql = "select country_name,companyreg_tbl.country_id,company_email, company_name, company_contact,company_status, number_of_employee from master_country join companyreg_tbl ON master_country.country_id = companyreg_tbl.country_id where company_id = '$companyid' ";
    $rs=  mysqli_query($con, $query);
    $counter=0;
    $arr= mysqli_fetch_array($rs);
  ?>




<div class="container-fluid dashboardContainer ng-scope">
<div class="container-fluid dashboardContentHolder" style="height:616px">
<div class="row tenantgridcontainer">
<div class="addtenantcontainer col-sm-12 col-md-12-col-lg-12">
<div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
  <span>Update Company</span>
 
</div>
<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12" style="height:370px;">
        <form class=""id="updateform" method="post">
                   <div class="col-sm-6 col-md-6 col-lg-6">
                     <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Comapny name</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                           <input type="text" class="tenantform " id="com_name_u" name="com_name_u" value="<?php echo $arr['company_name']?>" placeholder="Company Name" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Comapny Email</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                           <input type="email" class="tenantform" placeholder=""value="<?php echo $arr['company_email']?>" name="com_email_u"id="com_email_u" disabled="disable">
					 	
                       </div>
                       <input type="hidden" name="companyid_u" value="<?php echo $companyid;?>">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Contact no.</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

    <input type="text" class="tenantform" placeholder="Contact No" name="com_no_u" id="com_no" value="<?php echo $arr['company_contact']?>">
    <input type="hidden" value="1" name="uniqe">
                       </div>
                      
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">No of emp</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <select  name="com_emp_u">
                            <option value="<?php echo $arr['number_of_employee']?>"><?php echo $arr['number_of_employee']?></option>
                           <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                           
                          </select>
                       </div>
                     </div>
                   </div>

                   <div class="col-sm-6 col-md-6 col-lg-6 ">
                     <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Password</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                      
    <input type="password" class="tenantform" placeholder="*********" id="com_password_u" name="com_password_u"data-toggle="tooltip" data-placement="right" title="Minimum 8 char">
                    
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Confirm Password</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <input type="password" class="tenantform" placeholder="*******" id="com_cof_password_u" name= "com_cof_password_u"data-toggle="tooltip" data-placement="right" title="Type again">
                       
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Country</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <select name="com_country_u">
                           <option value="<?php echo $arr['country_id']?>"><?php echo $arr['country_name']?></option>
                           <option value="1">India</option>
                           <option value="2">USA</option>
                           <option value="3">Denmark</option>
                         </select>
                       </div>
                      
					   <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Account Status</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <select name="com_status_u">
                           <option value="<?php echo $arr['company_status']?>"><?php echo $arr['company_status']?></option>
                           <option value="inactive">Inactive</option>
                           <option value="active">Active</option>
                         </select>
                       </div>
                       
                     </div>
                   </div>
                   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
				   	<div class="alert alert-info " id="reposnse"  style="display:none;">

   </div>
				   
                     <ul class="tenantform">
					 <button type="submit" style="    padding: 10px 20px 10px 20px;
    border: 1px solid #7BC143;
    border-radius: 24px;
    font-weight: bold;
    color: #646567;
    margin: 0 0 0 0;background:#fff;outline:none;" id="udt_button">Update </button>
                   
                          <li><a href="user_details.php">cancel</a></li>
                             <li><a href="user_details.php">close</a></li>
                     </ul>
                   </div>
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
    $('[data-toggle="tooltip"]').tooltip();   
	 $("#com_no_u").keypress(function (e) {

            var  key = e.charCode || e.keyCode || 0;

            // only numbers
            if (key < 48 || key > 58) {

                return false;
            } if(key  <=10){
			return false;
			}

        });

	
	
	$("#reg_with").click(function(){
	$("#login-form").hide();
	$("#reg-form").show();
	
	});
	


	
	
	/// start singup form validation 
	
	
$("#updateform").validate({
      rules:
   {
   com_name_u: {
      required: true,
   minlength: 3
   },
   com_password_u: {
   required: true,
   minlength: 8,
   maxlength: 15
   },
   com_cof_password_u: {
   required: true,
   equalTo: '#com_password_u'
   },
   com_email_u: {
            required: true,
            email: true
            },
			com_emp:{required:true},
			com_country:{required:true},
    },
       messages:
    {
            com_name: "please enter company name",
            com_password_u:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
            com_email: "please enter a valid email address",
   com_cof_password_u:{
      required: "please retype your password",
      equalTo: "password doesn't match !"
       }
       },
    submitHandler: submitForm 
       });
	function  submitForm(){
	var datafrom = $('#updateform').serialize();
	     $("#udt_button").text('').prop("disabled",'true');
		      $("#udt_button").css({'background':'#fff','opacity':'.5'});
		     $("#udt_button").append("<img src='../images/loader.gif' height='25px' />");
	$.ajax({
	method:"POST",
	url:"../company_db_ins.php",
	data:datafrom,
	
	success:function(response){
	//$('html, body').animate({scrollTop:0},500);
	// $("#udt_button").text();
	 $("#udt_button").text(' ').prop('disabled',"false");
	
          $("#reposnse").text("Company update Successfully").show();
           window.setTimeout(function(){
	
	   
	   },4000)
	 window.setTimeout(function(){
	window.location='user_detail.php'
	   
	   },4000)
         

    },
	
	
		
	});
	}
	
	
	
});
</script>

