<?php
require '../../vendor/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

if (!isset($_SESSION['user_data'])) {
    header('Location: ../../assets/index.php');
    exit();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paramètres du compte</title>
    <link href="../style/all.css" rel="stylesheet">
    <script>
        function toggleEdit(fieldId) {
            var inputField = document.getElementById('input-' + fieldId);
            var textField = document.getElementById('text-' + fieldId);
            var editButton = document.getElementById('button-' + fieldId);
            var saveButton = document.getElementById('save-' + fieldId);
            var cancelButton = document.getElementById('cancel-' + fieldId);

            if (inputField.style.display === 'none') {
                inputField.style.display = 'inline-block';
                textField.style.display = 'none';
                editButton.style.display = 'none';
                saveButton.style.display = 'inline-block';
                cancelButton.style.display = 'inline-block';
            } else {
                inputField.style.display = 'none';
                textField.style.display = 'inline';
                editButton.style.display = 'inline-block';
                saveButton.style.display = 'none';
                cancelButton.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <?php require_once '../nav/nav.php'; ?>
    <div class="coins d-flex row">
        <div class="menu_g">
            <?php require_once '../menu/menu.php'; ?>
        </div>

        <div class="acount-info">
            <?php
/*            if ($_SESSION['user_data']['role'] == 'user'){
                print('mettre le code user');
                */?>

            <h1>Paramètres de votre compte</h1>
            <h2>Informations du compte</h2>

            <div class="acount-info-user">
                <!-- Modification du prénom -->
                <p>
                    Prénom :
                    <span id="text-firstname">
                            <?php echo isset($_SESSION['user_data']['firstname']) ? htmlspecialchars($_SESSION['user_data']['firstname']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-firstname" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="firstname">
                        <input type="text" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['firstname']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-firstname" onclick="toggleEdit('firstname')">Modifier</button>
                    <button type="submit" class="save-button" id="save-firstname">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-firstname" onclick="toggleEdit('firstname')">Annuler</button>
                </form>
                </p>

                <!-- Modification du nom -->
                <p>
                    Nom :
                    <span id="text-lastname">
                            <?php echo isset($_SESSION['user_data']['lastname']) ? htmlspecialchars($_SESSION['user_data']['lastname']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-lastname" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="lastname">
                        <input type="text" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['lastname']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-lastname" onclick="toggleEdit('lastname')">Modifier</button>
                    <button type="submit" class="save-button" id="save-lastname">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-lastname" onclick="toggleEdit('lastname')">Annuler</button>
                </form>
                </p>

                <!-- Modification de l'email -->
                <p>
                    Email :
                    <span id="text-email">
                            <?php echo isset($_SESSION['user_data']['email']) ? htmlspecialchars($_SESSION['user_data']['email']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-email" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="email">
                        <input type="email" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['email']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-email" onclick="toggleEdit('email')">Modifier</button>
                    <button type="submit" class="save-button" id="save-email">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-email" onclick="toggleEdit('email')">Annuler</button>
                </form>
                </p>

                <!-- Modification de la date de naissance -->
                <p>
                    Date de naissance :
                    <span id="text-date_naissance">
                            <?php echo isset($_SESSION['user_data']['date_naissance']) ? htmlspecialchars($_SESSION['user_data']['date_naissance']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-date_naissance" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="date_naissance">
                        <input type="date" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['date_naissance']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-date_naissance" onclick="toggleEdit('date_naissance')">Modifier</button>
                    <button type="submit" class="save-button" id="save-date_naissance">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-date_naissance" onclick="toggleEdit('date_naissance')">Annuler</button>
                </form>
                </p>

                <!-- Modification de la rue -->
                <p>
                    Rue :
                    <span id="text-rue">
                            <?php echo isset($_SESSION['user_data']['rue']) ? htmlspecialchars($_SESSION['user_data']['rue']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-rue" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="rue">
                        <input type="text" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['rue']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-rue" onclick="toggleEdit('rue')">Modifier</button>
                    <button type="submit" class="save-button" id="save-rue">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-rue" onclick="toggleEdit('rue')">Annuler</button>
                </form>
                </p>

                <!-- Modification de la ville -->
                <p>
                    Ville :
                    <span id="text-ville">
                            <?php echo isset($_SESSION['user_data']['ville']) ? htmlspecialchars($_SESSION['user_data']['ville']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-ville" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="ville">
                        <input type="text" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['ville']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-ville" onclick="toggleEdit('ville')">Modifier</button>
                    <button type="submit" class="save-button" id="save-ville">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-ville" onclick="toggleEdit('ville')">Annuler</button>
                </form>
                </p>

                <!-- Modification du code postal -->
                <p>
                    Code postal :
                    <span id="text-code_postal">
                            <?php echo isset($_SESSION['user_data']['code_postal']) ? htmlspecialchars($_SESSION['user_data']['code_postal']) : 'A renseigner'; ?>
                        </span>

                <form method="POST" action="../../src/service/modification.php" style="display:inline;">
                    <div id="input-code_postal" class="input-field" style="display:none;">
                        <input type="hidden" name="field" value="code_postal">
                        <input type="number" name="value" value="<?php echo htmlspecialchars($_SESSION['user_data']['code_postal']); ?>" required>
                    </div>
                    <button type="button" class="edit-button" id="button-code_postal" onclick="toggleEdit('code_postal')">Modifier</button>
                    <button type="submit" class="save-button" id="save-code_postal">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-code_postal" onclick="toggleEdit('code_postal')">Annuler</button>
                </form>
                </p>

                <!-- Modification du mot de passe -->
                <p>
                    Mot de passe :
                    <span id="text-password">********</span>
                    <button type="button" class="edit-button" id="button-password" onclick="toggleEdit('password')">Modifier</button>
                    <button type="submit" class="save-button" id="save-password">Enregistrer</button>
                    <button type="button" class="cancel-button" id="cancel-password" onclick="toggleEdit('password')">Annuler</button>
                </p>
                <div id="input-password" class="input-field" style="display:none;">
                    <form method="POST" action="../../src/service/modification.php">
                        <input type="hidden" name="field" value="password">
                        <label for="current_password">Mot de passe actuel :</label>
                        <input type="password" id="current_password" name="current_password" required><br>
                        <label for="new_password">Nouveau mot de passe :</label>
                        <input type="password" id="new_password" name="new_password" required><br>
                        <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
                        <input type="password" id="confirm_password" name="confirm_password" required><br>
                        <!-- Enregistrer est géré par le bouton externe -->
                    </form>
                </div>

                <!-- Liens pour se déconnecter et changer de compte -->
                <div class="acount-deco">
                    <a href="../../src/service/deconnexion.php"class="">Changer de compte</a>|
                    <a href="../../src/service/deconnexion.php"class="">Se déconnecter</a>
                </div>
            </div>
        <?php
            if ($_SESSION['user_data']['role'] == 'admin'){
                require_once '../role/admin/admin.php';
        }
        ?>
        </div>
    </div>

</body>
</html>
