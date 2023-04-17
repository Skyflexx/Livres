<?php 

    // Classe Livre

    class Book {

        private string $title;
        private int $nbPages;
        private Datetime $datePublication;
        private float $price;
        private Author $author;

        public function __construct (string $title, int $nbPages, string $datePublication, float $price, Author $author){

            $this->title = $title;
            $this->nbPages = $nbPages;
            $this->datePublication = new DateTime($datePublication);
            $this->price = $price;
            $this->author = $author;

            $author->addBook($this); // Lors de la création d'un livre, il est immédiatement ajouté à la liste de l'auteur concerné par le construct

        }

        // GETTERS 

        public function getTitle(){
            return $this->title;
        }

        public function getNbPages(){
            return $this->nbPages;
        }

        public function getDatePublication(){
            return $this->datePublication;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getAuthor(){
            return $this->author;
        }

        // SETTERS

        public function setTitle(string $title){
            $this->title = $title;
        }

        public function setNbPages(int $nbPages){
            $this->nbPages = $pages;
        }

        public function setDateParution(string $datePublication){
            $this->datePublication = $datePublication;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function setAuthor(Author $author){
            $this->author = $author;
        }


        // METHODES GENERALES

        public function getYearRelease(){             
            $yearRelease = $this->datePublication; 
            return $yearRelease->format("Y");  // Methode "format" de la classe DateTime permettant d'afficher l'année juste avec le Y Majuscule.
        }

        public function getInfoBook(){ // Ne retourne pas le nom de l'auteur car méthode utilisée dans la classe Author pour afficher sa bibliographie.

            $infoBook = "$this->title"."(".$this->getYearRelease().") : ".$this->nbPages." pages / ".$this->price." € <br>";
            return $infoBook;
        }

        public function __tostring(){ // Retourne toutes les infos d'un livre dont l'auteur.

            return $this->getTitle();
            
        }        

    }
    
?>



