<?php
 // Retrieve file details from the uploaded fil and  Check if the form was submitted
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $filename = $file["name"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];
    // Split the filename to extract the extension of the file
    $fileExt = explode(".", $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png", "gif");
// Define allowed file types  and  wich types of  file is allowed 
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 20000000) 
                    // Check for errors during the  time that file is getting  upload  and Check if the file size is within the limit (less than 20MB)
                $newFilename = $_POST['filename'] ? $_POST['filename'] : "gallery";
                $newFilename = strtolower(str_replace(" ", "-", $newFilename)) . "." . $fileActualExt;
                $fileDestination = 'img/' . $newFilename;// Create a new filename based on input or default to "gallery" and Replace spaces with dashes and append the file extension and later on Set the destination path for the uploaded file
                // Attempt to move the uploaded file to its new destination
                if (move_uploaded_file($fileTempName, $fileDestination)) {
                    // Print success message if the file is moved successfully
                    echo "The file " . htmlspecialchars($newFilename) . " has been uploaded successfully.";
                } else {
                    // Print error message if the file could not be moved
                    echo "There was an error uploading your file.";
                }
            } else {
                // Print error message if the file is too large 
                echo "Your file is too big.";
            }
        } else {
            // Print a general error message if there is an error with the file or something goes wrong 
            echo "There was an error uploading your file.";
        }
    } else {
        // Print error message if the file type is not allowed 
        echo "You cannot upload files of this type.";
        //got help with this https://www.youtube.com/watch?v=sURoBCwk4T4
    }
}
?>
