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
        if (isset($dDisplay['error_message'])) {
          include $dDisplay['error_message'];
        }        
      ?>
      <div id="content" class="app">
        <h1><?php echo $dDisplay['page_title'] ?></h1>
        <?php
          include $dDisplay['form'];
          include $dDisplay['list'];
        ?>
      </div>
    </div>
  </body>
</html>