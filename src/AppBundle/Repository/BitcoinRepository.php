<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 22.12.2017
 * Time: 14:12
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Bitcoin;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class BitcoinRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bitcoin::class);
    }
}