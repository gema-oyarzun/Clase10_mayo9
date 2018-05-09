<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/gema-oyarzun/Clase10_mayo9/master/data/peliculas.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4"><?php print $title;?></h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h3 class="border-top pt-3"><?php print($csv[$t]['peliculas'])?></h3>
    
    <figure style="height:120px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>

    <p>Año de lanzamiento: <?php print($csv[$t]['año'])?></p>
    <p>Género: <?php print($csv[$t]['genero'])?></p>
    <p>Tiempo de duración: <?php print($csv[$t]['duracion'])?> min</p>
    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>