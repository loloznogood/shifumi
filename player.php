<?php


class Player
{
    public $form, $score;

    public function __construct($score = 0)
    {
        $this->score = $score;
    }

    public function generateForm()
    {
        $this->form = rand(1,3);
        return $this->form;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore()
    {
        $this->score += 1;
    }
}