<?php require_once 'form.php' ?>

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
<div class ="card">
    <div class ="imgupload"><img src='<?=$uploadFile?>'></div>

    <div class="infos">
        <div class="firstname"><?= $data['firstname'] ?></div>
        <div class="lastname"><?= $data['lastname'] ?></div>
        <div class="age"><?= $data['age'] ?></div>
    </div>
    
</div>
</body>
</html>
