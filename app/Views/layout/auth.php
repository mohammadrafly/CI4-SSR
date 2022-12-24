<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CI4 SSR</title>
	<link rel="stylesheet" href="<?= base_url('assets/vendors/core/core.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/fonts/feather-font/css/iconfont.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/demo_1/style.css')?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png')?>" />
</head>
<body>

    <div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">
                                        
                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                    <?= $this->renderSection('content') ?>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
    
    <script src="<?= base_url('assets/vendors/core/core.js')?>"></script>
	<script src="<?= base_url('assets/vendors/feather-icons/feather.min.js')?>"></script>
	<script src="<?= base_url('assets/js/template.js')?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  </body>
</html>