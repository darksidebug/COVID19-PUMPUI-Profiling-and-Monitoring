    <div id="myNavbar" class="navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="container">  
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span style="background-color: #fff;" class="icon-bar"></span>
                        <span style="background-color: #fff;" class="icon-bar"></span>
                        <span style="background-color: #fff;" class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">PUM / PUI Profiling and Monitoring</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($this->session->userdata('logged_in') == TRUE && 
                            $this->session->userdata('user_type') == "Client"): ?>
                            <li><a href="<?= base_url(); ?>pages/monitor/check-list"><i class="fa fa-check"></i> SYMPTOM CHECKING</a></li>
                            <li><a href="<?= base_url(); ?>pages/view/checklist-result"><i class="fa fa-list"></i> CHECK LISTS</a></li>	
                            
                        <?php elseif($this->session->userdata('logged_in') == TRUE && 
                            ($this->session->userdata('user_type') == "User" || $this->session->userdata('user_type') == "Admin")): ?>
                            <li><a href="<?= base_url(); ?>pages/monitor/check-list"><i class="fa fa-check"></i> SYMPTOM CHECKING</a></li>
                            <li><a href="<?= base_url(); ?>pages/pum_list/nw-chk-list"><i class="fa fa-check"></i> CHECK LISTS</a></li>
                            <li><a href="<?= base_url(); ?>pages/credentials/sign-up"><i class="fa fa-plus"></i> ADD PUM/PUI</a></li>
                        <?php elseif($this->session->userdata('logged_in') == TRUE && 
                            ($this->session->userdata('user_type') == "Faculty")): ?>
                            <li><a href="<?= base_url(); ?>pages/monitor/check-list"><i class="fa fa-check"></i> SYMPTOM CHECKING</a></li>
                            <li><a href="<?= base_url(); ?>pages/credentials/sign-up"><i class="fa fa-plus"></i> ADD PUM/PUI</a></li>
                        <?php endif; ?>
                        
                        <?php if($this->session->userdata('logged_in') == TRUE && 
                            $this->session->userdata('user_type') == "Admin"): ?>
                            <li><a href="<?= base_url(); ?>pages/credentials/users"><i class="fa fa-user-circle"></i> ADD USER</a></li>
                        <?php endif; ?>
                        
                        <?php if($this->session->userdata('logged_in') == FALSE): ?>
                            <li><a href="<?= base_url(); ?>pages/credentials/sign-in"><i class="fa fa-lock"></i> SIGN-IN</a></li>
                        <?php endif; ?>

                        <?php if($this->session->userdata('logged_in') == TRUE): ?>
                            <li><a href="<?= base_url() ?>user/user"><i class="fa fa-power-off"></i> SIGN-OUT</a></li>
                        <?php endif; ?>
                		
                    </ul>
                </div>
            </div>
        </div>
    </div>