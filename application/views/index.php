<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-4.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css" />
    <title><?=$title?></title>
  </head>
  <body>
    <?php $this->load->view($view_path)?>
    <!-- BEGIN SCRIPTS -->
    <script src="<?= base_url() ?>assets/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/bootstrap-4.1.1/dist/js/bootstrap.min.js"></script>
    <script>base_url = "<?= base_url() ?>"</script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/main.js"></script>
    <!-- END SCRIPTS -->
  </body>
</html>
