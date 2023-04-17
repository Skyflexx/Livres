<?php

    // CLASSE TITULAIRE ---------------------

    class Titular {

        private string $firstname;
        private string $lastname;
        private DateTime $dateBirth;
        private string $city;      
        private array $accountList;
    

        public function __construct (string $firstname, string $lastname, string $dateBirth, string $city){                        
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->dateBirth = new DateTime($dateBirth);
            $this->city = $city;   
            $this->accountList = array();               
        }        

        // GETTERS 

        public function getFirstname(){
            return $this->firstname;        
        }

        public function getLastname(){
            return $this->lastname;        
        }

        public function getDateBirth(){
            // return date_format($this->dateBirth, 'Y-m-d');      
            return $this->dateBirth;      
        }

        public function getCity(){
            return $this->city;        
        }

        // SETTERS

        public function setFirstname(string $Firstname){
            $this->firstname = $Firstname;
        }

        public function setLastname(string $Lastname){
            $this->lastname = $Lastname;            
        }

        public function setDateBirth(Datetime $date){
            $this->dateBirth = $date;
        }

        // METHODES GENERALES

        public function getAge(){

            $now = new DateTime();  

            $birth = $this->dateBirth;

            $diff = date_diff($now, $birth);
            
            return $diff->y; // retourne le nombre d'années de différence, soit l'âge de la personne.

        }

        public function getInfosTitular(){
            return $this->firstname." ".$this->lastname;
            // On peut accéder directement aux infos pas besoin d'utiliser les getters ici.
        }       
        
        public function showInfosTitular(){
            
            echo "Nom, prénom, âge du titulaire : $this->firstname $this->lastname"." ".$this->getAge()." ans. <br>".
            "Comptes associés : <br>";
            
            foreach ($this->accountList as $account){

                echo $account-> showInfosAccount(); 

            }
            
        }         
        
        // FONCTION AJOUT D'UN NOUVEAU COMPTE

        public function addAccount(Account $account){ 
            
        // $account correspond à un compte que l'utilisateur va créer en utilisant new Account. Cette variable contiendra donc les infos du nouveau compte.

        array_push($this->accountList, $account);

        // accountList correspond à la liste des comptes et contient le premier compte par défaut. Il suffit de push avec le second compte.
        
        }

    }

?>