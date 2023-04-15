<?php 

    // Classe Livre

    class Book {

        private string $title;
        private int $nbPages;
        private int $yearParution;
        private float $price;
        private Author $author;

        public function __construct (string $title, int $nbPages, int $yearParution, float $price, Author $author){

            $this->title = $title;
            $this->nbPages = $nbPages;
            $this->yearParution = $yearParution;
            $this->price = $price;
            $this->author = $author;

            $author->addBook($this); // Lors de la création d'un livre, il est immédiatement ajouté à la liste de l'auteur concerné par le construct

        }

        public function showInfoBook(){
            echo "$this->title ($this->yearParution) : $this->nbPages pages / $this->price €<br>";
        }

        public function __tostring(){
            echo $this->showInfoBook;
        }        

    }
    
?>



