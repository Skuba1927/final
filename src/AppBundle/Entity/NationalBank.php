<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * National
 *
 * @ORM\Table(name="national_bank")
 * @ORM\Entity
 */
class NationalBank
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="usd", type="float", precision=10, scale=0, nullable=false)
     */
    private $usd;

    /**
     * @var float
     *
     * @ORM\Column(name="euro", type="float", precision=10, scale=0, nullable=false)
     */
    private $eur;

    /**
     * @var float
     *
     * @ORM\Column(name="rub", type="float", precision=10, scale=0, nullable=false)
     */
    private $rub;

    /**
     * @var float
     *
     * @ORM\Column(name="pln", type="float", precision=10, scale=0, nullable=false)
     */
    private $pln;
    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }


    /**
     * @return float
     */
    public function getUsd(): float
    {
        return $this->usd;
    }

    /**
     * @param float $usd
     */
    public function setUsd(float $usd)
    {
        $this->usd = $usd;
    }

    /**
     * @return float
     */
    public function getEur(): float
    {
        return $this->eur;
    }

    /**
     * @param float $eur
     */
    public function setEur(float $eur)
    {
        $this->eur = $eur;
    }

    /**
     * @return float
     */
    public function getRub(): float
    {
        return $this->rub;
    }

    /**
     * @param float $rub
     */
    public function setRub(float $rub)
    {
        $this->rub = $rub;
    }

    /**
     * @return float
     */
    public function getPln(): float
    {
        return $this->pln;
    }

    /**
     * @param float $pln
     */
    public function setPln(float $pln)
    {
        $this->pln = $pln;
    }




}

