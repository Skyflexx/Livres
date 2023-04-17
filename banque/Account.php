<?php 

    // CLASSE COMPTE BANCAIRE ------------------------------

    class Account {

        private string $typeAccount;
        private float $sold;
        private string $devise;  
        private Titular $titular;

        public function __construct(string $typeAccount, float $sold, string $devise, Titular $titular) { 
            $this->typeAccount = $typeAccount;
            $this->sold = $sold;
            $this->devise = $devise; 
            $this->titular = $titular;         
            $titular->addAccount($this); // On push l'array lors la création du compte.  
        }    

        // GETTERS

        public function getTypeAccount(){
            return $this->typeAccount;
        }

        public function getSold(){
            return $this->sold;
        }

        public function getDevise(){        
            return $this->devise;
        }  

        public function getTitular(){
            return $this->titular;
        }

        // SETTERS

        public function setTypeAccount(string $typeAccount){
            $this->typeAccount = $typeAccount;
        }

        public function setSold(float $sold){
            $this->sold = $sold;
        }

        public function setDevise(string $devise){
            $this->devise = $devise;
        }

        public function setTitular(Titular $titular){
            $this->titular = $titular;
        }

        // METHODES GENERALES


        public function showInfosAccount(){ // Affiche toutes les infos du compte ainsi que le titulaire

            $titular = $this->titular; // récupération des infos du titulaire       
            $accountTitular = $titular->getInfosTitular(); // methode qui retourne nom et prenom.

            echo "Titulaire : $accountTitular, Type de compte : $this->typeAccount, ".
            "Solde : $this->sold, ".
            "Devise : $this->devise. <br>";
        }

        public function credit($amount){ // Methode permettant de créditer le compte
            $this->sold += $amount;
            echo "Votre compte a bien été crédité. Le solde est désormais de $this->sold $this->devise. <br>";
        }

        public function debit($amount){ // Methode permettant de débiter le compte. Une alerte indique lorsque le compte est dans le négatif.

            $this->sold -= $amount;

            if ($this->sold <=0){

                echo "Débit effectué. Alerte :  le solde de votre compte est de $this->sold $this->devise.<br>";

            } else {

                echo "Votre compte a bien été débité. Le solde s'élève à $this->sold $this->devise.<br>";
            }
        }

        public function transfer(Account $targetAccount, float $amount){ // Fonction virement depuis le compte actuel vers un compte cible.

            if (($this->getSold() - $amount) < 0) { // Si le solde du compte actuel le permet, alors on effectue le virement.

                echo "Solde insuffisant pour effectuer ce virement. <br>";

            } else {

                $this->debit($amount); // On débite de la valeur demandée le compte actuel.

                echo "Virement de $amount $this->devise effectué. <br>";

                $targetAccount->credit($amount); // On crédite le compte cible.            

            }       
        
        }      

    }

?>