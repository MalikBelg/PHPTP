<?php

$taches = $template["json"];

?>


<h2> Bienvenue !</h2>

    <h3>Ajouter une tache :</h3>

        <form action="index.php?route=tache" method="POST">

            <input type="text" id="id_tache" name="id_tache" placeholder="Entrez le nom de votre tâche">
            <input type="text" id="datelimite" name="datelimite" placeholder="Entrez votre date limite">

            <button type="submit">Valider</button>

        </form>

        <a href="index.php?route=connexion">Retour connexion</a>

    <h3>Listes de tâches :</h3>

    <!-- Boucle foreach pour afficher chacune des tâches entrées dans le formulaire -->
        <ul>
            <?php foreach ($taches as $tache):?> 
                <li><strong> Nom tâche : </strong> <?= $tache->id_tache ?> <strong>Date limite:</strong> <?= $tache->datelimite ?></li>
            <?php endforeach ?>
        </ul>