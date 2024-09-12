<h1>Liste des comptes utilisateurs</h1>
<div class="acount-info-user">
    <table class="user-table">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $allUsers = $_SESSION['all_users'] ?? [];
        $currentUserEmail = $_SESSION['user_data']['email'];

        foreach ($allUsers as $user) :
            ?>
            <tr>
                <td><?= htmlspecialchars($user['firstname']) ?></td>
                <td><?= htmlspecialchars($user['lastname']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>

                <td>
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
                </td>

                <td>
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
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

