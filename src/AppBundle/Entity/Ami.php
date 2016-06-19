<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ami
 *
 * @ORM\Table(name="ami")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AmiRepository")
 */
class Ami
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
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer", nullable=true)
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\Column(name="idami", type="integer", nullable=true)
     */
    private $idami;


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
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Ami
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
     * Set idami
     *
     * @param integer $idami
     *
     * @return Ami
     */
    public function setIdami($idami)
    {
        $this->idami = $idami;

        return $this;
    }

    /**
     * Get idami
     *
     * @return int
     */
    public function getIdami()
    {
        return $this->idami;
    }
}

