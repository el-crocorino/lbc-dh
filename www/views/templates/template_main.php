<html>
  <head>
    <title><?php echo $dDisplay['title'] ?></title>
    <script src="<?php echo $dDisplay['js'] ?>" type="text/javascript"></script>
    <link type="text/css" href="<?php echo $dDisplay['style_url'] ?>" rel="stylesheet" />
  </head>
  <body>
  <pre>
  <?php #print_r(get_defined_vars())?>
  </pre>
    <div id="main">
      <?php
        include $dDisplay['header'];
      ?>
      <hr>
      <?php
        include $dDisplay['menu'];
      ?>
      <hr>
      <?php
        include $dDisplay['content'];
      ?>
    </div>
  </body>
</html>