<!DOCTYPE html>
<html>
  <head>
    <title>Upload Files</title>
  </head>
  <body>
    <h1>Upload Files</h1>
    <?php
    // Check if form was submitted
    if (isset($_POST['submit'])) {
      // Loop through each uploaded file
      for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        // Get the file name, size, type, and temporary path
        $filename = $_FILES['file']['name'][$i];
        $filesize = $_FILES['file']['size'][$i];
        $filetype = $_FILES['file']['type'][$i];
        $filetmp = $_FILES['file']['tmp_name'][$i];

        // Check if file was uploaded successfully
        if ($filesize > 0 && is_uploaded_file($filetmp)) {
          // Move the file to a new location
          // $destination = 'files' . $filename;
          if (move_uploaded_file($filetmp, $destination)) {
            echo "<p>File $filename uploaded successfully.</p>";
          } else {
            echo "<p>There was an error uploading file $filename.</p>";
          }
        }
      }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="file[]" multiple><br><br>
      <input type="submit" name="submit" value="Upload">
    </form>
  </body>
</html>
