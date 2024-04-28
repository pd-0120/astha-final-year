<?php require_once '../connection.php'; ?>
<?php require_once '../admin_login_check.php'; ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Astha - Real Estate</title>

    <link rel="shortcut icon" href="./../asset/img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./../asset/css/font-icons.css">
    <link rel="stylesheet" href="./../asset/css/plugins.css">
    <link rel="stylesheet" href="./../asset/css/style.css">
    <link rel="stylesheet" href="./../asset/css/responsive.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="../index.php">
            <div class="site-logo">
                <img src="../asset/media/logo1.png" alt="Logo" height="auto" width="30%">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
          <a class="nav-item nav-link" href="admin_dashboard.php">Dashborad</a>
          <a class="nav-item nav-link" href="properties.php">Properties</a>
          <a class="nav-item nav-link" href="categories.php">Property Categories</a>
          <a class="nav-item nav-link" href="contact_us.php">Contacts Us Data</a>
          <a class="nav-item nav-link" href="payment.php">Payments</a>
        </div>

    </div>
    <a href="../logout.php">
        <button class="btn btn-danger my-sm-1">Logout</button>
    </a>
</div>
</nav>