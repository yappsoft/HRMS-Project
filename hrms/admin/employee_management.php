<!DOCTYPE html>
<?php
include("../dbcon.php");



if (isset($_SESSION['email'])) {
    
} else {
    header('location:../index.html');
}
?>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>HRMS </title>
        <link rel="stylesheet" href="../css/animate.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" charset="utf-8">
        <link href="../css/gsdk-base.css" rel="stylesheet" />

        <link rel="stylesheet" href="../css/index.css" media="screen" charset="utf-8">

        <link rel="stylesheet" type="text/css" href="../css/default.css" />
        <link rel="stylesheet" type="text/css" href="../css/component.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <!--end of chart-->
        <style type="text/css">
            body {
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
                font-size: 14px;
                line-height: 1.42857143;
                color: #333;

            } div.dashboardgrid3 > div.dashboardmaincontent >.col-md-12, .col-md-3,.col-md-4,.col-md-5,.col-lg-12, .col-sm-12, .col-sm-6, .col-md-6, .col-lg-6{

                padding-left: 15px;
                padding-right: 15px;
            }

            .form-control{

                background-color: #fff;
                opacity: 1;
                color:#212121;
            }
            a.addTenantButton {
                color: white;
                background: #8CC542;
                padding: 11px 31px 11px 31px;
                border-radius: 24px;
                text-align: center;
                margin: -49px 0 0px 0;
                cursor:pointer;
                margin-left: 45px;
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
           label{
			   font-weight:700;
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
        <a  href="index.php"><li class="dashboard"><label><img alt="" class="sidenavicons" src="../images/dashboard.png"></label>Dashboard</li></a>
<a  href="employee_management.php" class="current">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>Employe Management</li></a>
<a   href="leave_management.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/iac.png"></label>Leave Management</li></a>
<a  href="holiday_management.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/energyanalysis.png"></label>Holiday Management</li></a>
<a  href="accounts_billing.php">  <li class="costanalysis"><label><img  class="sidenavicons" src="../images/costanalysis.png"></label>Accounts & Billing</li></a>
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
                <div class="tenant" style="padding-left:0">
                    <div class="addTenant">
                        <a href="javascript:void(0)" id="emp_reg" class="addTenantButton">Add Employee</a>
                    </div>

                    <!--- data view in table start here -->
                    <table class="table table-hover">
                        <thead>

                            <tr>
                                <th>S.NO.</th>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Date Of Joining</th>
                                <th>Edit/Delete</th>

                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $result = mysqli_query($con, "select * from employee_tbl");
                            $counter = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <!---- start show data in row loop -->

                                    <!--- on click  redirect to usefull info page on click event not in href --> 
                                    <tr onclick="">
                                        <th scope="row"><?php echo ++$counter; ?></th>
                                        <td><?php echo $row["first_name"] ?></td>
                                        <td><?php echo $row["department"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["mobile_no"] ?></td>
                                        <td><?php echo $row["local_address"] ?></td>
                                        <td><?php echo $row["date_of_joining"] ?></td>
                                        <td>
                                            <a href="edit_employee.php?employee_id=<?php echo $row['employee_id'] ?>"><img height="25px" src="../images/edit1.png"></a>
                                            <a href="delete_employee.php?employee_id=<?php echo $row['employee_id'] ?>"><img height="25px" src="../images/delete-icon.png"></a>
                                        </td>

                                    </tr>
                                    <!--- //end loop data -->
                                    <?php
                                }
                            }else{
								echo '
								  <tr onclick="">
								  <td colspan="8" align="center">No details found</td>
								  </tr>
								  ';
							}
                            ?>
                        </tbody>
                    </table>
                    <!---- end table  -->
                </div>
            </div>
        </div>




        <!--- //end -->

    </body>
</html>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="../js/wizard.js"></script>
<script src="../js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/validation.min.js"></script>  
<script src="../js/classie.js"></script>
<script>

    $().ready(function () {

        $("#emp_reg").click(function () {
            $("#reg_modal").modal('show');

        });
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

<!--validation function script start hear-->
<script>

    $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
    $("#emp_no").keypress(function (e) {

    var key = e.charCode || e.keyCode || 0;
            // only numbers
    if (key < 48 || key > 58) {

    return false;
    }     if (key <= 10) {
    return false;
    }

    });
    $("#reg_with").click(function () {
    $("#login-form").hide();
    $("#reg-form").show();
            });
            /// Registration form validation         
            ///// Registration form validation 


        $("#registerform").validate({
            rules:
                    {
                        enp_f_name: {
                            required: true,
                            minlength: 3
                        },
                        enp_l_name: {
                            required: true,
                            minlength: 3
                        },
                        emp_password: {
                            required: true,
                            minlength: 8,
                            maxlength: 15
                        },
                        emp_cof_password: {
                            required: true,
                            equalTo: '#emp_password'
                        },
                        emp_email: {
                            required: true,
                            email: true
                        },
                        emp_no: {
                            required: true,
                            digits: true
                        },
                        Numbers_Of_Leave: {
                            required: true,
                            digits: true
                        },
                        education: {
                            required: true
                        },
                        local_add: {
                            required: true
                        },
                        emp_par_add: {
                            required: true
                        },
                        emp_alt_no: {
                            required: true,
                            digits: true
                        },
                        emp_family_no: {
                            required: true,
                            digits: true
                        },
                        dob_year: {
                            required: true
                        },
                        employee_id: {
                            required: true
                        },
                        department: {
                            required: true
                        },
                        date_of_joining: {
                            required: true
                        }

                    },
            messages:
                    {
                        enp_f_name: "Please enter first name.",
                        enp_l_name: "Please enter last name.",
                        emp_password: {
                            required: "Please provide a password.",
                            minlength: "Password at least have 8 characters."
                        },
                        emp_email: "Please enter a valid email address.",
                        emp_cof_password: {
                            required: "Please retype your password.",
                            equalTo: "Password doesn't match !"
                        },
                        emp_no: "Please enter Mobile Number.",
                        Numbers_Of_Leave: "Please enter number of leaves.",
                        education: "Please enter education.",
                        local_add: "Please enter local address.",
                        emp_par_add: "Please enter permanent address.",
                        emp_alt_no: "Please enter aleternate number.",
                        emp_family_no: "Please enter family number.",
                        dob_year: "Please enter DOB.",
                        employee_id: "Please enter Employee ID.",
                        department: "Please enter Department.",
                        date_of_joining: "Please enter DOJ."
                    },
            submitHandler: submitForm
        });
                    // submit form 
                            function  submitForm() {
                            var datafrom = $('#registerform').serialize();
                                    $("#reg_button").text('');
                                    $("#reg_button").css({'background': '#fff', 'opacity': '.5'});
                                    $("#reg_button").append("<img src='../images/loader.gif' height='20px' />");
            $.ajax({
                method: "POST",
                url: "employeedb.php",
                data: datafrom,
                success: function (response) {
                    //alert(response);
                    window.setTimeout(function () {
                        window.location = 'employee_management.php';

                    }, 3000)

                    $('#msg').show().text(response);
                    

                },
            });
        }



    });
</script>

<script>

<!-- jquery for fixed the div when open menu -->
                                    $().ready(function () {
                            $('.menuLogo ').click(function () {
                            $("#acc-div").toggleClass('fixed-right');
                            });
                            });</script>

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
                                    $(function () {
                                    $(".datepicker").datepicker();
                                    });</script>
<script type="text/javascript" src="../js/validation.min.js"></script>    <!--lybrary for validation-->

<!--- css for margin-regit div on paid & free Vijy -->
<style>
    .fixed-right{
        margin-right:5px !important;
    }

</style>


<div class="modal fade"  id="reg_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="margin-top:15px;margin-bottom: 15px;">
        <div class="modal-content">

            <div class="modal-body" style="padding:0">
                <div class="image-container " style="padding-top:0 !important">
                    <!--   Creative Tim Branding   -->


                    <!--   Big container   -->
                    <div class="container" style="
                         padding-left: 0;
                         width: 1212px;
                         ">
                        <div class="row">
                            <div class="col-sm-6" style="padding:0">

                                <!--      Wizard container        -->   
                                <div class="wizard-container" style="padding-top:0"> 

                                    <div class="card wizard-card ct-wizard-orange" id="wizardProfile" style="padding:0">
                                        <form action="" method="post" id="registerform" enctype="multipart/form-data">


                                            <ul>
                                                <li><a href="#about" data-toggle="tab">General Details</a></li>
                                                <li><a href="#account" data-toggle="tab">Official Details</a></li>
                                                <li><a href="#address" data-toggle="tab">Bank Details </a></li>

                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane" id="about">

                                                    <div class="row">

                                                        <div class="col-sm-5 col-sm-offset-1">
                                                            <div class="picture-container">
                                                                <div class="picture">
                                                                    <img src="../images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                                    <input type="file" id="wizard-picture" name="image">
                                                                </div>
                                                                <h6>Select  Picture</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 com-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>First Name <small>*</small></label>
                                                                <input type="text" class="form-control" id="enp_f_name" name="enp_f_name"  placeholder="First Name" aria-describedby="basic-addon1">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Last Name <small>*</small></label>
                                                                <input type="text" class="form-control " id="enp_l_name" name="enp_l_name"  placeholder="Last Name" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Mobile No <small>*</small></label>
                                                                <input type="text" class="form-control" placeholder="Contact No" name="emp_no" id="emp_no" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Alternate  No <small>*</small></label>
                                                                <input type="text" class="form-control" placeholder="Alternet Contact No" name="emp_alt_no" id="emp_alt_no" ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Emergency Contact<small>*</small></label>
                                                                <input type="text" class="form-control" placeholder="Family Contact no" name="emp_family_no" id="emp_family_no">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 ">
                                                            <label>Date of birth <small>*</small></label>
                                                            <div class="form-group">

                                                                <select name="dob_day" class="col-md-3 dropdate form-control"style="width: auto" >
                                                                    <option selected disabled="">Day</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                </select>

                                                                <select name="dob_month"class=" col-md-4 dropdate form-control" style="width: auto">
                                                                    <option>Month</option>
                                                                    <option value="1">Jan</option>
                                                                    <option value="2">Feb</option>
                                                                    <option value="3">Mar</option>
                                                                    <option value="4">Apr</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">Jun</option>
                                                                    <option value="7">Jul</option>
                                                                    <option value="8">Aug</option>
                                                                    <option value="9">Sep</option>
                                                                    <option value="10">Oct</option>
                                                                    <option value="11">Nov</option>
                                                                    <option value="12">Dec</option>
                                                                </select>


                                                                <select name="dob_year" class="col-md-5 dropdate form-control" style="width: auto">
                                                                    <option selected disabled="">Year</option>
                                                                    <?php
                                                                    $firstYear = (int) date('Y') - 56;
                                                                    $lastYear = (int) date('Y');
                                                                    for ($i = $firstYear; $i <= $lastYear; $i++) {
                                                                        echo '<option value=' . $i . '>' . $i . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Qualification<small>*</small></label>
                                                                <input type="text" class="form-control" placeholder="Enter qualification" name="education" id="education">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Local Address <small>*</small></label>
                                                                <textarea class="form-control" placeholder="Local Address"  name="local_add" id="local_add"rows="3" id="comment" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Permanent  Address <small>*</small></label>
                                                                <textarea  class="form-control " placeholder="Parmanent Address"  name="emp_par_add" id="emp_par_add"rows="3" id="comment"></textarea>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="account">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Email <small>*</small></label>
                                                                <input type="email" class="form-control" placeholder="Employee Email" name="emp_email" id="emp_email">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Employee  ID <small>*</small></label>
                                                                <input type="text" class="form-control " id="employee_id" name="employee_id"  placeholder="Employee ID" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Department<small>*</small></label>
                                                                <input type="text" class="form-control" placeholder="Enter department" name="department" id="department">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Date of joining<small>*</small></label>
                                                                <input type="text" class="form-control datepicker" id="date_of_joining" name="date_of_joining"  placeholder="Date Of Joining" aria-describedby="basic-addon1" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>No of Leave<small>*</small></label>
                                                                <input type="text" class="form-control " id="Numbers Of Leave" name="Numbers_Of_Leave"  placeholder="Numbers Of Leave" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Password <small>*</small></label>
                                                                <input type="password" class="form-control" placeholder="*********" id="emp_password" name="emp_password">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Confirm password <small>*</small></label>
                                                                <input type="password" class="form-control" placeholder="*******" id="emp_cof_password" name= "emp_cof_password">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="address">
                                                    <div class="row">

                                                        <div class="col-sm-12 ">
                                                            <div class="form-group">
                                                                <label>Bank account No</label>
                                                                <input type="text" class="form-control " id="bank_acc_no" name="bank_acc_no"  placeholder="Account No." aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 ">
                                                            <div class="form-group">
                                                                <label>Bank Name</label>
                                                                <input type="text" class="form-control " id="bank_name" name="bank_name"  placeholder="Bank Name" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>Bank Branch</label>
                                                                <input type="text" class="form-control " id="bank_branch_name" name="bank_branch_name"  placeholder="Bank Branch Name" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label>IFSC code</label>
                                                                <input type="text" class="form-control " id="bank_ifsc" name="bank_ifsc"  placeholder="Ifsc Code" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-footer">
                                                
                                                <div class="pull-right">
                                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                                    <input type='submit' id="reg_button" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Save All' />

                                                </div>

                                                <div class="pull-right" style="padding-right:20px;">
                                                    <input type='button'  style="padding-right:20px;"class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>	
                                        </form>
                                    </div>
                                </div> <!-- wizard container -->
                            </div>
                        </div><!-- end row -->
                    </div> <!--  big container -->



                </div>


            </div>
            <div class="modal-footer" style="padding: 0">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->