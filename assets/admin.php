<h1>Liste des comptes utilisateurs</h1>
<div class="acount-info-user">
    <table class="user-table">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Récupérer la liste des utilisateurs depuis la session
        $allUsers = $_SESSION['all_users'] ?? [];
        foreach ($allUsers as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['firstname']) . "</td>";
            echo "<td>" . htmlspecialchars($user['lastname']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['role']) . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

