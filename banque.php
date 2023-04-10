<h1>Banque</h1>

<p>
    Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires
    et leurs comptes bancaires respectifs.    
</p>

<h2>

<?php

// class CompteBancaire

class Account{

    private string $typeAccount;
    private float $sold;
    private string $devise;    

    public function __construct(string $typeAccount, float $sold, string $devise) {

        $this->typeAccount = $typeAccount;
        $this->sold = $sold;
        $this->devise = $devise;       

    }

    public function getTypeAccount(){
        return $this->typeAccount;
    }

    public function getSold(){
        return $this->sold;
    }

    public function getDevise(){
        return $this->devise;
    }

    public function getNoTitular(){
        return $this->noTitular;
    }

    public function __tostring(){
        return $this->typeAccount." ".$this->sold." ".$this->devise."<br>";
    }

}

// class Titulaire étendue de la classe compte pour qu'un titulaire soit lié à un compte précis.

class Titular extends Account {

    private string $firstName;
    private string $lastName;
    private Datetime $dateBirth;
    private string $country;   

    public function __construct (string $firstName, string $lastName, string $dateBirth, string $country, string $typeAccount, float $sold,  string $devise){

        parent::__construct($typeAccount, $sold, $devise);

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateBirth = new Datetime($dateBirth);
        $this->country = $country;
        

    }

    public function getFirstName(){
        return $this->firstName;        
    }

    public function getLastName(){
        return $this->lastName;        
    }

    public function getDate(){
        return $this->dateBirth;        
    }

    public function getCountry(){
        return $this->country;        
    }

    public function __tostring(){
        return $this->firstName." ".$this->lastName." ".date_format($this->dateBirth, 'Y-m-d')." ".$this->country."<br>"; // utilisation de la methode date_format afin d'afficher la date sinon ça ne fct pas.
    }

}

$compte = new Account("meuh", 3000, "eur");

echo $compte;

$titulaire = new Titular ("Loic", "Bergmann", "03/01/1991", "France", "Livret A", 3000, "Eur");

echo $titulaire;

    
    
?>

</h2>

