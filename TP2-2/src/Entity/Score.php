<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="scores")
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
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
    private \DateTime $created_at;
    
    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="Player")
     */
    private ?Player $player;
    
    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="Game")
     */
    private ?Game $game;
    
    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

     /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float|null
     */
    public function getScore(): ?float
    {
        return $this->score;
    }

    /**
     * @param float|null $email
     */
    public function setScore(?float $score): void
    {
        $this->score = $score;
    }
    /**
     * @return datetime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    /**
     * @param datetime|null $created_at
     */
    public function setCreatedAt(?\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
    /**
     * @return Player|null
     */
    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    /**
     * @param Player|null $player
     */
    public function setPlayer(?Player $player): void
    {
        $this->player = $player;
    }
    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     */
    public function setGame(?Game $game): void
    {
        $this->game = $game;
    }
}