<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaxy Background</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
    <style>
        body {
    margin: 0;
    padding: 0;
    background: #0d0d0d; /* Dark background color */
    color: #fff; /* Text color, adjust as needed */
}

.galaxy-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 10% 20%, #160d28, transparent 50%),
                radial-gradient(circle at 90% 30%, #250b4d, transparent 50%),
                radial-gradient(circle at 30% 70%, #012d52, transparent 50%),
                radial-gradient(circle at 70% 80%, #06274f, transparent 50%);
    /* Adjust the color stops and positions based on your preference */

    animation: galaxyAnimation 15s linear infinite; /* Optional animation */
}

@keyframes galaxyAnimation {
    0% {
        background-position: 0 0;
    }
    100% {
        background-position: 100% 100%;
    }
}

    </style>
</head>
<body>
    <div class="galaxy-background"></div>

    Lỗi
</body>
</html>
