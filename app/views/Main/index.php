<h1>hello 1</h1>

<h3><?= $test?> </h3>

<?php if(!empty($names)):?>
  
  <?php foreach ($names as $name):?>
    <?= $name->id?> => <?= $name->name ?>
    <br>
  <?php endforeach ?>
 
<?php endif; ?>  