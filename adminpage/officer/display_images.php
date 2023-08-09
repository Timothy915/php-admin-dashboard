<!DOCTYPE html>
<html>
<head>
    <title>Display Images</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
        }

        .image-container img {
            width: 200px;
            height: auto;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        
        .image-container .image-item {
            position: relative;
        }
        
        .image-container .image-item .admin-link {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #fff;
            padding: 5px 10px;
            font-size: 12px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <h2>Display Images</h2>

    <form method="GET" action="display_images.php">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" placeholder="Enter username">
        <button type="submit">Search</button>
    </form>

    <div class="image-container">
        <?php
        $baseURL = 'http://localhost:8080/New/second/uploads/'; // Base URL of your local server
        $folder = '/opt/lampp/htdocs/New/second/uploads/'; // Path to the images folder

        // Get the search term from the URL
        $search = $_GET['search'] ?? '';

        // Get all image files in the folder that match the search term
        $images = glob($folder . $search . ".png");

        // Check if there are any images
        if (!empty($images)) {
            foreach ($images as $image) {
                $filename = basename($image);
                $imagePath = $baseURL . '/uploads/' . $filename;
                echo "<div class='image-item'>";
                echo "<a href='$imagePath' class='admin-link' target='_blank'>View</a>";
                echo "<img src='$imagePath' alt='$filename' class='image-item'>";
                echo "</div>";
            }
        } else {
            echo "No images found.";
        }
        ?>
    </div>
</body>
</html>
