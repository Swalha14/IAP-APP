<?php
require_once 'ClassAutoLoad.php';   // loads $conn and config

try {
    // Fetch all users ordered by username (ascending)
    $stmt = $conn->query("SELECT username, email, created_at FROM users ORDER BY username ASC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) === 0) {
        echo "<p>No users have registered yet.</p>";
    } else {
        echo "<h2>Registered Users</h2>";
        echo "<ol>"; // numbered list
        foreach ($users as $user) {
            echo "<li>";
            echo "<b>" . htmlspecialchars($user['username']) . "</b> ";
            echo "(" . htmlspecialchars($user['email']) . ") ";
            echo " - Joined: " . $user['created_at'];
            echo "</li>";
        }
        echo "</ol>";
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
