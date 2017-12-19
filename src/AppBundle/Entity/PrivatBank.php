<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Private
 *
 * @ORM\Table(name="privat_bank")
 * @ORM\Entity
 */
class PrivatBank
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

}

