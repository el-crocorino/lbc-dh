    Les erreurs suivantes se sont produites : 

    <ul> 

      <?php 

        for ($i = 0; $i < count($dDisplay["errors"]); $i++) { 
          echo "<li class='erreur'>".$dDisplay["errors"][$i]."</li>\n"; 
        }

      ?> 

    </ul> 

    <div class="info"><?php echo $dDisplay["info"] ?></div> 

    <br> 

    <a href="<?php echo $dDisplay["href"] ?>"><?php echo $dDisplay["lien"] ?></a> 