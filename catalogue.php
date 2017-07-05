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
            if (is_file("../".$projet."/miniature.png")) {
                if (is_file("../".$projet."/description.json")) {
                    $json = file_get_contents("../".$projet."/description.json");
                    $info = json_decode($json);
?>
    <section class='projets'>
        <section class="miniature">
            <img src="../<?php echo $projet; ?>/miniature.png"/>
            <section class="hoverprojet">
                <a href="../<?php echo $projet; ?>" class="boutonperso">Go on website !</a>
                <a href="#" class="boutonperso">Go on gitub !</a>
                <section class="text">
                    <h3><?php echo $projet; ?></h3>
                    <p><?php echo $info->commentaire; ?></p>
                </section>
                <div class="plus"></div>
            </section>
        </section>
        <section class="popup" id="<?php echo $projet; ?>">
            <div class="gauche">gauche</div>
            <div class="centre">
                <div class="croix"></div>
                <section>
                    <img src="../<?php echo $projet; ?>/miniature.png"/>
                    <section>
                        <h3><?php echo $projet; ?></h3>
                    <p><strong>Date de création :</strong> <?php echo $info->date; ?></p>
                    <p><strong>Langages :</strong> <?php echo $info->langue; ?></p>
                    <p><strong>Consept vue ou appris :</strong> <?php echo $info->concept; ?></p>
                </section>
                <p><strong>Description :</strong> <?php echo $info->commentaire; ?></p>
                <section>
                    <a href="../<?php echo $projet; ?>" class="boutonperso">Go on website !</a>
                    <a href="#" class="boutonperso">Go on gitub !</a>
                </section>
            </div>
            <div class="droite">droite</div>
        </section>
    </section>
    
<?php
                 }
            }
        }
    }
?>
<script type="text/javascript" src="js/script.js"></script>
</main>