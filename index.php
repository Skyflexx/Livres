<h1>Livres</h1>

<p>
    Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des livres et
    leurs auteurs respectifs.
</p>

<h2>

    <?php 

        include "Book.php";
        include "Author.php";

        $stephen = new Author("Stephen", "King");        
        $book1 = new Book("Ca", 1138, "01/01/1986", 20, $stephen);       
        $book2 = new Book("simetierre", 420, "01/01/1878", 14, $stephen);
        $book3 = new Book("Le Fléau", 823, "01/01/1978", 14, $stephen);
        $book4 = new Book("Shining", 447, "01/01/1977", 16, $stephen);        
       
       echo "<br>" ;  

       echo $book1; // Affichage des infos du livre en question

       echo "<br>";   

       echo $stephen; // Tostring

       echo "<br>";  echo "<br>";

       echo $stephen->showBibliography();// Affichage de la bibliographie de Stephen King

    ?>

</h2>