<?php

namespace App\Entity;

use App\Repository\Student2Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Student2Repository::class)]
class Student2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
