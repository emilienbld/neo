<div class="inscription form" id="inscription-form">
    <h1>S'inscrire</h1>

    <!-- Message d'erreur d'inscription -->
    <p id="error-message-inscription" class="error" style="display:none;"></p>

    <form method="POST" action="../src/service/inscription.php">
        <label>Prénom :</label>
        <input type="text" name="firstname" required><br>

        <label>Nom :</label>
        <input type="text" name="lastname" required><br>

        <label>Email :</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>

        <button type="submit">S'inscrire</button>
        <a href="?action=connexion"><button type="button">Déjà client ?</button></a>
    </form>

</div>
