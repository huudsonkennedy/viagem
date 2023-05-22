
<!doctype html>
<html lang="pt-br" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Viagem 2023</title>

     <?= $this->Html->css([
  'bootstrap.min'
    ]) ?>

      <!-- Template Main JS File -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

     <?= $this->Html->script([
       'bootstrap.bundle.min','bootstrap.min'

    ]) ?>
    <?= $this->fetch('script') ?>
  </head>
  <body>
  <?= $this->fetch('content') ?>
  </body>
</html>
