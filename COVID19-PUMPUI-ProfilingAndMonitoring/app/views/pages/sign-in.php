    <div class="container sign-in">
        <div class="row">
            <input type="hidden" name="url" value="<?= base_url(); ?>">
            <div class="col-md-4 col-md-offset-4">
                <h4>Please fill in your credentials</h4>
                <form action="#" method="post">
                    <div class="user">
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" class="form-control ln" name="user" placeholder="Username">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" class="form-control fn" name="pass" placeholder="Password">
                        </div>
                    </div>
                    <!-- <h5>Forgot password?<a href="#"> Reset</a></h5> -->
                    <div align="center">
                        <button type="button" id="sign_in" class="btn btn-warning"><i class="fa fa-lock"></i> SIGN IN</button>
                        <!-- <h5>Don't have account yet?<a href="<?= base_url(); ?>pages/form/sign-up"> Sign-up</a></h5> -->
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center">&copy 2020 - All Rights Reserved</p>
        <p class="text-center" style="margin-top: -45px; margin-bottom: 20px;">Developed by: Benigno Entera Ambus Jr.</p>
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '#sign_in', function(e){
                e.preventDefault();
                if($('input[name="user"]').val() != '' && $('input[name="pass"]').val() != ''){
                    $.ajax({
                        url: $('input[name="url"]').val()+'user/sign_in',
                        type: 'POST',
                        data: {
                            user : $('input[name="user"]').val(),
                            pass : $('input[name="pass"]').val(),
                            logs : 'sign-in'
                        },
                        success:function(data){
                            const log_oObj = JSON.parse(data);
                            console.log(log_oObj);
                            if(log_oObj.login == true){
                                alert('You are now logged in.');
                                if(log_oObj.user_type == 'Client'){
                                    window.location.href = $('input[name="url"]').val()+'pages/monitor/check-list';
                                }else if(log_oObj.user_type == 'User' || log_oObj.user_type == 'Admin'){
                                    window.location.href = $('input[name="url"]').val()+'pages/pum_list/nw-chk-list';
                                } 
                            }else{
                                alert(log_oObj.message);
                            }
                        }
                    });
                }else{
                    alert('Invalid input, all fields are required!');
                }
            });
        })
    </script>
