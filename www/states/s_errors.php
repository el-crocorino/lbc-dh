    <?php

      $dDisplay['title'] = $dConfig['webapp']['titre']; 
      $dDisplay['template'] = 'main'; 
      $dDisplay['header'] = $dConfig['views']['header']['url']; 
      $dDisplay['menu'] = $dConfig['views']['menu']['url'];
      $dDisplay['content'] = $dConfig['views']['errors']['url'];
      $dDisplay['style_url'] = $dConfig['style']['url'];
      $dDisplay['js'] = $dConfig['js']['url'];
      $dDisplay['lien'] = 'Retour au formulaire de saisie'; 
      $dDisplay['href'] = 'index.php?action=init'; 

      $type = $dSession['state']['option']; 

      if($type == 'database'){ 
        $dDisplay['info'] = "Veuillez avertir l'administrateur de l'application"; 
      }        


      endSession($dConfig, $dDisplay, $dSession); 
    ?> 