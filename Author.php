<?php

// Classe Auteur 

    class Author{

        private string $firstname;
        private string $lastname;
        private array $bookList;

        public function __construct($firstname, $lastname){

            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->bookList = array();

        }

        public function getFirstname(){
            return $this->firstname;
        }

        public function getLastname(){
            return $this->lastname;
        }

        public function setFirstname($newFirstname){
            $this->firstname = $newFirstname;
        }

        public function setLastname($newLastname){
            $this->lastname = $newLastname;
            
        }

        public function addBook(Book $book){ // fonction automatiquement appelée lors de la création d'un new Book puisque lié à un auteur.

            array_push($this->bookList, $book); // On ajoute dans l'array l'objet Book créé. $this->bookList étant l'array.

        }

        // public function showBibliography(){

        //     echo "Livres de $this->firstname $this->lastname :<br>";

        //     foreach ($this->bookList as $book){ // On parcourt l'array contenant les différents livres

        //         // $bookInfos = $book->showInfoBook(); // On stocke l'objet livre dans une variable

        //         // echo $bookInfos; // On echo la variable.

        //         echo $book->showInfoBook();
        //     }
        // }

        public function __tostring(){

            $bibliography = "Livres de $this->firstname $this->lastname :<br>";

            foreach ($this->bookList as $book){

                $bibliography = $bibliography.$book->getInfoBook();               
                
            }

            return $bibliography;          
            
        }    

    }

?>