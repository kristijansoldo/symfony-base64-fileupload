<?php

namespace App\Entity;

use App\Repository\DamageReportRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

/**
 * Class DamageReport
 *
 * @ORM\Entity(repositoryClass=DamageReportRepository::class)
 * @Table(name="Glasschadenmeldung")
 *
 * @package App\Entity
 */
class DamageReport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250, name="Vorname")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=250, name="Nachname")
     */
    private $surName;

    /**
     * @ORM\Column(type="string", length=250, name="Anschrift")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=250, name="Telefonnummer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=250, name="Email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=250, name="KFZ_Versicherung")
     */
    private $kfzInsurance;

    /**
     * @ORM\Column(type="string", length=250, name="Partner_ID")
     */
    private $partnerId;

    /**
     * @ORM\Column(type="string", length=250, name="Bild_Location")
     */
    private $photoPath;

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
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSurName(): string
    {
        return $this->surName;
    }

    /**
     * @param string $surName
     * @return $this
     */
    public function setSurName(string $surName): self
    {
        $this->surName = $surName;

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
     * @return $this
     */
    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

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
     * @return $this
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getKfzInsurance(): string
    {
        return $this->kfzInsurance;
    }

    /**
     * @param string $kfzInsurance
     * @return $this
     */
    public function setKfzInsurance(string $kfzInsurance): self
    {
        $this->kfzInsurance = $kfzInsurance;

        return $this;
    }

    /**
     * @return string
     */
    public function getPartnerId(): string
    {
        return $this->partnerId;
    }

    /**
     * @param string $partnerId
     * @return $this
     */
    public function setPartnerId(string $partnerId): self
    {
        $this->partnerId = $partnerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoPath(): string
    {
        return $this->photoPath;
    }

    /**
     * @param string $photoPath
     * @return $this
     */
    public function setPhotoPath(string $photoPath): self
    {
        $this->photoPath = $photoPath;

        return $this;
    }
}
