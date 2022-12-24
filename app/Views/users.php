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
                                                <button class="btn btn-danger" onclick="deleteUser(<?= $d['id']?>)">Delete</button>
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
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                <script>
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
                                    url: "<?= base_url('dashboard/users/delete/')?>/"+id,
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