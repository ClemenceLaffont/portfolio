<?php 
include_once("header.html");
?>

<main>
<?php
    $projets = scandir("..");
    if ($projets === false) {
        header('content-type: text/plain');
        echo 'Oops, une erreur est survenu !';
        exit(1);
    }
    $projets = array_diff($projets, ['.', '..']);
    foreach ($projets as $projet) {
        if (is_dir("../".$projet)) {
            echo "<article>";
            if (is_file("../".$projet."/miniature.png")) {
                echo '<img src="../'.$projet.'/miniature.png"/>';
            }
            if (is_file("../".$projet."/description.json")) {
                $json = file_get_contents("../".$projet."/description.json");
                $info = json_decode($json);
                echo "<a href='../".$projet."'>";
                echo "<h3>".$projet."</h3>";
                echo "<p>Date de création : ".$info->date."</p>";
                echo "<p>Langages : ".$info->langue."</p>";
                echo "<p>Consept vue ou appris : ".$info->concept."</p>";
                echo "<p>Description : ".$info->commentaire."</p>";
                echo "</a>";
            }
            echo "</article>";
        }
    }
?>

</main>