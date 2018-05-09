<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/gema-oyarzun/Clase10_mayo9/master/data/peliculas.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-3"><?php print $title;?>,</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h5 class="border-top pt-3"><?php print($csv[$t]['peliculas'])?></h3>
    
    <figure style="height:120px; overflow:hidden; filter: grayscale(80%);">
    
    <img src=
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?> 

    class="img-fluid">
    </figure>

    <p>Año de lanzamiento: <b><?php print($csv[$t]['año'])?></b></p>
    <p>Género: <b><?php print($csv[$t]['genero'])?></b></p>
    <p>Tiempo de duración: <b><?php print($csv[$t]['duracion'])?> min</b></p>
    <p>Español: <b><?php print($csv[$t]['español'])?></b></p>
    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>