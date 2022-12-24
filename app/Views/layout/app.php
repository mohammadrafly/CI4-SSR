<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CI4 SSR</title>
	<link rel="stylesheet" href="<?= base_url('assets/vendors/core/core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fonts/feather-font/css/iconfont.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/demo_1/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ?>" />
</head>
<body>
    <div class="main-wrapper">
        <?= $this->include('layout/sidebar') ?>
        <div class="page-wrapper">
            <?= $this->include('layout/navbar') ?>
            <div class="page-content">
                <?= $this->renderSection('content') ?>
            </div>
            <?= $this->include('layout/footer') ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/vendors/datatables.net/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') ?>"></script>
    <script src="<?= base_url('assets/js/data-table.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/core/core.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/chartjs/Chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jquery.flot/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jquery.flot/jquery.flot.resize.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/apexcharts/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/progressbar.js/progressbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/feather-icons/feather.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/template.js') ?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
    <script src="<?= base_url('assets/js/datepicker.js') ?>"></script>
    <?= $this->renderSection('script') ?>
            <script>
                function signOut() {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to sign out?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, I Want to Sign Out!'
                        }).then(function (result) {
                            if (result.value) {
                                $.ajax({
                                    url: "<?= base_url('signout')?>",
                                    type: "GET",
                                    dataType: 'JSON',
                                    success: function (respond) {
                                        swal.fire({
                                            icon: respond.icon,
                                            title: respond.title,
                                            text: respond.text,
                                            showCancelButton: false,
                                            showConfirmButton: false,
                                            timer: 3000
                                        }).then (function() {
                                            window.location.href = "<?= base_url('/') ?>";
                                        });
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        swal.hideLoading();
                                        swal.fire("!Opps ", "Something went wrong, try again later", "error");
                                    }
                                });
                            };
                        });
                }
            </script>
</body>
</html> 