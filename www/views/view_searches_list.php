<div id="search_list">        
    <h2>Vos recherches</h2>
    
    <table class="list">
        <tr>
            <th style="width:15%">Cr&eacute;&eacute;e le :</th>
            <th style="width:15%">V&eacute;rifi&eacute;e le :</th>
            <th style="width:55%">Nom</th>            
            <th colspan="2"  style="width:15%">Actions</th>
        </tr>
    <?php 
        foreach ($dDisplay['searches'] AS $key => $search) {

            $search = search::load($dDisplay['searches'][$key]['search_id']);
            
            $table_row =  '<tr>
                    <td><span class="date">' . $search->get_formatted_created() . '</span></td>
                    <td><span class="date">' . $search->get_formatted_updated() . '</span></td>
                    <td><a href="index.php?action=flux_view&search_id=' . $search->get_id() . '">' . $search->get_title() . '</a></td>
                    <td><a href="index.php?action=search_modify&search_id=' . $search->get_id() . '">Modifier</a></td>
                    <td><a href="index.php?action=search_delete&search_id=' . $search->get_id() . '">Supprimer</a></td>
                </tr>'; 

            echo $table_row;
        }
    ?>    
    </table>
</div>