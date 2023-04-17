<h1>Banque</h1>

<p>
    Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires
    et leurs comptes bancaires respectifs.    
</p>

<h2>

    <?php

        include "Account.php";
        include "Titular.php";

        // Nouveau titulaire 

        $loicBerg = new Titular("Loic", "Bergmann", "03/01/1991", "Colmar");
        $marieBerg = new Titular("Marie", "Bergmann", "08/16/1995", "Colmar");

        // Création des comptes

        $compte1 = new Account("Livret bleu", 2000, "€", $loicBerg);
        $compte2 = new Account("Livret A", 5000, "€", $marieBerg);
        $compte3 = new Account("Compte Epargne", 3000, "€", $loicBerg);

        // opérations diverses

        $compte1->credit(3000);
        echo "<br>";

        $compte1->debit(3000);
        echo "<br>";

        $compte1->transfer($compte2, 2000);
        echo "<br>";        

        $compte1->showInfosAccount(); 
        echo "<br>";   

        $marieBerg->showInfosTitular();
        echo "<br>";

        $loicBerg->setDateBirth(new DateTime("05/01/1950"));
        echo "<br>";

        $loicBerg->showInfosTitular();

    ?>

</h2>

