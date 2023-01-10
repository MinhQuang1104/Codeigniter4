<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/icons/favicon.png') ?>">

    <script>
      WebFontConfig = {
        google: {
          families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Shadows+Into+Light:400'],
        },
      };
      (function(d) {
        var wf = d.createElement('script'),
          s = d.scripts[0];
        wf.src = "<?= base_url('assets/js/webfont.js') ?>";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
      })(document);
    </script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">
</head>

<body>
<div class="page-wrapper">
    <div class="top-notice bg-primary text-white">
        <div class="container text-center">
            <h5 class="d-inline-block">Get Up to <b>40% OFF</b> New-Season Styles</h5>
            <a href="category.html" class="category">MEN</a>
            <a href="category.html" class="category ml-2 mr-3">WOMEN</a>
            <small>* Limited time only.</small>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
        <!-- End .container -->
    </div>
    <!-- End .top-notice -->

    <?= $this->include('client/layouts/header') ?>
    <!-- End .header -->

    <main class="main">
        <?= $this->renderSection('content') ?>
        <!-- End .container -->
    </main>
    <!-- End .main -->

    <?= $this->include('client/layouts/footer') ?>
    <!-- End .footer -->
</div>
<!-- End .page-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Plugins JS File -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins.min.js') ?>"></script>

<!-- Main JS File -->
<script src="<?= base_url('assets/js/main.min.js') ?>"></script>
</body>

</html>