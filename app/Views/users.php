<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>
                <div class="row">
					<div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Data Table</h6>
                                <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($content as $d): ?>
                                        <tr>
                                            <td><?= $d['name'] ?></td>
                                            <td><?= $d['email'] ?></td>
                                            <td><?= $d['created_at'] ?></td>
                                            <td><?= $d['updated_at'] ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-icon" onclick="deleteUser(<?= $d['id']?>)"><i data-feather="trash"></i></button>
                                                <button class="btn btn-primary btn-icon" onclick="editUser(<?= $d['id']?>)"><i data-feather="edit"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="id"/>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Full Name</label>
                                        <div class="col-md">
                                            <input name="name" placeholder="Full Name" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email Address</label>
                                        <div class="col-md">
                                            <input name="email" placeholder="Email Address" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveUser()">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                <script>
                    function editUser(id) {
                        save_method = 'update';
                        $('#form')[0].reset(); 
                        <?php header('Content-type: application/json'); ?>
                        $.ajax({
                            url : "<?= base_url('dashboard/users/edit')?>/" + id,
                            type: "GET",
                            dataType: "JSON",
                            success: function(respond)
                            {
                                console.log(respond.data);

                                $('[name="id"]').val(respond.data.id);
                                $('[name="name"]').val(respond.data.name);
                                $('[name="email"]').val(respond.data.email);

                                $('#exampleModal').modal('show');
                                $('.modal-title').text('Edit User'); 

                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                alert('Error get data from ajax');
                            }
                        });
                    }

                    function saveUser() {
                        var url;
                        if(save_method == 'add') {
                            url = "<?= base_url('dashboard/users/add')?>";
                        } else {
                            url = "<?= base_url('dashboard/users/update')?>";
                        }

                        $.ajax({
                            url : url,
                            type: 'POST',
                            data: $('#form').serialize(),
                            dataType: "JSON",
                            success: function(data){
                                location.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                alert('Error adding / update data');
                            }
                        });
                    }

                    function deleteUser(id) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then(function (result) {
                            if (result.value) {
                                $.ajax({
                                    url: "<?= base_url('dashboard/users/delete')?>/"+id,
                                    type: "GET",
                                    dataType: 'JSON',
                                    success: function (data) {
                                        swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'User  deleted successfully',
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        swal.fire("!Opps ", "Something went wrong, try again later", "error");
                                    }
                                });
                            };
                        });
                    }
                </script>
<?= $this->endSection() ?>