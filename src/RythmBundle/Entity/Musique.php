<?php

namespace RythmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musique
 *
 * @ORM\Table(name="musique")
 * @ORM\Entity(repositoryClass="RythmBundle\Repository\MusiqueRepository")
 */
class Musique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="musique", type="string", length=255, nullable=true)
     */
    private $musique;

    /**
     * @var int
     *
     * @ORM\Column(name="idalbum", type="integer", nullable=true)
     */
    private $idalbum;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer", nullable=true)
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\Column(name="numpiste", type="integer", nullable=true)
     */
    private $numpiste;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Musique
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set musique
     *
     * @param string $musique
     *
     * @return Musique
     */
    public function setMusique($musique)
    {
        $this->musique = $musique;

        return $this;
    }

    /**
     * Get musique
     *
     * @return string
     */
    public function getMusique()
    {
        return $this->musique;
    }

    /**
     * Set idalbum
     *
     * @param integer $idalbum
     *
     * @return Musique
     */
    public function setIdalbum($idalbum)
    {
        $this->idalbum = $idalbum;

        return $this;
    }

    /**
     * Get idalbum
     *
     * @return int
     */
    public function getIdalbum()
    {
        return $this->idalbum;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Musique
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return int
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set numpiste
     *
     * @param integer $numpiste
     *
     * @return Musique
     */
    public function setNumpiste($numpiste)
    {
        $this->numpiste = $numpiste;

        return $this;
    }

    /**
     * Get numpiste
     *
     * @return int
     */
    public function getNumpiste()
    {
        return $this->numpiste;
    }
}

