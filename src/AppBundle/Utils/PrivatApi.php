<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 10.12.2017
 * Time: 16:05
 */

namespace AppBundle\Utils;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerTrait;
use AppBundle\Entity\PrivateBank;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\User;

 class PrivatApi
{
    use ControllerTrait;
    const API_URL = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
    public $currency = 'Privat';
    private $response;

     /**
      * @Var EntityManager
      */
     protected $em;

     public function __construct(EntityManager $em)
     {
         $this->em = $em;
     }

    public function request() :array
    {
        return $this->setResponse(json_decode(file_get_contents(self::API_URL)));
    }

    public function setResponse($response)
    {
        return $this->response = $response;
    }

     public function getResponse()
     {
         return $this->response;
     }

     public function arrayForDB() :array
     {
         $private = [];
         foreach ($this->response as  $value) {
             switch ($value->ccy) {
                 case 'USD' :
                     $private['usd_buy'] = $value->buy;
                     $private['usd_sale'] = $value->sale;
                     break;
                 case 'EUR' :
                     $private['euro_buy'] = $value->buy;
                     $private['euro_sale'] = $value->sale;
                     break;
                 case 'RUR' :
                     $private['rur_buy'] = $value->buy;
                     $private['rur_sale'] = $value->sale;
                     break;
                 case 'BTC' :
                     $private['btn_buy'] = $value->buy;
                     $private['btn_sale'] = $value->sale;
                     break;
             }
         }
         return $private;
     }

     public function recordToDB()
     {
         $array = $this->arrayForDB();
         $em = $this->getDoctrine()->getManager();

         $private = new PrivateBank();
         $private->setEuroBuy($array['euro_buy']);
         $private->setEuroSale($array['euro_sale']);
         $private->setUsdBuy($array['usd_buy']);
         $private->setUsdSale($array['usd_sale']);
         $private->setRurBuy($array['rur_buy']);
         $private->setRurSale($array['rur_sale']);
         $private->setBtnBuy($array['btn_buy']);
         $private->setBtnSale($array['btn_sale']);

         $em->persist($national);
         $em->flush();
     }


     private function compareRate($currencyBuy, $currencySale, $currency)
     {
         //request in the db
         $array = $this->arrayForDB();
         if ($array[$currencyBuy] > $yesterdayBuy) {
             $buyDiff = $array[$currencyBuy] - $yesterdayBuy;
             $buyString =  " цена покупки ".$currency." выросла на ".$buyDiff.",";
         } else {
             $buyDiff = $yesterdayBuy - $array[$currencyBuy];
             $buyString =  " цена покупки ".$currency." упала на ".$buyDiff.",";
         }

         if ($array[$currencySale] > $yesterdaySale) {
             $saleDiff = $array[$currencySale] - $yesterdaySale;
             $saleString =  " цена покупки ".$currency." выросла на ".$buyDiff.",";
         } else {
             $saleDiff = $yesterdaySale - $array[$currencySale];
             $saleString =  " цена покупки ".$currency." упала на ".$buyDiff.",";
         }
     }

     public function joinCompares()
     {
         return $this->compareRate('rur_buy', 'rur_sale', 'рубль').
         ", ".$this->compareRate('btn_buy', 'btn_sale', 'Bitcoin')
             .", ".$this->compareRate('usd_buy', 'usd_sale', 'USD').
             ", ".$this->compareRate('euro_buy', 'euro_sale', 'EURO').".";
     }

     public function convert($first, $second)
     {
         return $first * $second;
     }

     public function registration($email, $name) {
         $user = new User();
         $user->setEmail($email);
         $user->setName($name);
         $user->setPrivatBank(1);

         $this->em->persist($user);
         $this->em->flush();
     }
}

