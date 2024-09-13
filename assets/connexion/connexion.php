<div class="connnexion form" id="connexion-form">
    <h1>Se connecter</h1>
    <!-- Message d'erreur de connexion -->
    <p id="error-message-connexion" class="error" style="display:none;"></p>

    <form method="POST" action="../src/service/connexion.php">
        <label>Email :</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>

        <button type="submit">Se connecter</button>
        <a href="?action=inscription"><button type="button" >Pas de compte ?</button></a>
    </form>
</div>
