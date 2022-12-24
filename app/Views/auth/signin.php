<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
                    <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form id="SignIn">
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Sign In</button>
                      </div>
                    </form>
                      <a href="<?php echo base_url('signup') ?>" class="d-block mt-3 text-muted">Not a user? Sign up</a>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $("#SignIn").submit( function (e) {
                    e.preventDefault();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    if (email.length == "") {
                        Swal.fire({
                        title: 'Oops...',
                        text: 'Email must be filled dumbass!'
                        });
                    } else if(password.length == "") {
                        Swal.fire({
                        title: 'Oops...',
                        text: 'Password must be filled dumbass!'
                        });
                    } else {
                        $.ajax({
                            url: "<?= base_url('signin') ?>",
                            type: "post",
                            dataType: "json",
                            data: {
                                "email": email,
                                "password": password
                            },
                            success:function(respond){
                                if (respond.status == true) {
                                    Swal.fire({
                                        icon: respond.icon,
                                        title: respond.title,
                                        text: respond.text,
                                        timer: 3000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then (function() {
                                        window.location.href = "<?= base_url('dashboard') ?>";
                                    });
                                } else if (respond.status == false) {
                                    Swal.fire({
                                        icon: respond.icon,
                                        title: respond.title,
                                        text: respond.text,
                                    });
                                }
                            },
                            error:function(respond){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Server Error!',
                                });
                            }
                        })
                    }
                }); 
            });
        </script>
<?= $this->endSection() ?>