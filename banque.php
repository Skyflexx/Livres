<h1>Banque</h1>

<p>
    Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires
    et leurs comptes bancaires respectifs.    
</p>

<h2>

<?php

// CLASSE TITULAIRE ---------------------

    class Titular {

    private string $firstName;
    private string $lastName;
    private Datetime $dateBirth;
    private string $city;  
    private $personnalId; 

    public function __construct (string $firstName, string $lastName, string $dateBirth, string $city){        

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateBirth = new Datetime($dateBirth);
        $this->city = $city;  
        $this->personnalId = $firstName.$lastName.$dateBirth;      
    }    

    public function getFirstName(){
        return $this->firstName;        
    }

    public function getLastName(){
        return $this->lastName;        
    }

    public function getDate(){
        return date_format($this->dateBirth, 'Y-m-d');      
    }

    public function getAge(){

        $now = new DateTime();  

        $birth = $this->dateBirth;

        $diff = date_diff($now, $birth);
        
        return $diff->y;

    }

    public function getCity(){
        return $this->city;        
    }

    public function getId(){
        return $this->personnalId;
    }

    public function getInfostitular(){
        echo $this->getFirstName()." ".$this->getLastName()." ".$this->getDate()." ".$this->getCity()." ".$this->getAge()."<br>";
    }   

}

// CLASSE COMPTE BANCAIRE ------------------------------

class Account extends Titular{

    private string $typeAccount;
    private float $sold;
    private string $devise;  
    

    public function __construct(string $firstName, string $lastName, string $dateBirth, string $city, string $typeAccount, float $sold, string $devise ) {

        parent::__construct($firstName, $lastName, $dateBirth, $city);
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

    public function getInfosAccount(){ // Retourne toutes les infos du compte.
        echo $this->getFirstName()." ".$this->getLastName()." ".$this->getDate()." ".$this->getCity()." ".$this->getTypeAccount()." ".$this->getSold()." ".$this->getDevise()." ".$this->getId()."<br>";
    }

    public function credit($value){ // Methode permettant de créditer le compte
        $this->sold += $value;
    }

    public function debit($value){ // Methode permettant de débiter le compte. Une alerte indique lorsque le compte est dans le négatif.
        $this->sold -= $value;
        if ($this->sold <=0){
            echo "Alerte :  le solde de votre compte est de ".$this->sold." ".$this->devise."<br>";
        } 
    }

    public function transfer($targetAccount, float $value){ // Fonction virement depuis le compte actuel vers un compte cible.

        if (($this->getSold() - $value) < 0) { // Si le solde du compte actuel le permet, alors on effectue le virement.

            echo "Solde insuffisant pour effectuer ce virement. <br>";

        } else {

            $this->debit($value); // On débite de la valeur demandée le compte actuel.

            $targetAccount->credit($value); // On crédite le compte cible.

            echo "Virement effectué. <br>";

        }       
       
    }      

}

$compte = new Account("Loic", "Bergmann", "03/01/1991", "Colmar", "Livret A", 3000, "eur");
$compte2 = new Account("Loic", "Bergmann", "03/01/1991", "Colmar", "Livret Bleu", 5000, "eur");
$compte3 = new Account("Marie", "Bergmann", "08/08/1995", "Colmar", "Livret Bleu", 4000, "eur");

$compte->getInfosAccount();
$compte2->getInfosAccount();
$compte3->getInfosAccount();

echo "<br>";
echo $compte->getAge();
echo " ans<br>";
echo $compte->getSold();
echo "<br>";
$compte -> credit(5000); // On crédite de 5000
echo $compte->getSold();
echo "<br>";
$compte -> debit(2000);
echo "<br>";
$compte->getSold();

$compte-> transfer($compte2, 4000);
echo "Solde actuelle : ".$compte->getSold()." ".$compte->getDevise();
echo "<br>";
echo "Solde actuelle compte cible : ".$compte2->getSold()." ".$compte2->getDevise();
echo "<br>";


// Creation d'une fonction permettant d'afficher tous les comptes d'un seul titulaire

$accounts = array($compte, $compte2, $compte3); // Un array contenant la totalité des comptes en banque.

function displayAccounts($firstName, $lastName, $dateBirth, $accountList){

    foreach ($accountList as $value){

        if ($value->getId() == $firstName.$lastName.$dateBirth){

            echo $value->getInfosAccount();

        }
    }
}

echo displayAccounts("Loic", "Bergmann", "03/01/1991", $accounts); // A partir de l'array Accounts qui contient tous les comptes de la banque.    
    
?>

</h2>

