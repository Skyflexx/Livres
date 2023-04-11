<h1>Livres</h1>

<p>
Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des livres et
leurs auteurs respectifs.
</p>

<h2>

<?php

// Classe Auteur 

class Auteur{

    private string $firstName;
    private string $lastName;

    public function __construct($firstName, $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function __tostring(){
        return $this->getFirstName()." ".$this->getLastName();
    }

}

$auteur1 = new Auteur("Loic", "Bergmann");

echo $auteur1;

// Classe Livre

class Livre extends Auteur{

    private string $title;
    private int $nbPages;
    private int $yearParution;
    private float $price;

}

    
?>

</h2>

