<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="scripts/validate.js"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Report Server</title>
</head>
<body>
  <section>
    <div id=header>
        <h1>Server Status</h1>
    </div>
    <div class="nav">
      <nav>
        <ul>
            <?php
              include 'scripts/query.php';
              printNav();
             ?>
        </ul>
      </nav>
    </div>
    <div class="content" onload="showStatus()">
    </div>
    </section>
</body>
</html>
