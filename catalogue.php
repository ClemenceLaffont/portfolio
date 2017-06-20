<?php 
$page = "catalogue";
include_once("header.html");
?>

<main id="catalogue">
<?php
    $projets = scandir("..");
    if ($projets === false) {
        header('content-type: text/plain');
        echo 'Oops, une erreur est survenu !';
        exit(1);
    }
    $projets = array_diff($projets, ['.', '..', 'RandomExo', 'portfolio', 'remakewebsite1']);
    foreach ($projets as $projet) {
        if (is_dir("../".$projet)) {
            echo "<a class='projets' href='../".$projet."'>";
            if (is_file("../".$projet."/miniature.png")) {
                echo '<img src="../'.$projet.'/miniature.png"/>';
            }
            if (is_file("../".$projet."/description.json")) {
                $json = file_get_contents("../".$projet."/description.json");
                $info = json_decode($json);
                echo "<section>";
                echo "<h3>".$projet."</h3>";
                echo "<p><strong>Date de création :</strong> ".$info->date."</p>";
                echo "<p><strong>Langages :</strong> ".$info->langue."</p>";
                echo "<p><strong>Consept vue ou appris :</strong> ".$info->concept."</p>";
                echo "<p><strong>Description :</strong> ".$info->commentaire."</p>";
                echo "</section>";
            }
            echo "</a>";
        }
    }
?>

</main>