<?php

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="scores")
 */
class Score
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private int $id;

    /**
     * @ORM\Column(type="float")
     */
    private float $score;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?string $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="Player")
     */
    private ?Player $player;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="Game")
     */
    private ?Game $game;
}