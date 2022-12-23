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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($content as $d): ?>
                                        <tr>
                                            <td><?= $d['name'] ?></td>
                                            <td><?= $d['email'] ?></td>
                                            <td><?= $d['created_at'] ?></td>
                                            <td><?= $d['updated_at'] ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
<?= $this->endSection() ?>