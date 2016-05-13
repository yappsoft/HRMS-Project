<!DOCTYPE html>

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
                            <form class="" id="registerform" method="post">
                                <div class=" col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">First name</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform " id="enp_f_name" name="enp_f_name"  placeholder="First Name" aria-describedby="basic-addon1" required="">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor"> Email</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="email" class="tenantform" placeholder="Employee Email" name="emp_email" id="emp_email" data-toggle="tooltip" data-placement="right" title="fill email" required="">
                                                <label class="error" id="email_error" style="display:none"> </label>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Contact no.</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

                                                <input type="text" class="tenantform" placeholder="Contact No" name="emp_no" id="emp_no" data-toggle="tooltip" data-placement="right" title="Enter contect no.">
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Alternet Contact no.</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform" placeholder="Alternet Contact No" name="emp_alt_no" id="emp_alt_no" ">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Local Address</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <textarea class="tenantform" placeholder="Local Address"  name="local_add" id="local_add"rows="5" id="comment" ></textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Last name</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform " id="enp_l_name" name="enp_l_name"  placeholder="Last Name" aria-describedby="basic-addon1" required="">
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Password</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

                                                <input type="password" class="tenantform" placeholder="*********" id="emp_password" name="emp_password"data-toggle="tooltip" data-placement="right" title="Minimum 8 char">

                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Confirm Password</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="password" class="tenantform" placeholder="*******" id="emp_cof_password" name= "emp_cof_password"data-toggle="tooltip" data-placement="right" title="Type again">

                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Family Contact no.</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <input type="text" class="tenantform" placeholder="Family Contact no" name="emp_family_no" id="emp_family_no">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Parmanent Address</span></div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                <textarea  class="tenantform " placeholder="Parmanent Address"  name="emp_par_add" id="emp_par_add"rows="5" id="comment"></textarea>

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
                                                    <input type="text" class="tenantform " id="education" name="education"  placeholder="Education" aria-describedby="basic-addon1">
                                                </div>  
                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Numbers Of Leave</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="Numbers Of Leave" name="Numbers_Of_Leave"  placeholder="Numbers Of Leave" aria-describedby="basic-addon1">
                                                </div>   

                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Account No.</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="bank_acc_no" name="bank_acc_no"  placeholder="Account No." aria-describedby="basic-addon1" required="">
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Bank Branch name</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="bank_branch_name" name="bank_branch_name"  placeholder="Bank Branch Name" aria-describedby="basic-addon1" required="">
                                                </div>   


                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                                            <div class="row">

                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Date Of Birth</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">

                                                    <select name="dob_day" class="dropdate"style="width: auto" >
                                                        <option >Day</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>

                                                    <select name="dob_month"class="dropdate" style="width: auto">
                                                        <option >Month</option>
                                                        <option value="1">jan</option>
                                                        <option value="2">feb</option>
                                                        <option value="3">mar</option>
                                                    </select>


                                                    <select name="dob_year" class="dropdate" style="width: auto">
                                                        <option >Year</option>
                                                        <option value="1">1990</option>
                                                        <option value="2">1991</option>
                                                        <option value="3">1992</option>
                                                    </select>

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Date Of Joining</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform datepicker" id="date_of_joining" name="date_of_joining"  placeholder="Date Of Joining" aria-describedby="basic-addon1" required="">

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Bank name</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="bank_name" name="bank_name"  placeholder="Bank Name" aria-describedby="basic-addon1" required="">
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Ifsc Code</span></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                                                    <input type="text" class="tenantform " id="bank_ifsc" name="bank_ifsc"  placeholder="Ifsc Code" aria-describedby="basic-addon1" required="">
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Basic detail section of a employ end hear-->
                                <!--submit cancel reset group of buttons-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                        <div class="alert alert-info " id="reposnse"  style="display:none;">

                                        </div>

                                        <ul class="tenantform">
                                            <button type="submit" style="    padding: 10px 20px 10px 20px;
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
                        ///login form validation
                        $("#loginform").validate({
                            rules:
                                    {
                                        password: {
                                            required: true,
                                            minlength: 8,
                                            maxlength: 15
                                        },
                                        email: {
                                            required: true,
                                            email: true
                                        },
                                    },
                            messages:
                                    {
                                        emp_password: {
                                            required: "please provide a password",
                                            minlength: "password at least have 8 characters",
                                        },
                                        emp_email: "please enter a email address",
                                    },
                            submitHandler: submitForm
                        });




                        /// start singup form validation 


                        $("#registerform").validate({
                            rules:
                                    {
                                        emp_f_name: {
                                            required: true,
                                            minlength: 3
                                        },
                                        emp_l_name: {
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
                                        bank_acc_no: {
                                            required: true,
                                            minlength: 3
                                        },
                                        bank_branch_name: {
                                            required: true,
                                            minlength: 3
                                        },
                                        bank_name: {
                                            required: true,
                                            minlength: 3
                                        },
                                        bank_ifsc: {
                                            required: true,
                                            minlength: 3
                                        },
                                    },
                            messages:
                                    {
                                        emp_f_name: "please enter first name",
                                        emp_l_name: "please enter last name",
                                        bank_acc_no: "please enter account number",
                                        bank_name: "please enter bank name",
                                        bank_branch_name: "please enter bank branch",
                                        bank_ifsc: "please enter ifsc code",
                                        emp_password: {
                                            required: "please provide a password",
                                            minlength: "password at least have 8 characters"
                                        },
                                        emp_email: "please enter a valid email address",
                                        emp_cof_password: {
                                            required: "please retype your password",
                                            equalTo: "password doesn't match !"
                                        }
                                    },
                            submitHandler: submitForm
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
                                    window.setTimeout(function () {
                                        window.location = 'employee_management.php';

                                    }, 3000)



                                },
                            });
                        }



                    });
</script>

