<?php

if ($_POST) {
    if(isset($_POST["nom"]) && !empty($_POST["nom"])
    && isset($_POST["image"]) && !empty($_POST["image"])
    && isset($_POST["description"]) && !empty($_POST["description"])) {
        require_once("connexion.php");

        $id = strip_tags($_GET["id"]);
        $nom = strip_tags($_POST["nom"]);
        $image = strip_tags($_POST["image"]);
        $description = strip_tags($_POST["description"]);
        
        $sql = "UPDATE projets SET name=:nom, image=:image, description=:description WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);

        $query->execute();
        
        header("Location: index.php");
    }else{
        echo "Remplissez tous les champs";
    }
}

if(isset($_GET["id"])&& !empty($_GET["id"])){
    require_once("connexion.php");
    $id = strip_tags($_GET["id"]);
    // var_dump($id);
    $sql = "SELECT * FROM projets WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);

    $query->execute();
    $projet = $query->fetch();
    // on verifie si le projet existe
    if(!$projet){
        header("Location: index.php");
    }

} else {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<form method="post">
    <div class="form-group">
        <label for="nom">Nom du projet</label>
        <input type="text" name="nom" value="<?= $projet["name"] ?>">
    </div>

    <div class="form-group">
        <label for="image">image du projet</label>
        <input type="file" name="image" value="<?= $projet["image"] ?>">
    </div>

    <div class="form-group">
        <label for="description">description du projet</label>
        <input type="text" name="description" value="<?= $projet["description"] ?>">
    </div>
    <input type="submit" value="modifier">

</form>
    
</body>
</html>

