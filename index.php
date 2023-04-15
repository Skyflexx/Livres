<h1>Livres</h1>

<p>
    Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des livres et
    leurs auteurs respectifs.
</p>

<h2>

    <?php 

        include "Book.php";
        include "Author.php";

        $loic = new Author("Loic", "Bergmann");
        $book1 = new Book("ça", "350", 1991, 350, $loic);
        $book2 = new Book("simetierre", "420", 2000, 500, $loic);

        $loic->showBibliography();    

    ?>

</h2>