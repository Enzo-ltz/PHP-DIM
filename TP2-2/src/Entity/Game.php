<?php

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="games")
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
     * @ORM\OneToOne(targetEntity="Player", mappedBy="Player")
     */
    private ?Player $owned;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="Player")
     */
    private ?Score $score;
}