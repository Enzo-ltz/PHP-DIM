<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="games")
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $image;

    /**
     * @ORM\ManyToMany(targetEntity="Player", mappedBy="Player")
     */
    private ?Player $owned;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="Player")
     */
    private ?Score $score;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
    /**
     * @return Player|null
     */
    public function getOwned(): ?Player
    {
        return $this->owned;
    }

    /**
     * @param Player|null $owned
     */
    public function setOwned(?Player $owned): void
    {
        $this->owned = $owned;
    }
    /**
     * @return Score|null
     */
    public function getScore(): ?Score
    {
        return $this->score;
    }

    /**
     * @param Score|null $score
     */
    public function setScore(?Score $score): void
    {
        $this->score = $score;
    }
}