<div id="content">
    <div id="login_form">
        <h1>Connexion</h1>
        <form action="index.php?action=login">
            <div class="form_item">
                <label for="username">Nom d'utilisateur</label><br />
                <input type="text" id="username" value"utilisateur"><br />
            </div>
            <div class="form_item">
                <label for="password">Mot de passe</label><br />
                <input type="password" id="password"><br />
            </div>
            <input type="submit" class="submit" value="me connecter">
        </form>
    Pas encore de compte ? <a href="" id="register_link">Cr&eacute;er un compte</a>
    </div>
    <div id="register_form" style="display:none;">
        <h1>Cr&eacute;er un compte</h1>
        <form action="index.php?action=login">
            <div class="form_item">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username">
            </div>
            <div class="form_item">
                <label for="password">Mot de passe</label>
                <input type="password" id="password">
            </div>
            <div class="form_item">
                <label for="password">V&eacute;rification mot de passe</label>
                <input type="password" id="password">
            </div>
            <input type="submit" class="submit" value="m'enregister">
        </form>
    D&eacute;j&agrave; un compte ? <a href="" id="login_link">Me connecter</a>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#register_link').click(function(e) {
            e.preventDefault();
            $('#login_form').hide();
            $('#register_form').show();
        });

        $('#login_link').click(function(e) {
            e.preventDefault();
            $('#register_form').hide();
            $('#login_form').show();
        });
    });

</script>