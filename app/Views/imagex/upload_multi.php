<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image Multi</title>
</head>
<body>
    <?php echo form_open_multipart('/upload_multi/image'); ?>
    <input type="file" name="gambar[]" multiple>
    <button type="submit">Upload</button>
    <?php echo form_close(); ?>
</body>
</html>