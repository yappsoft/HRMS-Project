
<div class="container-fluid dashboardContainer ng-scope">
<div class="container-fluid dashboardContentHolder" style="padding: 15px 0px 0px;">
<div class="row tenantgridcontainer">
<div class="addtenantcontainer col-sm-12 col-md-12-col-lg-12">
<div class="addtenantheader col-sm-12 col-md-12 col-lg-12">
  <span>Add / edit tenant</span>
  <img class="pull-right" src="http://127.0.0.1/leviton/images/dashboard/edit2.png" height="22px">
</div>
<div class="addtenantformholder col-sm-12 col-md-12 col-lg-12">
                 <form name="addTenantForm" class="ng-pristine ng-valid">
                   <div class="col-sm-6 col-md-6 col-lg-6">
                     <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Tenant name</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <input type="text" id="tenantname" name="tenantname" placeholder="electricity south wing" class=" tenantform" required="">
                        </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">display name</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                     <input type="text" id="displayname" name="displayname" placeholder="electricity south wing" class=" tenantform" required="">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">Account no.</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="accountno" name="accountno" placeholder="123456789" class=" tenantform" required="">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">tenant address</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <textarea type="text" id="tenantaddr" placeholder="203 options primo" name="tenantaddr" class="  tenantform" required="" style="margin: 0px; height: 75px; width: 230px;"></textarea>
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">tenant group</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <select>
                            <option value="">South Wing</option>
                            <option value="">option1</option>
                            <option value="">option2</option>
                          </select>
                       </div>
                     </div>
                   </div>

                   <div class="col-sm-6 col-md-6 col-lg-6 ">
                     <div class="row">
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">tenant start date</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="tenantaddr" name="tenantaddr" placeholder="19/08/2016" class="small-input  tenantform" required="">
                          <img src="http://127.0.0.1/leviton/images/dashboard/calc.png" height="20px" alt="">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">tenant end date</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="tenantaddr" placeholder="28/08/2016" name="tenantaddr" class="small-input  tenantform" required="">
                            <img src="http://127.0.0.1/leviton/images/dashboard/calc.png" alt="" height="20px">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">billing interval</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                         <select>
                           <option value="">Billing Interval</option>
                           <option value="">option1</option>
                           <option value="">option2</option>
                         </select>
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">last bill date</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="tenantaddr" name="tenantaddr" placeholder="19/04/2016" class="small-input  tenantform" required="">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding tenanttextcolor">next bill date</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="tenantaddr" name="tenantaddr" placeholder="25/08/2016" class="small-input  tenantform" required="">
                       </div>
                       <div class="col-sm-6 col-md-6 col-lg-6 text-right tenantmargin"><span class="tenantpadding  tenanttextcolor">custome rate</span></div>
                       <div class="col-sm-6 col-md-6 col-lg-6 tenantmargin">
                          <input type="text" id="tenantaddr" name="tenantaddr" class="  tenantform" required="">
                       </div>
                     </div>
                   </div>
                   <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                     <ul class="tenantform">
                       <li><a href="">save</a></li>
                          <li><a href="">cancel</a></li>
                             <li><a href="">close</a></li>
                     </ul>
                   </div>
                 </form>
</div>
</div>
<div class="tenanttable col-sm-12 col-md-12 col-lg-12">
  <div class="row addtenanttableholder">
  <div class="tenanttableheader blackbackground col-sm-12 col-md-12 col-lg-12">
      <div class="tenanttableh1 visibility-hidden">55</div>
        <div class="tenanttableh2 visibility-hidden">1</div>
    <div class="tenanttableh3">Meter name</div>
    <div class="tenanttableh4">meter ID</div>
    <div class="tenanttableh5">billing from date</div>
    <div class="tenanttableh6">billing to date</div>
  </div>
  <div class="addtablecontent col-sm-12 col-md-12 col-lg-12 overflow">
       <!-- put for loop here -->
          <div class="tenanttabledata  col-sm-12 col-md-12 col-lg-12">
          <div class="tenanttableh1 ">
          <input class="tenantcheckbox" type="checkbox" name="name" value=""></div>
          <div class="tenanttableh2 ">1.</div>
          <div class="tenanttableh3">Powell motor</div>
          <div class="tenanttableh4">55448894</div>
          <div class="tenanttableh5">28/04/2016</div>
          <div class="tenanttableh6">30/04/2016</div>
          </div>
          <div class="tenanttabledata  col-sm-12 col-md-12 col-lg-12">
          <div class="tenanttableh1 ">
          <input class="tenantcheckbox" type="checkbox" name="name" value=""></div>
          <div class="tenanttableh2 ">1.</div>
          <div class="tenanttableh3">Powell motor</div>
          <div class="tenanttableh4">55448894</div>
          <div class="tenanttableh5">28/04/2016</div>
          <div class="tenanttableh6">30/04/2016</div>
          </div><div class="tenanttabledata  col-sm-12 col-md-12 col-lg-12">
          <div class="tenanttableh1 ">
          <input class="tenantcheckbox" type="checkbox" name="name" value=""></div>
          <div class="tenanttableh2 ">1.</div>
          <div class="tenanttableh3">Powell motor</div>

