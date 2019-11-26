<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BottleRepository")
 */
class Bottle
{
    const DESIGNATION = 'Origine controlé';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $degree;

    /**
     * @ORM\Column(type="integer")
     */
    private $vintage;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="boolean", options={"default": false })
     */
    private $sold = false;

    /**
     * @ORM\Column(type="datetime")
     */
    private $consumption_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    public function getId() // : ?int
    {
        return $this->id;
    }

    public function getName() // : ?string
    {
        return $this->name;
    }

    public function setName($name) // : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug() //:string
    {
        return ( new Slugify())->slugify($this->name);
    }

    public function getDescription() // : ?string
    {
        return $this->description;
    }

    public function setDescription($description) // : self
    {
        $this->description = $description;

        return $this;
    }

    public function getDegree() // : ?int
    {
        return $this->degree;
    }

    public function setDegree($degree) // : self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getVintage() // : ?int
    {
        return $this->vintage;
    }

    public function setVintage($vintage) // : self
    {
        $this->vintage = $vintage;

        return $this;
    }

    public function getQuantity() // : ?int
    {
        return $this->quantity;
    }

    public function setQuantity($quantity) // : self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice() // : ?int
    {
        return $this->price;
    }

    /**
     * @param $price
     * @return $this
     */
    public function setPrice($price) // : self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormattedPrice()
    {
        return number_format($this->price,0,'',' ' );
    }

    public function getDesignation() // : ?string
    {
        return $this->designation;
    }

    public function setDesignation($designation) // : self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSold() // : ?bool
    {
        return $this->sold;
    }

    public function setSold($sold) // : self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getConsumptionDate() // : ?\DateTimeInterface
    {
        return $this->consumption_date;
    }

    public function setConsumptionDate($consumption_date) // : self
    {
        $this->consumption_date = $consumption_date;

        return $this;
    }

    public function getType() // : ?string
    {
        return $this->type;
    }

    public function setType($type) // : self
    {
        $this->type = $type;

        return $this;
    }

    public function getPicture() // : ?string
    {
        return $this->picture;
    }

    public function setPicture($picture) // : self
    {
        $this->picture = $picture;

        return $this;
    }
}
