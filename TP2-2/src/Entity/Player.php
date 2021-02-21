<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="players")
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
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
    private ?string $username="";

    /**
     * @ORM\Column(type="string")
     */
    private ?string $email="";

    // /**
    //  * @ORM\ManyToMany(targetEntity="Game", inversedBy="owned")
    //  */
    // private ?Game $owned;

    // /**
    //  * @ORM\OneToMany(targetEntity="Score", mappedBy="player")
    //  */
    // private ?Score $score;

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
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    // /**
    //  * @return Game|null
    //  */
    // public function getOwned(): ?Game
    // {
    //     return $this->owned;
    // }

    // /**
    //  * @param string|null $owned
    //  */
    // public function setOwned(?Game $owned): void
    // {
    //     $this->owned = $owned;
    // }

    // /**
    //  * @return Score|null
    //  */
    // public function getScore(): ?Score
    // {
    //     return $this->score;
    // }

    // /**
    //  * @param Score|null $score
    //  */
    // public function setScore(?string $score): void
    // {
    //     $this->score = $score;
    // }

}