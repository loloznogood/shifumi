<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require 'shifumi.php';

final class Test extends TestCase
{
    public function testGenerateForm(): void
    {
        $player = new Player();
        $form = $player->generateForm();
        if($form === 1 || $form === 2 || $form === 3)
            $this->assertTrue(true);
    }

    public function testRoundWinner(): void
    {
        $shifumi = new Shifumi();
        $form1 = $shifumi->player1->generateForm();
        $form2 = $shifumi->player2->generateForm();
        $score = $shifumi->roundWinner($form1, $form2);
        if($form1 === 1 && $form2 === 1) {
            $this->assertEquals(0, $score['player1']);
            $this->assertEquals(0, $score['player2']);
        }
        else if($form1 === 1 && $form2 === 2) {
            $this->assertEquals(1, $score['player1']);
            $this->assertEquals(0, $score['player2']);
        }
        else if($form1 === 1 && $form2 === 3) {
            $this->assertEquals(0, $score['player1']);
            $this->assertEquals(1, $score['player2']);
        }
        else if($form1 === 2 && $form2 === 1) {
            $this->assertEquals(0, $score['player1']);
            $this->assertEquals(1, $score['player2']);
        }
        else if($form1 === 2 && $form2 === 3) {
            $this->assertEquals(1, $score['player1']);
            $this->assertEquals(0, $score['player2']);
        }
        if($form1 === 2 && $form2 === 2) {
            $this->assertEquals(0, $score['player1']);
            $this->assertEquals(0, $score['player2']);
        }
        else if($form1 === 3 && $form2 === 1) {
            $this->assertEquals(1, $score['player1']);
            $this->assertEquals(0, $score['player2']);
        }
        else if($form1 === 3 && $form2 === 2) {
            $this->assertEquals(0, $score['player1']);
            $this->assertEquals(1, $score['player2']);
        } else if($form1 === 3 && $form2 === 3) {
            $this->assertEquals(0, $score['player1']);
            $this->assertEquals(0, $score['player2']);
        }
    }

    public function testWinnerPlayer1(): void
    {
        $shifumi = new Shifumi();
        $winner = $shifumi->winner();
        if($shifumi->player1->getScore() > $shifumi->player2->getScore()) {
            $this->assertEquals('Joueur 1 gagnant', $winner);
        } else {
            $this->assertEquals('Joueur 2 gagnant', $winner);
        }
    }

    public function testWinnerPlayer2(): void
    {
        $shifumi = new Shifumi();
        $winner = $shifumi->winner();
        if($shifumi->player1->getScore() < $shifumi->player2->getScore()) {
            $this->assertEquals('Joueur 2 gagnant', $winner);
        } else {
            $this->assertEquals('Joueur 1 gagnant', $winner);
        }
    }

}
