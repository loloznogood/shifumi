<?php

require 'player.php';

class Shifumi {

    public $player1, $player2, $array;

    public function __construct()
    {
        $this->player1 = new Player();
        $this->player2 = new Player();
        $this->array['player1'] = 0;
        $this->array['player2'] = 0;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    /*
     * 1 = ciseaux
     * 2 = papiers
     * 3 = pierres
     */
    public function roundWinner($int1, $int2) {
        if($int1 === 1 && $int2 === 1) {
            print('Joueur 1 : ciseaux, Joueur 2 : ciseaux');
        }
        else if($int1 === 1 && $int2 === 2) {
            $this->player1->setScore();
            print('Joueur 1 : ciseaux, Joueur 2 : papiers');
        }
        else if($int1 === 1 && $int2 === 3) {
            $this->player2->setScore();
            print('Joueur 1 : ciseaux, Joueur 2 : pierres');
        }
        else if($int1 === 2 && $int2 === 1) {
            $this->player2->setScore();
            print('Joueur 1 : papiers, Joueur 2 : ciseaux');
        }
        else if($int1 === 2 && $int2 === 3) {
            $this->player1->setScore();
            print('Joueur 1 : papiers, Joueur 2 : pierres');
        }
        if($int1 === 2 && $int2 === 2) {
            print('Joueur 1 : papiers, Joueur 2 : papiers');
        }
        else if($int1 === 3 && $int2 === 1) {
            $this->player1->setScore();
            print('Joueur 1 : pierres, Joueur 2 : ciseaux');
        }
        else if($int1 === 3 && $int2 === 2) {
            $this->player2->setScore();
            print('Joueur 1 : pierres, Joueur 2 : papiers');
        } else if($int1 === 3 && $int2 === 3) {
            print('Joueur 1 : pierres, Joueur 2 : pierres');
        }
        $this->array['player1'] = $this->player1->getScore();
        $this->array['player2'] = $this->player2->getScore();
        return $this->array;
    }

    public function play() {
        while($this->array['player1'] < 2 && $this->array['player2'] < 2) {
            $this->roundWinner($this->player1->generateForm(), $this->player2->generateForm());
            echo "\n";
            print_r($this->array);
        }
    }

    public function winner() {
        $this->play();
        if($this->array['player1'] === 2) {
            return 'Joueur 1 gagnant';
        } else {
            return 'Joueur 2 gagnant';
        }
    }

}
