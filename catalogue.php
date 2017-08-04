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
    $projets = array_diff($projets, ['.', '..', 'RandomExo', 'remakewebsite1']);
    foreach ($projets as $projet) {
        if (is_dir("../".$projet)) {
            if (is_file("../".$projet."/miniature.png")) {
                if (is_file("../".$projet."/description.json")) {
                    $json = file_get_contents("../".$projet."/description.json");
                    $info = json_decode($json);
                    ?>
                    <section class='projets'>
                        <section class="miniature" style="background-image:url('../<?php echo $projet; ?>/miniature.png');">
                            <section class="hoverprojet" >
                                <a href="../<?php echo $projet; ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 125" version="1.1" x="0px" y="0px">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g stroke-width="14" stroke="#ffffff"><polyline transform="translate(50.000000, 64.004272) rotate(45.000000) translate(-50.000000, -64.004272) " points="30 84.0042725 30 44.0042725 30 44.0042725 70 44.0042725"/></g></g>
                                    </svg>
                                    <p>Visiter le site</p>
                                </a>
                                <div>
                                    <h3><?php echo $projet; ?></h3>
                                    <p><?php echo $info->langue; ?></p>
                                </div>
                                <div class="plus">
                                    <div>
                                        <p>En savoir&nbsp;</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 20 20;" xml:space="preserve">
                                            <g><polygon fill="#ffffff" points="12.761,16.566 12.761,12.761 16.567,12.761 16.567,11.239 12.761,11.239 12.761,7.433 11.239,7.433 11.239,11.239    7.433,11.239 7.433,12.761 11.239,12.761 11.239,16.566  "/><path fill="#ffffff" d="M21.133,12c0-5.036-4.097-9.133-9.133-9.133S2.867,6.964,2.867,12c0,5.036,4.097,9.133,9.133,9.133   S21.133,17.036,21.133,12z M4.389,12c0-4.197,3.414-7.611,7.611-7.611S19.611,7.803,19.611,12c0,4.197-3.414,7.611-7.611,7.611   S4.389,16.197,4.389,12z"/></g>
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" version="1.1" x="0px" y="0px">x    
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g stroke-width="14" stroke="#ffffff"><polyline transform="translate(50.000000, 35.994271) rotate(45.000000) translate(-50.000000, -35.994271) " points="70 15.9942713 70 55.9942713 30 55.9942713"/></g></g>
                                    </svg>
                                </div>
                            </section>
                        </section>
                        <section class="popup" style="display:none;" id="<?php echo $projet; ?>">
                                <div class="gauche">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 24 30" style="enable-background:new 0 0 24 24;" xml:space="preserve"><g><polygon fill="#ffffff" points="12.981,7.659 8.64,12.048 12.987,16.347 14.057,15.265 10.793,12.036 14.063,8.73  "/><path fill="#ffffff" d="M12,3.628c-4.616,0-8.372,3.756-8.372,8.373S7.384,20.372,12,20.372s8.372-3.755,8.372-8.372S16.616,3.628,12,3.628z    M12,18.85c-3.777,0-6.85-3.073-6.85-6.85S8.223,5.15,12,5.15s6.85,3.073,6.85,6.85S15.777,18.85,12,18.85z"/></g></svg>
                                </div>
                                <div class="centre">
                                    <div class="croix">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 24 30" style="enable-background:new 0 0 24 24;" xml:space="preserve"><g><polygon points="14.691,8.232 12,10.924 9.309,8.232 8.233,9.309 10.924,12 8.233,14.691 9.309,15.768 12,13.077 14.691,15.768    15.767,14.691 13.076,12 15.767,9.309  "/><path d="M12,2.867c-5.036,0-9.133,4.097-9.133,9.133c0,5.036,4.097,9.133,9.133,9.133c5.036,0,9.133-4.098,9.133-9.133   C21.133,6.964,17.036,2.867,12,2.867z M12,19.611c-4.197,0-7.611-3.414-7.611-7.611c0-4.197,3.414-7.611,7.611-7.611   c4.197,0,7.611,3.415,7.611,7.611C19.611,16.197,16.197,19.611,12,19.611z"/></g></svg>
                                    </div>
                                    <section class="description">
                                        <img src="../<?php echo $projet; ?>/miniature.png"/>
                                        <section>
                                            <h3><?php echo $projet; ?></h3>
                                            <p><strong>Date de création :</strong> <?php echo $info->date; ?></p>
                                            <p><strong>Langages :</strong> <?php echo $info->langue; ?></p>
                                            <p><strong>Consept vue ou appris :</strong> <?php echo $info->concept; ?></p>
                                        </section>
                                    </section>
                                    <p><strong>Description :</strong> <?php echo $info->commentaire; ?></p>
                                    <section class="placebouton">
                                        <a href="../<?php echo $projet; ?>" class="boutonperso" target="_blank">GO ON WEBSITE !</a>
                                        <a href="https://github.com/ClemenceLaffont/<?php echo $projet; ?>" class="boutonperso" target="_blank">GO ON GITHUB !</a>
                                    </section>
                                </div>
                                <div class="droite">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 24 30" style="enable-background:new 0 0 24 24;" xml:space="preserve"><g><polygon fill="#ffffff" points="11.019,7.659 15.36,12.048 11.013,16.347 9.943,15.265 13.207,12.036 9.937,8.73  "/><path fill="#ffffff" d="M3.628,12c0,4.617,3.756,8.372,8.372,8.372s8.372-3.755,8.372-8.372S16.616,3.628,12,3.628S3.628,7.384,3.628,12z M5.15,12   c0-3.777,3.073-6.85,6.85-6.85s6.85,3.073,6.85,6.85s-3.073,6.85-6.85,6.85S5.15,15.777,5.15,12z"/></g></svg>
                                </div>
                            
                        </section>
                    </section>
                    <section class="projetmobile" style="display:none;">
                        <img src="../<?php echo $projet; ?>/miniature.png"/>
                        <h3><?php echo $projet; ?></h3>
                        <p><?php echo $info->langue; ?></p>
                        <a href="../<?php echo $projet; ?>" class="boutonperso" target="_blank">GO ON WEBSITE !</a>
                        <p>En savoir&nbsp;</p>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 20 20;" xml:space="preserve">
                            <g><polygon fill="#ffffff" points="12.761,16.566 12.761,12.761 16.567,12.761 16.567,11.239 12.761,11.239 12.761,7.433 11.239,7.433 11.239,11.239    7.433,11.239 7.433,12.761 11.239,12.761 11.239,16.566  "/><path fill="#ffffff" d="M21.133,12c0-5.036-4.097-9.133-9.133-9.133S2.867,6.964,2.867,12c0,5.036,4.097,9.133,9.133,9.133   S21.133,17.036,21.133,12z M4.389,12c0-4.197,3.414-7.611,7.611-7.611S19.611,7.803,19.611,12c0,4.197-3.414,7.611-7.611,7.611   S4.389,16.197,4.389,12z"/></g>
                        </svg>
                    </section>
                    <?php
                }
            }
        }
    }
?>
<script type="text/javascript" src="js/script.js"></script>
</main>

</body>

</html>