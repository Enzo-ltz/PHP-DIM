<?php

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="players")
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
    private ?string $username;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $email;

    /**
     * @ORM\OneToOne(targetEntity="Game", inversedBy="owned")
     */
    private ?Game $owned;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="player")
     */
    private ?Score $score;

}