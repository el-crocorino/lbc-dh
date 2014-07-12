<div id="search_list">        
    <h2>Vos recherches</h2>
    <?php 
        foreach ($dDisplay['searches'] AS $key => $search) {
            echo $dDisplay['searches'][$key]['search_id'] . ' - ' . $dDisplay['searches'][$key]['search_title'] . ' - ' . $dDisplay['searches'][$key]['search_updated'] ;
            echo '<br />';
        }
     ?>
</div>