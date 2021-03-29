        <div class="container sign-up">
            <form action="#" method="post">
            <div class="row">
                <input type="hidden" name="url" value="<?= base_url(); ?>">
                <div class="col-md-4">
                    <h4 style="width: 240px; padding-bottom: 5px; border-bottom: 2px solid #015DD6;">Personal Information</h4>
                    <div class="personal_info">
                        <div class="form-group">
                            <label for="">PUM/PUI Code:</label>
                            <input type="text" name="code" class="form-control ln" placeholder="PUM/PUI Code">
                        </div>
                        <div class="row" style="position: relative; top: 5px;">
                            <div class="col-xs-6" style="padding-right: 3px;">
                                <div class="form-group">
                                    <label for="">Age:</label>
                                    <input type="text" name="age" class="form-control mn" placeholder="Age">
                                </div>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px;">
                                <div class="form-group">
                                    <label for="">Sex:</label>
                                    <select name="sex" class="form-control">
                                        <option value="">Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 10px;">
                            <div class="col-xs-6" style="padding-right: 3px;">
                                <div class="form-group">
                                    <label for="">Street/Purok:</label>
                                    <input type="text" name="strt" class="form-control mn" placeholder="Street/Purok">
                                </div>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px;">
                                <div class="form-group">
                                    <label for="">Barangay:</label>
                                    <input name="brgy" class="form-control" placeholder="Barangay">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 15px;">
                            <div class="col-xs-6" style="padding-right: 3px;">
                                <div class="form-group">
                                    <label for="">Municipality:</label>
                                    <input type="text" name="mun" class="form-control mn" placeholder="Municipality">
                                </div>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px;">
                                <div class="form-group">
                                    <label for="">Province:</label>
                                    <input name="prov"class="form-control" placeholder="Province">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 20px;">
                            <div class="col-xs-6" style="padding-right: 3px;">
                                <div class="form-group">
                                    <label for="">Home Telephone:</label>
                                    <input type="text" name="home_tel" class="form-control mn" placeholder="Home Telephone">
                                </div>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px;">
                                <div class="form-group">
                                    <label for="">Mobile:</label>
                                    <input type="text" name="mobile" class="form-control mn" placeholder="Mobile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 id="history" style="width: 160px; padding-bottom: 5px; border-bottom: 2px solid #015DD6;">Travel History</h4>
                    <div class="user_confirm">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">History of Travel (within 14days):</label>
                                    <div class="row" style="padding-right: 15px; padding-left: 30px; padding-bottom: 10px;">
                                        <div class="col-xs-6">
                                            <input name="chk[]" style="height: 18px; width: 18px; margin-top: 7px;" type="radio" placeholder="Username/Student ID" value='yes'>
                                            <h4 style="position: relative; top: -0.2rem; left: 5px; display: inline; color: #015DD6; font-size: 20px;"> YES</h4>
                                        </div>
                                        <div class="col-xs-6" style="padding-left: 0px;">
                                            <input name="chk[]" style="height: 18px; width: 18px; margin-top: 7px;" type="radio" placeholder="Username/Student ID" value='no'>
                                            <h5 style="position: relative; top: -0.2rem; left: 5px; display: inline; color: #015DD6;  font-size: 20px;"> NO</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Port of Exit:</label>
                                    <input type="text" name="port" class="form-control mn" placeholder="Port of Exit">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 5px;">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Airline/Sea Vessel/Vehicle:</label>
                                    <input type="text" name="vehicle" class="form-control fn" placeholder="Airline/Sea/Land">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 10px;">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Flight/Vessel/Bus No. :</label>
                                    <input type="text" name="no" class="form-control fn" placeholder="Flight/Vessel/Bus No">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 15px;">
                            <div class="col-xs-6" style="padding-right: 3px;">
                                <div class="form-group">
                                    <label for="">Date of Departure:</label>
                                    <input type="date" name="departure" class="form-control" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px;">
                                <div class="form-group">
                                    <label for="">Date of Arrival:</label>
                                    <input type="date" name="arrival" class="form-control" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 id="account" style="width: 168px; padding-bottom: 5px; border-bottom: 2px solid #015DD6;">User Accounts</h4>
                    <div class="user">
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" name="user" class="form-control ln" placeholder="Username">
                        </div>
                        
                        <div class="form-group" style="margin-top: -5px;">
                            <label for="">Password:</label>
                            <input type="password" name="pass" class="form-control fn" placeholder="Password">
                        </div>
                        <div class="form-group" style="margin-top: -5px;">
                            <label for="">Confirm Password:</label>
                            <input type="password" name="cfm_pass" class="form-control mn" placeholder="Confirm Password">
                        </div>
                        <div class="row" style="position: relative; top: 5px;">
                            <div class="col-xs-6" style="padding-right: 3px;">
                                <div class="form-group">
                                    <label for="">Date Quarantine Start:</label>
                                    <input type="date" name="strt_q" class="form-control" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                            <div class="col-xs-6" style="padding-left: 0px;">
                                <div class="form-group">
                                    <label for="">Date Quarantine End:</label>
                                    <input type="date" name="end_q" class="form-control" placeholder="mm/dd/yyyy">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative; top: 10px;">
                            <div class="col-xs-12" style="">
                                <div class="form-group">
                                    <label for="">PUM/PUI:</label>
                                    <select name="pum_pui" class="form-control">
                                        <option value="">Select PUM/PUI</option>
                                        <option value="pum">PUM</option>
                                        <option value="pui">PUI</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div align="center" style="position: relative; top: 5px;">
                        <button id="sign_up" class="btn btn-warning"><i class="fa fa-save"></i> SAVE RECORD</button>
                        <h5>Already have an account?<a href="<?= base_url(); ?>pages/form/sign-in"> Sign-in</a></h5>
                    </div> -->
                </div>
            </div>
            <div align="center" style="position: relative; top: 20px;">
                <button type="button" id="sign_up" class="btn btn-warning"><i class="fa fa-save"></i> SAVE RECORD</button>
                <!-- <h5>Already have an account?<a href="<?= base_url(); ?>pages/form/sign-in"> Sign-in</a></h5> -->
            </div>
            </form>
            <!-- <div align="center">
                <button href="#" class="btn btn-warning"><i class="fa fa-pencil"></i> SIGN UP</button>
                 <h5>Already have an account?<a href="<?= base_url(); ?>pages/form/sign-in"> Sign-in Here</a></h5>
            </div> -->
            <p class="text-center" style="margin-top: 20px;">&copy 2020 - All Rights Reserved</p>
            <p class="text-center" style="margin-top: -45px; margin-bottom: 20px;">Developed by: Benigno Entera Ambus Jr.</p>
        </div>
        <script>
            $(document).ready(function(){

                $(document).on('click', '#sign_up', function(e){
                e.preventDefault();
                    if($('input[name="chk[]"]:checked').val() == 'Yes'){

                        if($('input[name="user"]').val() != '' && $('input[name="pass"]').val() != '' && $('input[name="code"]').val() != ''
                            && $('input[name="age"]').val() != '' && $('select[name="sex"]').val() != '' && $('input[name="strt"]').val() != ''
                            && $('input[name="mobile"]').val() != '' && $('input[name="port"]').val() != ''
                            && $('input[name="vehicle"]').val() != '' && $('input[name="no"]').val() != '' && $('input[name="departure"]').val() != ''
                            && $('input[name="arrival"]').val() != '' && $('input[name="brgy"]').val() && $('input[name="mun"]').val()
                            && $('input[name="prov"]').val() && $('input[name="strt_q"]').val() && $('input[name="end_q"]').val()
                            && $('select[name="pum_pui"]').val() != ''){
                            
                            $.ajax({
                                url : '<?= base_url(); ?>user/sign_up',
                                type: 'POST',
                                data : {
                                    user : $('input[name="user"]').val(),
                                    pass : $('input[name="pass"]').val(),
                                    name : $('input[name="code"]').val(),
                                    age  : $('input[name="age"]').val(),
                                    sex  : $('select[name="sex"]').val(),
                                    brgy  : $('input[name="brgy"]').val(),
                                    mun  : $('input[name="mun"]').val(),
                                    prov  : $('input[name="prov"]').val(),
                                    strt  : $('input[name="strt"]').val(),
                                    home : $('input[name="home_tel"]').val(),
                                    mobile : $('input[name="mobile"]').val(),
                                    port : $('input[name="port"]').val(),
                                    vehicle : $('input[name="vehicle"]').val(),
                                    v_no : $('input[name="no"]').val(),
                                    dept : $('input[name="departure"]').val(),
                                    arrv : $('input[name="arrival"]').val(),
                                    start_q : $('input[name="strt_q"]').val(),
                                    end_q : $('input[name="end_q"]').val(),
                                    ask  : $('input[name="chk[]"]:checked').val(),
                                    logs : 'sign-up',
                                    pum_pui: $('select[name="pum_pui"]').val()
                                },
                                success:function(data){
                                    const log_oObj = JSON.parse(data);
                                    console.log(log_oObj);
                                    if(log_oObj.login == true){
                                        alert('Record successfully saved.');
                                        $('form')[0].reset();
                                    }else{
                                        alert(log_oObj.message);
                                    }
                                }
                            });
                        }else{
                            alert('Invalid input, all fields are required!');
                        }
                    }
                    else{

                        if($('input[name="user"]').val() != '' && $('input[name="pass"]').val() != '' && $('input[name="code"]').val() != ''
                            && $('input[name="age"]').val() != '' && $('select[name="sex"]').val() != '' && $('input[name="strt"]').val() != ''
                            && $('input[name="mobile"]').val() != '' && $('input[name="brgy"]').val() && $('input[name="mun"]').val()
                            && $('input[name="prov"]').val() && $('input[name="strt_q"]').val() && $('input[name="end_q"]').val()
                            && $('select[name="pum_pui"]').val() != '' && $('input[name="chk[]"]:checked').length > 0){
                            
                            $.ajax({
                                url : '<?= base_url(); ?>user/sign_up',
                                type: 'POST',
                                data : {
                                    user : $('input[name="user"]').val(),
                                    pass : $('input[name="pass"]').val(),
                                    name : $('input[name="code"]').val(),
                                    age  : $('input[name="age"]').val(),
                                    sex  : $('select[name="sex"]').val(),
                                    brgy  : $('input[name="brgy"]').val(),
                                    mun  : $('input[name="mun"]').val(),
                                    prov  : $('input[name="prov"]').val(),
                                    strt  : $('input[name="strt"]').val(),
                                    home : $('input[name="home_tel"]').val(),
                                    mobile : $('input[name="mobile"]').val(),
                                    port : 'None',
                                    vehicle : 'None',
                                    v_no : 'None',
                                    dept : 'None',
                                    arrv : 'None',
                                    start_q : $('input[name="strt_q"]').val(),
                                    end_q : $('input[name="end_q"]').val(),
                                    ask  : $('input[name="chk[]"]:checked').val(),
                                    logs : 'sign-up',
                                    pum_pui: $('select[name="pum_pui"]').val()
                                },
                                success:function(data){
                                    const log_oObj = JSON.parse(data);
                                    console.log(log_oObj);
                                    if(log_oObj.login == true){
                                        alert('Record successfully saved.');
                                        $('form')[0].reset();
                                    }else{
                                        alert(log_oObj.message);
                                    }
                                }
                            });
                        }else{
                            alert('Invalid input, all fields are required!');
                        }
                    }
                });
            })
        </script>