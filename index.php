<?php
// Function to load colors from the JSON file
function loadColors() {
    $colorsFile = 'admin/colors.json';  // Path to your JSON file
    if (!file_exists($colorsFile)) {
        return [];
    }
    return json_decode(file_get_contents($colorsFile), true);
}

// Function to get the hex code for the requested color
function getHexColor($colorName) {
    $colors = loadColors();  // Load the colors dynamically from the JSON file
    return $colors[strtolower(trim($colorName))] ?? 'Color not found!';
}

// Check if it's an AJAX request
if (isset($_GET['color'])) {
    $hexCode = getHexColor($_GET['color']);
    echo $hexCode;  // Return only the hex code (or error message)
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Translator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="external/css/index.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Glitch+Pop&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="col">
        <h1 class="text-center">Universal Color Translator</h1>
        <form id="colorForm" class="mb-3">
            <input type="text" id="colorInput" class="form-control" placeholder="e.g., red, blue, green" />
            <button type="submit" class="btn btn-success w-100 mt-2">Translate</button>
        </form>

        <div id="output" class="output" style="display: none;">
            <strong>Hex Code:</strong> <span class="hexCode" id="hexCode"></span>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#colorForm').submit(function(event) {
        event.preventDefault();
        var color = $('#colorInput').val().trim();

        if (color) {
            $.get('index.php', { color: color }, function(result) {
                var error = result === 'Color not found!';
                $('#hexCode').text(result);

                // Set background color based on hex code if valid
                if (!error && result !== 'Color not found!') {
                    $('#hexCode').css('background-color', result);
                    $('#hexCode').css('color', getTextColor(result)); // Adjust text color for readability
                }

                $('#output')
                    .removeClass('success error') 
                    .addClass(error ? 'error' : 'success')
                    .show();

                setTimeout(function() {
                    $('#output').fadeOut();
                }, 20000); // 20 seconds timer
            }).fail(function() {
                alert('Something went wrong!');
            });
        }
    });

    // Function to determine text color (white or black) for readability
    function getTextColor(hex) {
        var r = parseInt(hex.substr(1, 2), 16);
        var g = parseInt(hex.substr(3, 2), 16);
        var b = parseInt(hex.substr(5, 2), 16);
        var brightness = 0.2126 * r + 0.7152 * g + 0.0722 * b;
        return brightness < 128 ? 'white' : 'black';
    }
</script>

</body>
</html>
