<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Private
 *
 * @ORM\Table(name="privat_bank")
 * @ORM\Entity
 */
class PrivateBank
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", precision=10, scale=0, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="euro_buy", type="float", precision=10, scale=0, nullable=false)
     */
    private $euroBuy;

    /**
     * @var float
     *
     * @ORM\Column(name="euro_sale", type="float", precision=10, scale=0, nullable=false)
     */
    private $euroSale;

    /**
     * @var float
     *
     * @ORM\Column(name="usd_buy", type="float", precision=10, scale=0, nullable=false)
     */
    private $usdBuy;

    /**
     * @var float
     *
     * @ORM\Column(name="usd_sale", type="float", precision=10, scale=0, nullable=false)
     */
    private $usdSale;

    /**
     * @var float
     *
     * @ORM\Column(name="rur_buy", type="float", precision=10, scale=0, nullable=false)
     */
    private $rurBuy;

    /**
     * @var float
     *
     * @ORM\Column(name="rur_sale", type="float", precision=10, scale=0, nullable=false)
     */
    private $rurSale;

    /**
     * @var float
     *
     * @ORM\Column(name="btn_buy", type="float", precision=10, scale=0, nullable=false)
     */
    private $btnBuy;

    /**
     * @var float
     *
     * @ORM\Column(name="btn_sale", type="float", precision=10, scale=0, nullable=false)
     */
    private $btnSale;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return float
     */
    public function getEuroBuy(): float
    {
        return $this->euroBuy;
    }

    /**
     * @param float $euroBuy
     */
    public function setEuroBuy(float $euroBuy)
    {
        $this->euroBuy = $euroBuy;
    }

    /**
     * @return float
     */
    public function getEuroSale(): float
    {
        return $this->euroSale;
    }

    /**
     * @param float $euroSale
     */
    public function setEuroSale(float $euroSale)
    {
        $this->euroSale = $euroSale;
    }

    /**
     * @return float
     */
    public function getUsdBuy(): float
    {
        return $this->usdBuy;
    }

    /**
     * @param float $usdBuy
     */
    public function setUsdBuy(float $usdBuy)
    {
        $this->usdBuy = $usdBuy;
    }

    /**
     * @return float
     */
    public function getUsdSale(): float
    {
        return $this->usdSale;
    }

    /**
     * @param float $usdSale
     */
    public function setUsdSale(float $usdSale)
    {
        $this->usdSale = $usdSale;
    }

    /**
     * @return float
     */
    public function getRurBuy(): float
    {
        return $this->rurBuy;
    }

    /**
     * @param float $rurBuy
     */
    public function setRurBuy(float $rurBuy)
    {
        $this->rurBuy = $rurBuy;
    }

    /**
     * @return float
     */
    public function getRurSale(): float
    {
        return $this->rurSale;
    }

    /**
     * @param float $rurSale
     */
    public function setRurSale(float $rurSale)
    {
        $this->rurSale = $rurSale;
    }

    /**
     * @return float
     */
    public function getBtnBuy(): float
    {
        return $this->btnBuy;
    }

    /**
     * @param float $btnBuy
     */
    public function setBtnBuy(float $btnBuy)
    {
        $this->btnBuy = $btnBuy;
    }

    /**
     * @return float
     */
    public function getBtnSale(): float
    {
        return $this->btnSale;
    }

    /**
     * @param float $btnSale
     */
    public function setBtnSale(float $btnSale)
    {
        $this->btnSale = $btnSale;
    }

}

