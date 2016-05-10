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

    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="top:7%;border-top:1px solid #2C3543">

        <ul style="margin-left:-20%;margin-top:39px">
            <a href="index.php">  <li class="dashboard"><span><img  class="sidenavicons" src="../images/dashboard.png"></span>Dashboard</li></a>
            <a href="user_details">  <li class="tenanticon"><span><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></span>User Management</li></a>
            <a href="user_request">  <li class="energyanalysis"><span><img  class="sidenavicons" src="../images/energyanalysis.png"></span>User Request</li></a>

            <a  href="super_account">  <li class="reports"><span><img  class="sidenavicons" src="../images/reports.png"></span>Account Details</li></a>
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


        <!--- nav bar end -->

        <div class="container-fluid dashboardContainer ">
            <div class="container-fluid dashboardContentHolder">
                <div class="row dashboardgrid">
                    <div class="col-md-12 col-lg-12 col-sm-12 ">
                        <!-- first grid starts -->


                        <div class="col-md-4 col-lg-4 col-sm-4 gridview">
                            <div class="dashboardHeader">
                                <p class="dashboardHeading">Total Company</p>
                                <ul class="dashboardList">
                                    <li>
                                        <?php
                                        include '../dbcon.php';
                                        $q="SELECT * FROM companyreg_tbl where company_status='active'";
                                        $result = mysqli_query($con, $q);
                                        $num_rows = mysqli_num_rows($result);

                                        echo "$num_rows";
                                        ?>

                                    </li>

                                </ul>
                            </div>



                        </div>

                        <!-- first grid ends -->
                        <!-- second grid ends -->
                        <div class="col-md-4 col-lg-4 col-sm-4 gridview">
                            <div class="dashboardHeader">
                                <p class="dashboardHeading">Total Users</p>
                                <ul class="dashboardList">

                                    <li>
                                        <?php
                                        include '../dbcon.php';
                                        $q="SELECT * FROM employee_tbl";
                                        $result = mysqli_query($con, $q);
                                        $num_rows = mysqli_num_rows($result);

                                        echo "$num_rows";
                                        ?>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- second grid ends -->

                        <!---- third grid for pennding requ -->
                        <div class="col-md-4 col-lg-4 col-sm-4 gridview">
                            <div class="dashboardHeader">
                                <p class="dashboardHeading">Panding Request</p>
                                <ul class="dashboardList">
                                    <?php
                                        include '../dbcon.php';
                                        $q="SELECT * FROM companyreg_tbl where company_status='inactive'";
                                        $result = mysqli_query($con, $q);
                                        $num_rows = mysqli_num_rows($result);

                                        echo "$num_rows";
                                        ?>

                                </ul>
                            </div>
                        </div>
                        <!---- end pennding div -->

                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 ">
                        <!-- first grid starts -->
                        <div class="col-md-4 col-lg-4 col-sm-4 gridview alertpf">
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
                                <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/envelope(1).png"/></div>
                                <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Message</div>
                                <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
                            </div>
                            <!-- out for loop here for alarm notification -->
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">User Update</span><br>
                                    <span class="textnormal">a demo user send request for account approval</span>..
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/green-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Request for demo</span><br>
                                    <span class="textnormal">a loren company request for register </span>..
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/green-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Payment renew</span><br>
                                    <span class="textnormal">a company renew payment at 5th may</span>..
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">User Update</span><br>
                                    <span class="textnormal">a demo user send request for account approval</span>..
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/green-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Request for demo</span><br>
                                    <span class="textnormal">a loren company request for register </span>..
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/green-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold">Payment renew</span><br>
                                    <span class="textnormal">a company renew payment at 5th may</span>..
                                </div>
                            </div>



                        </div>

                        <!-- first grid ends -->
                        <!-- second grid ends -->
                        <div class="col-md-4 col-lg-4 col-sm-4 gridview alertpf">
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
                                <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
                                <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Alerts</div>
                                <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
                            </div>


                            <!-- out for loop here for alarm notification -->
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification">
                                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                                <div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/red-dot.png"></div>
                                <div class="col-sm-8 col-md-8 col-lg-8 alarm-notificationtxt2"><span class="textbold" id="show"></span><br>
                                    <span class="textnormal" id="show"></span>
                                </div>
                            </div>


                            <!-- out for loop here for alarm notification -->



                        </div>
                        <!-- second grid ends -->


                        <div class="col-md-4 col-lg-4 col-sm-4 gridview"  id="acc-div"style="float:right; margin-right: 12px;">
                            <div class="dashboardHeader">
                                <p class="dashboardHeading">Free/Paid Accounts</p>
                                <div id="chartdiv"></div>
                                <ul class="dashboardList" >
                                    <li></li>

                                </ul>
                            </div>
                        </div>
                        <!--quick links-->
                        <div class="col-md-4 col-lg-4 col-sm-4" style="padding-right:0">
                            <div class="quick-links  col-md-12 col-lg-12 col-sm-12">
                                <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header">
                                    <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding visibility-hidden">vijay</div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Quick Links</div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
                                </div>
                                <div class=" col-sm-12 col-md-12 col-lg-12 quicklinksContent overflow" style="background:#fff;overflow: auto">
                                    <ul class="quicklinkslist">
                                        <a href="add_users.html"><li class="quicklinksitems"><img src="../images/ati.png"/> &nbsp;&nbsp;&nbsp;Add Company</li></a>
                                        <a href="user_details.php"><li class="quicklinksitems"><img src="../images/upi.png"/> &nbsp;&nbsp;&nbsp;View Company</li></a>
                                        <a href="javascript:void(0)"><li class="quicklinksitems"><img src="../images/upi.png"/> &nbsp;&nbsp;&nbsp;Account Details</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!---- third grid for pennding requ -->

                    <!---- end pennding div -->




                    <div class="col-md-12 col-lg-12 col-sm-12 ">

                        <!--- msg div strat -->


                        <!--msg div end -->
                        <!---- alert start -->

                        <!--- calnder div-->


                        <!--- calnder div end-->


                    </div>

                </div>
            </div></div>
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
<script>

</script>
<script>

    < !-- jquery for fixed the div when open menu -- >
            $().ready(function () {
        $('.menuLogo ').click(function () {
            $("#acc-div").toggleClass('fixed-right');
        });
        $.ajax({
            url: 'count_status.php',
            type: 'get',
            success: function (data) {
                var free_acc = data;
                var chart = AmCharts.makeChart("chartdiv", {
                    "type": "pie",
                    "theme": "light",
                    "dataProvider": [{
                            "title": "24 Paid Account",
                            "value": 3
                        }, {
                            "title": free_acc + "Free Account",
                            "value": free_acc
                        }],
                    "titleField": "title",
                    "valueField": "value",
                    "labelRadius": 5,
                    "radius": "50%",
                    "innerRadius": "60%",
                    "labelText": "[[title]]",
                    "export": {
                        "enabled": true
                    }
                });
            }

        });
        alert(free_acc);




    });
</script>

<!--- css for margin-regit div on paid & free Vijy -->
<style>
    .fixed-right{
        margin-right:5px !important;
    }
</style>

<script type="text/javascript" scr="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        setInterval(function () {
            $("#show").load('ajax_notif.php');
        }, 3000);

    });

</script>
