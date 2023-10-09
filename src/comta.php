$is_compatible = $sock['taille'] == $_SESSION['taille'] && $sock['couleur'] == $_SESSION['couleur'] && $sock['marque'] == $_SESSION['marque']; 



<?php if($is_compatible): ?>
            <p class="compatible">Compatible</p>
            <?php endif; ?>

            