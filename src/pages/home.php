<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <title><?= SITE_NAME ?></title>
    <?php $this->method->meta(); ?>
    <?php $this->method->css_lib(); ?>
    <?php $this->method->css_local(["main.css","topbar.css","marketler.css","menu.css"]); ?>
    <?php $this->method->menu(); ?>

  </head>
  <body>
    <div class="col-12">
      <div class="row">
        <div class="col-12 top-bar pt-4 pb-2">
          <?php $this->method->duyuru(); ?>
          <?php $this->method->marketler(); ?>
        </div>
      </div>
      <div class="container">
        <?php $this->method->customer(); ?>
      </div>
    </div>


    <?php $this->method->js_lib(); ?>
    <?php $this->method->js_local(["main.js","marketler.js"]); ?>
  </body>
</html>
