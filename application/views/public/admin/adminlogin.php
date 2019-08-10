    <div class="container">
        <?php if ($this->session->flashdata('wrong_password')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_password').'</p>'; ?>
    <?php endif; ?>
    <?php if ($this->session->flashdata('wrong_username')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong_username').'</p>'; ?>
    <?php endif; ?>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading">
                    <h2 class="text-center"> Sign In to <strong class="text-custom">Admin</strong></h2>
                </div>


                <div class="p-20">
                    <div class="row">
                    <form class="form-horizontal m-t-20" action="<?php echo base_url()?>admin/login" method="POST">
                        <div class="form-group ">
                            <div class="col-md-offset-3 col-md-5">
                                <input class="form-control" type="text" required="" placeholder="Username" name="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-5">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-md-offset-3 col-md-2">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-md-offset-3 col-md-5">
                                <a href="#" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot
                                    your password?</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>            
        </div>
        
        

        
        <script>
            var resizefunc = [];
        </script>
    </div>