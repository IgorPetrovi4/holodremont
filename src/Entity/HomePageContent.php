<?php

namespace App\Entity;

use App\Repository\HomePageContentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=HomePageContentRepository::class)
 */
class HomePageContent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $imgCarusel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headingCarusel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textCarusel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgCircle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headingCircle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textCircle;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgMarketing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $headingMarketing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textMarketing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgCarusel()
    {
        return $this->imgCarusel;
    }

    public function setImgCarusel($imgCarusel)
    {
        $this->imgCarusel = $imgCarusel;

        return $this;
    }

    public function getheadingCarusel(): ?string
    {
        return $this->headingCarusel;
    }

    public function setheadingCarusel(string $headingCarusel): self
    {
        $this->headingCarusel = $headingCarusel;

        return $this;
    }

    public function getTextCarusel(): ?string
    {
        return $this->textCarusel;
    }

    public function setTextCarusel(string $textCarusel): self
    {
        $this->textCarusel = $textCarusel;

        return $this;
    }

    public function getImgCircle()
    {
        return $this->imgCircle;
    }

    public function setImgCircle($imgCircle)
    {
        $this->imgCircle = $imgCircle;

        return $this;
    }

    public function getHeadingCircle(): ?string
    {
        return $this->headingCircle;
    }

    public function setHeadingCircle(string $headingCircle): self
    {
        $this->headingCircle = $headingCircle;

        return $this;
    }
    public function getTextCircle(): ?string
    {
        return $this->textCircle;
    }

    public function setTextCircle(string $textCircle): self
    {
        $this->textCircle = $textCircle;

        return $this;
    }
    public function getImgMarketing()
    {
        return $this->imgMarketing;
    }

    public function setImgMarketing($imgMarketing)
    {
        $this->imgMarketing = $imgMarketing;

        return $this;
    }

    public function getHeadingMarketing(): ?string
    {
        return $this->headingMarketing;
    }

    public function setHeadingMarketing(string $headingMarketing): self
    {
        $this->headingMarketing = $headingMarketing;

        return $this;
    }

    public function getTextMarketing(): ?string
    {
        return $this->textMarketing;
    }

    public function setTextMarketing(string $textMarketing): self
    {
        $this->textMarketing = $textMarketing;

        return $this;
    }
}
