

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet.css" >
    <title>Document</title> 
</head>
<body>
<section class="Gallery-links">
    <div class="Wrapper">
        <h2>image</h2>

        <div class="Gallery-container">
        <?php 
        echo '<div class="gallery-upload">
                <form action="includes/gallery-upload.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="filename" placeholder="filename">
                    <input type="text" name="filetitle" placeholder="Img title">
                    <input type="text" name="filedesc" placeholder="Img description">
                    <input type="file" name="file">
                    <button type="submit" name="submit">Upload your file</button>
                </form>
            </div>';
        $images = scandir("includes/img/");
        // print_r($images);
        for($i = 2; $i < count($images); $i++) {
            echo "<img src=\"includes/img/".$images[$i]."\">";
        }//takes the img from the folder and prints out the img in the gallery 
?>

    </div>
</section>
</body>
</html>