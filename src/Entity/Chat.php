<?php

namespace App\Entity;

use App\Repository\ChatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChatRepository::class)
 */
class Chat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $caractere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRecueil;

    private $age;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getCaractere(): ?string
    {
        return $this->caractere;
    }

    public function setCaractere(?string $caractere): self
    {
        $this->caractere = $caractere;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDateRecueil(): ?\DateTimeInterface
    {
        return $this->dateRecueil;
    }

    public function setDateRecueil(\DateTimeInterface $dateRecueil): self
    {
        $this->dateRecueil = $dateRecueil;

        return $this;
    }

    public function getAge()
    {
        $now = new \DateTime('now');
        $naissance = $this->getDateNaissance();
        $diff = $now->diff($naissance);

        $this->age = $diff->format('%y ans, %m mois');

        return $diff->format('%y ans, %m mois');
    }

    public function __construct($nom,$race,$sexe, $dateNaissance,$caractere,$photo,$dateRecueil){
        $this->setNom($nom);
        $this->setRace($race);
        $this->setSexe($sexe);
        $this->setDateNaissance($dateNaissance);
        $this->setCaractere($caractere);
        $this->setPhoto($photo);
        $this->setDateRecueil($dateRecueil);
     }
}
