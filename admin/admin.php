<?php
// Start the session to store messages temporarily
session_start();

// Load existing colors from the JSON file
$colorsFile = 'colors.json';
if (!file_exists($colorsFile)) {
    $colors = [];
} else {
    $colors = json_decode(file_get_contents($colorsFile), true);
}

// Handle color addition or update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $colorName = trim($_POST['colorName']);
    $hexCode = trim($_POST['hexCode']);
    if (!empty($colorName) && preg_match('/^#[a-fA-F0-9]{6}$/', $hexCode)) {
        $colors[$colorName] = $hexCode;
        file_put_contents($colorsFile, json_encode($colors, JSON_PRETTY_PRINT));
        $_SESSION['message'] = 'Color added/updated successfully!';
    } else {
        $_SESSION['error'] = 'Invalid input: Please ensure the color name is not empty and the hex code is in valid format.';
    }
    // Redirect to prevent resubmission of the form and avoid double messages
    header('Location: admin.php');
    exit();
}

// Handle color deletion
if (isset($_GET['delete'])) {
    $colorToDelete = $_GET['delete'];
    if (isset($colors[$colorToDelete])) {
        unset($colors[$colorToDelete]);
        file_put_contents($colorsFile, json_encode($colors, JSON_PRETTY_PRINT));
        $_SESSION['message'] = 'Color deleted successfully!';
    } else {
        $_SESSION['error'] = 'Color not found!';
    }
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Color Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="external/css/admin.css?ver=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Glitch+Pop&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">Manage Colors</h1>

    <!-- Display success or error message -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success" id="successMessage"><?= htmlspecialchars($_SESSION['message']) ?></div>
        <?php unset($_SESSION['message']); ?> <!-- Clear message after displaying -->
    <?php elseif (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" id="errorMessage"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php unset($_SESSION['error']); ?> <!-- Clear error after displaying -->
    <?php endif; ?>

    <!-- Color Add/Update Form -->
    <form action="admin.php" method="POST" class="mb-4">
        <div class="form-group mb-3">
            <label for="colorName">Color Name</label>
            <input type="text" id="colorName" name="colorName" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="hexCode">Hex Code</label>
            <input type="text" id="hexCode" name="hexCode" class="form-control" required pattern="^#[a-fA-F0-9]{6}$">
        </div>

        <button type="submit" class="btn btn-primary">Add / Update Color</button>
    </form>

    <!-- Display Existing Colors -->
    <h2 class="text-center mb-3">Existing Colors</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Color Name</th>
                <th>Hex Code</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($colors as $name => $hex): ?>
                <tr>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td style="background-color: <?= htmlspecialchars($hex) ?>;"><?= htmlspecialchars($hex) ?></td>
                    <td>
                        <a href="admin.php?delete=<?= urlencode($name) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this color?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Add Custom JS for Timer -->
<script>
    window.onload = function() {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
        }

        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 3000);
        }
    };
</script>

</body>
</html>
