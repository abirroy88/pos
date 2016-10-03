<?php
$success = $this->session->flashdata('success');
if ($success) {
    ?>	
    <div class="box box-info">
        <div class="box-body">
            <div class="callout callout-info">
                <?php
                echo $success;
                ?>
            </div>
        </div><!-- /.box-body -->
    </div>
    <?php
}
?>
<?php
$failed = $this->session->flashdata('failed');
if ($failed) {
    ?>	
    <div class="box box-info">
        <div class="box-body">
            <div class="callout callout-warning">
                <?php
                echo $failed;
                ?>
            </div>
        </div><!-- /.box-body -->
    </div>
    <?php
}
?>

<div class="row">
    <div class="col-sm-12"> 
        <ul class="nav nav-tabs"> 
            <li class="active"> 
                <a href="#home1" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                    <span class="hidden-xs">Details </span> 
                </a> 
            </li> 
            <li class=""> 
                <a href="#profile1" data-toggle="tab" aria-expanded="true"> 
                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                    <span class="hidden-xs">Sign-in</span> 
                </a> 
            </li> 
            <li class=""> 
                <a href="#messages1" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                    <span class="hidden-xs">Sales</span> 
                </a> 
            </li> 
            <li class=""> 
                <a href="#settings1" data-toggle="tab" aria-expanded="false"> 
                    <span class="visible-xs"><i class="fa fa-envelope"></i></span> 
                    <span class="hidden-xs">Work orders</span> 
                </a> 
            </li>  
        </ul> 
        <div class="tab-content"> 
            <div class="tab-pane active" id="home1"> 
                <div class="card-box table-responsive" >
                    <form action="<?php echo base_url(); ?>inventory/insertproduct" id="addForm" name="addForm" method="post" accept-charset="utf-8" class="form-horizontal">


                        <div class="row" style="padding-bottom: 10px">
                            <button id="loading" style="display: none " disabled="disabled" class="btn btn-warning waves-effect waves-light  btn-xs">Working...
                            </button>
                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5  btn-xs pull-right" style="margin-left: 10px;margin-right: 15px;">
                                Reset
                            </button>
                            <button id="submit" name="submit" class="btn btn-primary waves-effect waves-light  btn-xs pull-right" type="submit">Submit
                            </button>

                        </div>


                        <div class="row">
                            <div class="col-lg-6 text-left ">
                                <label class="control-label">Basic</label>

                                <table class="table table-hover">                                 
                                    <tbody>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">First Name</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Last Name</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Role</label></td>
                                            <td style="padding: 0px">
                                                <select id="type" name="type" class="form-control input-sm">
                                                    <option value="">Select Role</option>  
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td style="padding:  0 0 0 0;"><label class="control-label">Contact</label></td></tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Mobile</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Phone</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Email</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr><td style="padding:  0 0 0 0;"><label class="control-label">Reference Details</label></td></tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Name</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Mobile</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Phone</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>

                            <div class="col-lg-6 text-left ">
                                <label class="control-label">Address</label>

                                <table class="table table-hover">                                 
                                    <tbody>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Address</label></td>
                                            <td style="padding: 0px" colspan="2"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Address 2</label></td>
                                            <td style="padding: 0px" colspan="2"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">City</label></td>
                                            <td style="padding: 0px" colspan="2"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">State</label></td>
                                            <td style="padding: 0px" colspan="2"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Zip</label></td>
                                            <td style="padding: 0px" colspan="2"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Country</label></td>
                                            <td style="padding: 0px">

                                                <select id="country" name="country" class="form-control input-sm">
                                                    <?php if ($editvendor->country == '') { ?>
                                                        <option value="">Select a Country</option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $editvendor->country; ?>"><?php echo $editvendor->country; ?></option>
                                                    <?php } ?>                                

                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CI">Côte d'Ivoire</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="CD">Democratic Republic of the Congo</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="TP">East Timor</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FO">Faeroe Islands</option><option value="FK">Falkland Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="MK">Former Yugoslav Republic of Macedonia</option><option value="FR">France</option><option value="FX">France, Metropolitan</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard and Mc Donald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Marianas</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestine</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Islands</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option value="SH">Saint Helena</option><option value="PM">St. Pierre and Miquelon</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen Islands</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="BS">The Bahamas</option><option value="GM">The Gambia</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="VI">US Virgin Islands</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna Islands</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </td>                                        </tr>

                                        <tr><td style="padding:  20px 0 0 0;"><label class="control-label">Documents</label></td></tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">CV</label></td>
                                            <td style="padding: 0px"><input type="file" id="filestyle-1" name="price" placeholder="0" class="form-control input-sm" value="Upload"></td>
                                            <td style="padding: 0px"><input type="file" id="filestyle-1" name="price" placeholder="0" class="form-control input-sm" value="Download"></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">ID Card</label></td>
                                            <td style="padding: 0px"><input type="file" id="filestyle-1" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                            <td style="padding: 0px"><input type="file" id="filestyle-1" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Photo</label></td>
                                            <td style="padding: 0px"><input type="file" id="filestyle-1" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                            <td style="padding: 0px"><input type="file" id="filestyle-1" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                    </tbody>
                                </table>                                

                            </div>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="tab-pane" id="profile1"> 
                <div class="card-box table-responsive">
                    <form action="<?php echo base_url(); ?>inventory/insertproduct" id="addForm" name="addForm" method="post" accept-charset="utf-8" class="form-horizontal">
                        <div class="row" style="padding-bottom: 10px">
                            <button id="loading" style="display: none " disabled="disabled" class="btn btn-warning waves-effect waves-light  btn-xs">Working...
                            </button>
                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5  btn-xs pull-right" style="margin-left: 10px;margin-right: 15px;">
                                Reset
                            </button>
                            <button id="submit" name="submit" class="btn btn-primary waves-effect waves-light  btn-xs pull-right" type="submit">Submit
                            </button>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="control-label">Change/ Create Employee Access</label>

                                <table class="table-bordered  table table-hover">                                 
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Email address</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Password</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Retype Password</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>                                       
                                    </tbody>
                                </table>


                            </div>

                            <div class="col-lg-6 text-left "> 

                                <label class="control-label" style="">Employee Limit</label>

                                <table class="table-bordered  table table-hover">                                 
                                    <tbody>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Maximum</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Available </label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </form>
                </div>
            </div> 
            <div class="tab-pane" id="messages1"> 
                <div class="card-box table-responsive" style=""> 
                    <div class="row">

                        <form action="<?php echo base_url(); ?>inventory/insertproduct" id="addForm" name="addForm" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="col-sm-8">
                                <table class="table-bordered  table table-hover">                                 
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value="Type Item Name…"></td>
                                            <td style="padding: 0 0 0 5px;"><input class="form-control input-daterange-datepicker input-sm" name="daterange" value="01/01/2016 - 01/31/2016" type="text"></td>
                                            <td style="padding: 0px"><a data-animation="fadein" class="btn btn-default btn-sm" style="width: 100%;">Search</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-12">
                                <div class="box box-default"> 
                                    <div class="box-heading"> 
                                        <h4 class="box-title"> 
                                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" aria-expanded="false" class="collapsed">
                                                Advance Search
                                            </a> 
                                        </h4> 
                                    </div> 
                                    <div id="collapseOne-2" class="panel-collapse collapse"> 
                                        <div class="box-body">
                                            <table class="table-bordered  table table-hover no-margin no-padding">                                 
                                                <tbody>
                                                    <tr class="none-border">
                                                        <td style="padding: 0 0 0 0;">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Item Type</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0 0 0 10px;">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Category</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>                                                        
                                                        <td style="padding: 0 0 0 10px;">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Manufacturer</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <table class="table-bordered  table table-hover no-margin no-padding">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding: 0px">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Discount Level</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0 0 0 10px;">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Sales Tax</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0 0 0 10px;">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Payment Type</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0 0 0 10px;">
                                                            <select id="type" name="type" class="form-control input-sm">
                                                                <option value="">Select Payment Status</option>  
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div> 
                                </div>
                            </div>

                        </form>


                        <div class="col-lg-12 text-left " style="padding-top: 15px;">                                

                            <table class="table table-bordered m-0">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Cost</th>
                                        <th>Profit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>                               

                        </div>

                        <div style="border: 1px #000000;">
                            <label class="control-label col-lg-12" style="padding-top: 25px;">Totals</label>


                            <div class="col-sm-4 text-left">
                                <table class="table-bordered  table table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 50%; background-color: lightgray;"><label class="control-label">Sub Total</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 50%; background-color: lightgray;"><label class="control-label">Discount</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 50%; background-color: lightgray;"><label class="control-label">Total w/discount</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 50%; background-color: lightgray;"><label class="control-label">Total w/Tax</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-4 text-left">
                                <table class="table-bordered  table table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Taxed</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Not Taxed</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-3 text-left">
                                <table class="table-bordered  table table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Cost</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Profit</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:  0 0 0 5px; width: 30%; background-color: lightgray;"><label class="control-label">Margin</label></td>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value=""></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>



                    </div>

                </div>
            </div> 
            <div class="tab-pane" id="settings1"> 
                <div class="card-box table-responsive">
                    <div class="row"> 
                        <form action="<?php echo base_url(); ?>inventory/insertproduct" id="addForm" name="addForm" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="col-sm-8 text-left">
                                <table class="table-bordered  table table-hover">                                 
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value="Customer Name…"></td>
                                            <td style="padding: 0 0 0 5px;"><input class="form-control input-daterange-datepicker input-sm" name="daterange" value="01/01/2016 - 01/31/2016" type="text"></td>
                                            <td style="padding: 0px">

                                                <select id="type" name="type" class="form-control input-sm">
                                                    <option value="">Select Status</option>  
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </td>
                                            <td style="padding: 0px"><a data-animation="fadein" class="btn btn-default btn-sm" style="width: 100%; margin-left:5px;">Search</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                            <div class="col-lg-12 text-left" style="padding-top: 25px;">
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>ID</th>
                                            <th>Customer name</th>
                                            <th>Receive Date</th>
                                            <th>Delivery Date</th>
                                            <th>Days Overdue</th>
                                            <th>Total</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Otto</td>
                                        </tr>
                                    </tbody>
                                </table>  

                            </div>
                    </div>
                    </form>
                </div>
            </div>             
        </div> 
    </div> 
</div>