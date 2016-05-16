<?php
include '../dbcon.php';

if(isset($_SESSION['email'])){
	if($_SESSION['login_type'] != 'superadmin'){
		header('location:index.html');
		
	}
	
}else{
	header('location:../index.html');
}
$sel1 = "select sum(company_status ='active') as act_com,sum(company_status ='inactive') as inact_com from `companyreg_tbl`";
$obj = mysqli_query($con,$sel1);
//var_dump($sel);
if($obj){
while($row= mysqli_fetch_assoc($obj)){

$count_act =$row['act_com'];
$count_inact =$row['inact_com'];

}
}

?>

<!DOCTYPE html>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <script src="../js/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>HRMS </title>
        <link rel="stylesheet" href="../css/animate.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="screen" charset="utf-8">


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
            <a href="index.php">  <li class="dashboard"><label><img  class="sidenavicons" src="../images/dashboard.png"></label>Dashboard</li></a>
            <a href="user_detail.php">  <li class="tenanticon"><label><img  alt="" class="sidenavicons" src="../images/tenanticon.png"></label>User Management</li></a>
            <a href="user_request.php">  <li class="energyanalysis"><label><img  class="sidenavicons" src="../images/energyanalysis.png"></label>User Request</li></a>

            <a  href="javascript:void(o)">  <li class="reports"><label><img  class="sidenavicons" src="../images/reports.png"></label>Account Details</li></a>
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

               
					<li class="dropdown navbar-user open nav_item" id="userOptionsDropdown">
						<button  class="dropdown-toggle navbtn show-menu" data-toggle="dropdown" aria-expanded="true">
							<img src="../images/deflt.gif" class="img-circle"alt="" width="26px" height="26px"> 
							<span class="hidden-xs"><?php echo $_SESSION['username'];?></span> <b class="caret"></b>
						</button>
					
					</li>

                 
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
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3 class="count">
                                            <?php

                                         echo $count_act;
                                            ?>
                                        </h3>

                                        <p>Total Company Register TIll Now</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="user_detail.php" class="small-box-footer">More info <i class="ion ion-arrow-right-c"></i></a>
                                </div>
                            </div>



                        </div>

                        <!-- first grid ends -->
                        <!-- second grid ends -->
                        <div class="col-md-4 col-lg-4 col-sm-4 gridview">
                            <div class="dashboardHeader">
                                <p class="dashboardHeading">Total Users</p>
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3 class="count">
                                            <?php

                                            $sel = "SELECT * FROM employee_tbl";
                                            $query = mysqli_query($con, $sel);
                                            $row = mysqli_num_rows($query);

                                            echo "$row";
                                            ?>
                                        </h3>

                                        <p>Number of users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                    <a href="user_detail.php" class="small-box-footer">More info <i class="ion ion-arrow-right-c"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- second grid ends -->

                        <!---- third grid for pennding requ -->
                        <div class="col-md-4 col-lg-4 col-sm-4 gridview">
                            <div class="dashboardHeader">
                                <p class="dashboardHeading">Pending Request</p>
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3 class="count">
                                            <?php

                                             echo $count_inact;
                                            ?>
                                        </h3>

                                        <p>Total request are pennding for approve </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="user_request.php" class="small-box-footer">More info <i class="ion ion-arrow-right-c"></i></a>
                                </div>
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
                            <div class="col-sm-12 col-md-12 col-lg-12 alarm-quicklinks-header alert_show">
                                <div class="col-sm-4 col-md-4 col-lg-4 text-left no-padding"><img height="22px"src="../images/alarms.png"/></div>
                                <div class="col-sm-4 col-md-4 col-lg-4 text-center no-padding">Alerts</div>
                                <div class="col-sm-4 col-md-4 col-lg-4 text-right no-padding visibility-hidden">vijay</div>
                            </div>


                            <!-- out for loop here for alarm notification -->




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
                                        <a href="user_detail.php"><li class="quicklinksitems"><img src="../images/upi.png"/> &nbsp;&nbsp;&nbsp;View Company</li></a>
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
        $.ajax({
            url: 'ajax_notif.php',
            type: 'get',
            dataType: 'json',
            success: function (d) {
                for (var i = 0; i < d.Data.length; i++) {

                    var msg_type = d.Data[i].msg_type;
                    var notif_msg = d.Data[i].notif_msg;
                    var notif_date = d.Data[i].notif_date;
                    // alert(msg_type);
                    var html_alert = ' <div class="col-sm-12 col-md-12 col-lg-12 alarm-notification remove"><div class="col-sm-1 col-md-1 col-lg-1 alarm-notificationtxt1"><img src="../images/red-dot.png" height="12px" alt="" src="../images/red-dot.png"></div> <div class="col-sm-11 col-md-11 col-lg-11 alarm-notificationtxt2"><span class="textbold">' + msg_type + ' ' + notif_date + '</span><br><span class="textnormal">' + notif_msg + '</span>..</div></div>';
                    $('.alert_show').after(html_alert);
                }


            }
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

<script>

   //jquery for count status
            $().ready(function () {
        $('.menuLogo').click(function () {
            $("#acc-div").toggleClass('fixed-right');
        });
        $.ajax({
            url: 'count_status.php',
            type: 'get',
            dataType: 'json',
            success: function (data) {

                //var json = $.parseJSON(data);
                console.log(data);
                var free_acc = data.free_total;
                var paid_acc = data.paid_total;
                var chart = AmCharts.makeChart("chartdiv", {
                    "type": "pie",
                    "theme": "light",
                    "dataProvider": [{
                            "title": paid_acc + " Paid Account",
                            "value": paid_acc
                        }, {
                            "title": free_acc + " Free Account",
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
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });




    });
</script>

<!--- css for margin-regit div on paid & free Vijy -->
<style>
    .fixed-right{
        margin-right:5px !important;
    }

</style>
