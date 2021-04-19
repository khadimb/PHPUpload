<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){ 

    $uploadDir = 'uploadphp';
    $uploadFile = $uploadDir .'_' . uniqid() . '_' .basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $extensions_ok = ['jpg','jpeg','png', 'webp'];
    $maxFileSize = 1000000;

    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

    if( (!in_array($extension, $extensions_ok ))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou Webp !';
    }

    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1Mo !";
    }

    $data = array_map('trim', $_POST);

    $errors = [];

    if (empty($data['firstname'])) {
        $errors[] = 'Le prénom est obligatoire';
    }

    $firstnameLength = 255;
    if (strlen($data['firstname']) > $firstnameLength) {
        $errors[] = 'Le prénom doit faire moins de ' . $firstnameLength . ' caractères';
    }

    if (empty($data['lastname'])) {
        $errors[] = 'Le nom est obligatoire';
    }

    $lastnameLength = 255;
    if (strlen($data['lastname']) > $lastnameLength) {
        $errors[] = 'Le nom doit faire moins de ' . $lastnameLength . '  caractères';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php if (!empty($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action ="picture.php" method="post" enctype="multipart/form-data">
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname"value="<?= $data['lastname'] ?? '' ?>" required>

    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname"value="<?= $data['firstname'] ?? '' ?>" required>

    <label for="age">Age</label>
    <input type="number" name="age" id="age" value="<?= $data['age'] ?? '' ?>" required>

    <label for="imageUpload">Upload an profile image</label>    
    <input type="file" name="avatar" id="imageUpload" />
    <button name="send">Envoyer</button>
</form>
</body>
</html>