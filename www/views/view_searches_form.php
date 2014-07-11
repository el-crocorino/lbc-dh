<div id="content" class="app">
    <h1>Vos recherches</h1>
    <div id="add_search">
        <h2>Ajouter une recherche</h2>
        <form action="index.php?action=add_search" style="margin:0px">
            <div class="form_item">
                <label for="search_title">Nom de la recherche</label><br />
                <input type="text" name="search_title" id="search_title"> 
            </div>
            <div class="form_item">           
                <label for="search_url">Adresse de la recherche</label><br />
                <input type="text" name="search_url" id="search_url">
            </div>            
            <input type="submit" class="submit" value="Ajouter" style="width:150px; margin-left:85%">
        </form>
    </div>
    <div id="search_list">
        
    </div>
</div>