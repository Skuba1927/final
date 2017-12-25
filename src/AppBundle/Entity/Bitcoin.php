<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bitcoin
 *
 * @ORM\Table(name="bitcoin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BitcoinRepository")
 */
class Bitcoin
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false) */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="sell", type="float", precision=10, scale=0, nullable=false)
     */
    private $sell;

    /**
     * @var float
     *
     * @ORM\Column(name="buy", type="float", precision=10, scale=0, nullable=false)
     */
    private $buy;

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate()
    {
        $this->date = new \DateTime("now");;
    }


    /**
     * @return float
     */
    public function getSell(): float
    {
        return $this->sell;
    }

    /**
     * @param float $sell
     */
    public function setSell(float $sell)
    {
        $this->sell = $sell;
    }

    /**
     * @return float
     */
    public function getBuy(): float
    {
        return $this->buy;
    }

    /**
     * @param float $buy
     */
    public function setBuy(float $buy)
    {
        $this->buy = $buy;
    }



}

