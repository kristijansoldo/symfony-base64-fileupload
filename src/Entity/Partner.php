<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Partner
 *
 * @ORM\Entity(repositoryClass=PartnerRepository::class)
 * @Table(name="Partner")
 *
 * @package App\Entity
 */
class Partner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250, name="Firmenname")
     * @var string
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=300, name="Anschrift")
     * @var string
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=250, name="Email")
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100, name="Telefonnummer")
     * @var string
     */
    private $telephone;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return Partner
     */
    public function setCompanyName(string $companyName): Partner
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdress(): string
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     * @return Partner
     */
    public function setAdress(string $adress): Partner
    {
        $this->adress = $adress;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Partner
     */
    public function setEmail(string $email): Partner
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return Partner
     */
    public function setTelephone(string $telephone): Partner
    {
        $this->telephone = $telephone;
        return $this;
    }
}
