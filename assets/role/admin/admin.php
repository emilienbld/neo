<h1>Liste des comptes utilisateurs</h1>
<div class="acount-info-admin">
    <div class="table-responsive">
        <!-- En-têtes -->
        <div class="user-headers d-flex flex-row justify-content-between">
            <p>Prénom</p>
            <p>Nom</p>
            <p>Email</p>
            <p>Rôle</p>
            <p>Action</p>
        </div>
        <!-- Liste des utilisateurs -->
        <div class="user-list">
            <?php
            $allUsers = $_SESSION['all_users'] ?? [];
            $currentUserEmail = $_SESSION['user_data']['email'];
            foreach ($allUsers as $user) :
                ?>
                <div class="user-row d-flex flex-row justify-content-between">
                    <div><?= htmlspecialchars($user['firstname']) ?></div>
                    <div><?= htmlspecialchars($user['lastname']) ?></div>
                    <div><?= htmlspecialchars($user['email']) ?></div>

                    <div>
                        <?php if ($user['role'] == 'admin' || $user['email'] == $currentUserEmail): ?>
                            <?= htmlspecialchars($user['role']) ?>
                        <?php else: ?>
                            <form method="POST" action="../../src/service/modif_user.php" style="display:inline;">
                                <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                                <select name="new_role">
                                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Utilisateur</option>
                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <button type="submit" class="save-user" name="action" value="modify_role">Modifier</button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php if ($user['email'] == $currentUserEmail): ?>
                            <form method="POST" action="../../src/service/modif_user.php" style="display:inline;">
                                <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                                <button type="submit" class="delete-user" name="action" value="delete_user" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre propre compte ?');">Supprimer mon compte</button>
                            </form>
                        <?php elseif ($user['role'] != 'admin'): ?>
                            <form method="POST" action="../../src/service/modif_user.php" style="display:inline;">
                                <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                                <button type="submit" class="delete-user" name="action" value="delete_user" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                            </form>
                        <?php else: ?>
                            Non autorisé
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
