<?php

namespace Alex\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seance_Exercice_Serie
 *
 * @ORM\Table(name="seance__exercice__serie")
 * @ORM\Entity(repositoryClass="Alex\PlatformBundle\Repository\Seance_Exercice_SerieRepository")
 */
class Seance_Exercice_Serie
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
     * @ORM\Column(name="rep", type="integer")
     */
    private $rep;

    /**
     * @var int
     *
     * @ORM\Column(name="charge", type="integer")
     */
    private $charge;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Alex\PlatformBundle\Entity\Seance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seance;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Alex\PlatformBundle\Entity\Exercice")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exercice;


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
     * Set rep
     *
     * @param integer $rep
     *
     * @return Seance_Exercice_Serie
     */
    public function setRep($rep)
    {
        $this->rep = $rep;

        return $this;
    }

    /**
     * Get rep
     *
     * @return int
     */
    public function getRep()
    {
        return $this->rep;
    }

    /**
     * Set charge
     *
     * @param integer $charge
     *
     * @return Seance_Exercice_Serie
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;

        return $this;
    }

    /**
     * Get charge
     *
     * @return int
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * Set seance
     *
     * @param \Alex\PlatformBundle\Entity\Seance $seance
     *
     * @return Seance_Exercice_Serie
     */
    public function setSeance(\Alex\PlatformBundle\Entity\Seance $seance)
    {
        $this->seance = $seance;

        return $this;
    }

    /**
     * Get seance
     *
     * @return \Alex\PlatformBundle\Entity\Seance
     */
    public function getSeance()
    {
        return $this->seance;
    }

    /**
     * Set exercice
     *
     * @param \Alex\PlatformBundle\Entity\Exercice $exercice
     *
     * @return Seance_Exercice_Serie
     */
    public function setExercice(\Alex\PlatformBundle\Entity\Exercice $exercice)
    {
        $this->exercice = $exercice;

        return $this;
    }

    /**
     * Get exercice
     *
     * @return \Alex\PlatformBundle\Entity\Exercice
     */
    public function getExercice()
    {
        return $this->exercice;
    }
}
