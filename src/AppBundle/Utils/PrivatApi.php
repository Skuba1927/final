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
use AppBundle\Entity\Private;

 class PrivatApi
{
    use ControllerTrait;
    const API_URL = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
    public $currency = 'Privat';
    private $response;

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

     private function arrayForDB() :array
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
                 case 'BTN' :
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

         $private = new Private();
         $private->setEuro_buy($array['euro_buy']);
         $private->setEuro_sale($array['euro_sale']);
         $private->setUsd_buy($array['usd_buy']);
         $private->setUsd_sale($array['usd_sale']);
         $private->setRur_buy($array['rur_buy']);
         $private->setRur_sale($array['rur_sale']);
         $private->setBtn_buy($array['btn_buy']);
         $private->setBtn_sale($array['btn_sale']);

         $em->persist($national);
         $em->flush();
     }

}

