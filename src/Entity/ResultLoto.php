<?php

namespace App\Entity;

use App\Repository\ResultLotoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultLotoRepository::class)]
class ResultLoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $ball_1 = null;

    #[ORM\Column]
    private ?int $ball_2 = null;

    #[ORM\Column]
    private ?int $ball_3 = null;

    #[ORM\Column]
    private ?int $ball_4 = null;

    #[ORM\Column]
    private ?int $ball_5 = null;

    #[ORM\Column]
    private ?int $lucky_number = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getBall1(): ?int
    {
        return $this->ball_1;
    }

    public function setBall1(int $ball_1): self
    {
        $this->ball_1 = $ball_1;

        return $this;
    }

    public function getBall2(): ?int
    {
        return $this->ball_2;
    }

    public function setBall2(int $ball_2): self
    {
        $this->ball_2 = $ball_2;

        return $this;
    }

    public function getBall3(): ?int
    {
        return $this->ball_3;
    }

    public function setBall3(int $ball_3): self
    {
        $this->ball_3 = $ball_3;

        return $this;
    }

    public function getBall4(): ?int
    {
        return $this->ball_4;
    }

    public function setBall4(int $ball_4): self
    {
        $this->ball_4 = $ball_4;

        return $this;
    }

    public function getBall5(): ?int
    {
        return $this->ball_5;
    }

    public function setBall5(int $ball_5): self
    {
        $this->ball_5 = $ball_5;

        return $this;
    }

    public function getLuckyNumber(): ?int
    {
        return $this->lucky_number;
    }

    public function setLuckyNumber(int $lucky_number): self
    {
        $this->lucky_number = $lucky_number;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }
}
