<!-- Header -->

<?php views('/partials/header') ?>

<h2>Portfolios Location <?php echo env('APP_TITLE'); ?></h2>

<?php  foreach($portfolios as $portfolio): ?>
<li><?php  echo $portfolio['title']; ?></li>
<?php  endforeach; ?>

<!-- Footer -->

<?php views('/partials/footer') ?>