<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="user_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string",unique=true, length=30, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="private", type="boolean", nullable=true, options={"default":0})
     */

    private $privatBank;

    /**
     * @var boolean
     *
     * @ORM\Column(name="national", type="boolean", nullable=true,  options={"default":0})
     */

    private $nationalBank;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bitcoin", type="boolean", nullable=true,  options={"default":0})
     */

    private $bitcoin;

    /**
     * @return mixed
     */
    public function getPrivatBank()
    {
        return $this->privatBank;
    }

    /**
     * @param mixed $privatBank
     */
    public function setPrivatBank($privatBank)
    {
        $this->privatBank = $privatBank;
    }

    /**
     * @return bool
     */
    public function isNationalBank(): bool
    {
        return $this->nationalBank;
    }

    /**
     * @param bool $nationalBank
     */
    public function setNationalBank(bool $nationalBank)
    {
        $this->nationalBank = $nationalBank;
    }

    /**
     * @return bool
     */
    public function isBitcoin(): bool
    {
        return $this->bitcoin;
    }

    /**
     * @param bool $bitcoin
     */
    public function setBitcoin(bool $bitcoin)
    {
        $this->bitcoin = $bitcoin;
    }


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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
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
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }



}

