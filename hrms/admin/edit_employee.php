<!DOCTYPE html>
<?php
include '../dbcon.php';

if (isset($_SESSION['email'])) {
    
} else {
    header('location:../index.html');
}
?>

<?php
if (isset($_POST["Update"])) {
    $employee_id = $_GET["employee_id"];
    $first_name = $_POST["enp_f_name"];
    $last_name = $_POST["enp_l_name"];
    $email = $_POST["emp_email"];
    $mobile_no = $_POST["emp_no"];
    $alternate_no = $_POST["emp_alt_no"];
    $family_no = $_POST["emp_family_no"];
    $local_address = $_POST["local_add"];
    $permanent_address = $_POST["emp_par_add"];
    $education = $_POST["education"];
    $account_no = $_POST["bank_acc_no"];
    $ifsc_code = $_POST["bank_ifsc"];
    $bank_name = $_POST["bank_name"];
    $bank_branch_name = $_POST["bank_branch_name"];
    $number_of_leaves = $_POST["number_of_leaves"];
    $department = $_POST["department"];

    $image = '';
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../upload_images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }

    $q = "update employee_tbl set first_name='$first_name', last_name='$last_name', email='$email', mobile_no='$mobile_no', alternate_no='$alternate_no', family_no='$family_no', local_address='$local_address', permanent_address='$permanent_address', education='$education', account_no='$account_no', ifsc_code='$ifsc_code', bank_name='$bank_name', bank_branch_name='$bank_branch_name', number_of_leaves='$number_of_leaves', department='$department', image='$file_name' where employee_id='$employee_id'";
    mysqli_query($con, $q);
    //var_dump($q);
    header('location:employee_management.php');
    
}
?>


<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <script src="../js/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>HRMS </title>
        <link rel="stylesheet" href="../css/animate.css" media="screen" charset="utf-8">
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
            .dropdate{
                width: auto;
                padding-left: 0px;
                padding-right: 0px;
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

                    <li class="nav_item"><button type="button" class="navbtn" name="button">Log out</button></li>
                </ul>
            </div>
        </main>

        <!---- side nav bar --->



        <div class="container-fluid dashboardContainer ng-scope" style="">
            <div class="container-fluid dashboardContentHolder" >
                <div class="row tenantgridcontainer">
                    <div class="addtenantcontainer col-sm-12 col-md-12-col-lg-12" >
                        <div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
                            <!--general detail section of a employ start hear-->
                            <span>Personal Details</span>
                            <img class="pull-right" src="../images/edit2.png" height="22px">
                        </div>
                        <div class="addtenantformholder col-sm-12 col-md-12 col-lg-12" style="height: auto;; padding-left: 0px;">
                            <?php
                            $employee_id = $_GET["employee_id"];
                            $q = "select * from employee_tbl where employee_id='$employee_id'";
                            $result = mysqli_query($con, $q);
                            $row = mysqli_fetch_array($result);
                            ?>
                            <form class="" id="registerform" method="post" enctype="multipart/form-data">
                                <div class=" col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">First name</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform " id="enp_f_name" name="enp_f_name"  placeholder="First Name" aria-describedby="basic-addon1" value="<?php echo $row['first_name'] ?>">
                                                <input type="hidden" class="tenantform " id="employee_id" name="employee_id"  placeholder="" aria-describedby="basic-addon1" value="<?php echo $row['employee_id'] ?>">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Email</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="email" class="tenantform" placeholder="Employee Email" name="emp_email" id="emp_email" data-toggle="tooltip" data-placement="right" title="fill email" value="<?php echo $row['email'] ?>">
                                                <label class="error" id="email_error" style="display:none"> </label>
                                            </div>


                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Alternet Contact no.</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform" placeholder="Alternet Contact No" name="emp_alt_no" id="emp_alt_no" value="<?php echo $row['alternate_no'] ?>">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Local Address</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <textarea class="tenantform" placeholder="Local Address"  name="local_add" id="local_add"rows="5" id="comment" ><?php echo $row['local_address'] ?></textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Last name</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform " id="enp_l_name" name="enp_l_name"  placeholder="Last Name" aria-describedby="basic-addon1" value="<?php echo $row['last_name'] ?>">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Contact no.</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

                                                <input type="text" class="tenantform" placeholder="Contact No" name="emp_no" id="emp_no" data-toggle="tooltip" data-placement="right" title="Enter contect no." value="<?php echo $row['mobile_no'] ?>">
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Family Contact no.</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform" placeholder="Family Contact no" name="emp_family_no" id="emp_family_no" value="<?php echo $row['family_no'] ?>">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Parmanent Address</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <textarea  class="tenantform " placeholder="Parmanent Address"  name="emp_par_add" id="emp_par_add"rows="5" id="comment"><?php echo $row['permanent_address'] ?></textarea>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--general detail section of a employ end hear-->


                                <!--Basic detail section of a employ start hear-->

                                <div class="addtenantheader col-sm-12 col-md-12 col-lg-12" style="padding-right: 35px;">
                                    <span>Basic Details</span>
                                    <img class="pull-right" src="../images/edit2.png" height="22px">
                                </div>               <div class="row">
                                    <div class=" col-sm-12 col-md-12 col-lg-12">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row">

                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Education</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="education" name="education"  placeholder="Education" aria-describedby="basic-addon1" value="<?php echo $row['education'] ?>">
                                                </div>  

                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Account No.</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="bank_acc_no" name="bank_acc_no"  placeholder="Account No." aria-describedby="basic-addon1" value="<?php echo $row['account_no'] ?>">
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Bank Branch name</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="bank_branch_name" name="bank_branch_name"  placeholder="Bank Branch Name" aria-describedby="basic-addon1" value="<?php echo $row['bank_branch_name'] ?>">
                                                </div>   


                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 ">

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Bank name</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform " id="bank_name" name="bank_name"  placeholder="Bank Name" aria-describedby="basic-addon1" value="<?php echo $row['bank_name'] ?>">
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Ifsc Code</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform " id="bank_ifsc" name="bank_ifsc"  placeholder="Ifsc Code" aria-describedby="basic-addon1" value="<?php echo $row['ifsc_code'] ?>">
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Image</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="file" class="tenantform " id="image" name="image"  placeholder="Please upload image" aria-describedby="basic-addon1">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="addtenantheader col-sm-12 col-md-12 col-lg-12" style="padding-right: 35px;">
                                    <span>Official Details</span>
                                    <img class="pull-right" src="../images/edit2.png" height="22px">
                                </div>               <div class="row">
                                    <div class=" col-sm-12 col-md-12 col-lg-12">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row">


                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Numbers Of Leave</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="number_of_leaves" name="number_of_leaves"  placeholder="Numbers Of Leave" aria-describedby="basic-addon1" value="<?php echo $row['number_of_leaves'] ?>">
                                                </div>   

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                                            <div class="row">

                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Department</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

                                                    <select name="department" id="department" class="dropdate"style="width: 230px;" >
                                                        <option selected disabled=""> Department</option>
                                                        <option value="development">Development</option>
                                                        <option value="marketing">Marketing</option>
                                                        <option value="sales">Sales</option>

                                                    </select>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Basic detail section of a employ end hear-->
                                <!--submit cancel reset group of buttons-->
                                <div class="row">
                                    <div  class="alert alert-success col-md-6 col-md-offset-3" id="msg" style="display: none; background-color: #7BC143 !important;">
                                        <strong>Success!</strong> Form has been send.
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">


                                        <ul class="tenantform">
                                            <button type="submit" name="Update" value="Update" style="    padding: 10px 20px 10px 20px;
                                                    border: 1px solid #7BC143;
                                                    border-radius: 24px;
                                                    font-weight: bold;
                                                    color: #646567;
                                                    margin: 0 0 0 0;background:#fff; outline:none;" id="reg_button">Save </button>

                                            <li><a href="">cancel</a></li>
                                            <li><a href="">close</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>   <!--end form here -->
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

    $().ready(function () {
        $(".maindiv").click(function () {
            //alert();
            //$('.cbp-spmenu').removeClass('cbp-spmenu-open');
        });
    });
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
            menuRight = document.getElementById('cbp-spmenu-s2'),
            menuTop = document.getElementById('cbp-spmenu-s3'),
            menuBottom = document.getElementById('cbp-spmenu-s4'),
            showLeft = document.getElementById('showLeft'),
            showRight = document.getElementById('showRight'),
            showTop = document.getElementById('showTop'),
            showBottom = document.getElementById('showBottom'),
            showLeftPush = document.getElementById('showLeftPush'),
            showRightPush = document.getElementById('showRightPush'),
            body = document.body;


    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };


    function disableOther(button) {

        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }

    }
</script>

<script type="text/javascript" src="../js/validation.min.js"></script>    <!--lybrary for validation-->
<!--validation function script start hear-->
<script>

            $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
            $("#emp_no").keypress(function (e) {

    var key = e.charCode || e.keyCode || 0;
            // only numbers
            if (key < 48 || key > 58) {
    return false;
    }
    if (key <= 10) {
    return false;
    }

    });
            $("#reg_with").click(function () {
    $("#login-form").hide();
            $("#reg-form").show();
    });
            //  <!--validation function script end hear-->
                    // submit form 
                            function  submitForm() {
                            var datafrom = $('#registerform').serialize();
                                    $("#reg_button").text('').prop("disabled", 'true');
                                    $("#reg_button").css({'background': '#fff', 'opacity': '.5'});
                                    $("#reg_button").append("<img src='../images/loader.gif' height='20px' />");
            $.ajax({
                method: "POST",
                url: "employeedb.php",
                data: datafrom,
                success: function (response) {
alert(response);
                   // window.setTimeout(function () {
                    //    window.location = 'employee_management.php';

                  //  }, 3000)

                    $('#msg').show().text(response);

                },
            });
        }



    });
</script>

