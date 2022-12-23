<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
                    <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" autocomplete="Username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="mt-3">
                        <a href="javascript:void(0);" id="SignUp" class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Sing up</a>
                      </div>
                      <a href="<?= base_url('signin')?>" class="d-block mt-3 text-muted">Already a user? Sign in</a>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $("#SignUp").click( function() {
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    if (name.length == "") {
                        Swal.fire({
                        title: 'Oops...',
                        text: 'Name must be filled dumbass!'
                        });
                    } else if(email.length == "") {
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
                            url: "<?= base_url('signup') ?>",
                            type: "post",
                            dataType: "json",
                            data: {
                                "name": name,
                                "email": email,
                                "password": password
                            },
                            success:function(respond){
                                if (respond.status == true) {
                                    Swal.fire({
                                        icon: respond.icon,
                                        title: respond.title,
                                        text: respond.text,
                                    });
                                    $("#name").val('');
                                    $("#email").val('');
                                    $("#password").val('');
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