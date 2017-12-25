<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 12.12.2017
 * Time: 20:32
 */

namespace AppBundle\Utils;

use AppBundle\Entity\NationalBank;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class NationalApi extends Controller
{
    use ControllerTrait;
    const API_URL = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';
    public $currency = 'National Bank';
    private $response;
    public $nationalArray;

    /**
     * @Var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    private function setResponse($response)
    {
        return $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function request()
    {
        return $this->setResponse(json_decode(file_get_contents(self::API_URL)));
    }

    public function printRate() {
        $printArray = [];
        foreach ($this->response as  $value) {
            switch ($value->cc) {
                case 'USD' :
                    $printArray['USD'] = $value;
                    break;
                case 'EUR' :
                    $printArray['EUR'] = $value;
                    break;
                case 'PLN' :
                    $printArray['PLN'] = $value;
                    break;
                case 'RUB' :
                    $printArray['RUB'] = $value;
                    break;
            }
        }
        return $printArray;
    }


    //подготавлоивает массив к записи в базу
    public function arrayForDB() :array
    {
        foreach ($this->response as  $value) {
            switch ($value->cc) {
                case 'USD' :
                    $this->nationalArray['USD'] = $value->rate;
                    break;
                case 'EUR' :
                    $this->nationalArray['EUR'] = $value->rate;
                    break;
                case 'PLN' :
                    $this->nationalArray['PLN'] = $value->rate;
                    break;
                case 'RUB' :
                    $this->nationalArray['RUB'] = $value->rate;
                    break;
            }
        }
        return $this->nationalArray;
    }

    //делает запись в базу данных
    public function recordToDB()
    {
        $array = $this->arrayForDB();
        $em = $this->getDoctrine()->getManager();

        $national = new NationalBank();
        $national->setEur($array['EUR']);
        $national->setUsd($array['USD']);
        $national->setPln($array['PLN']);
        $national->setRub($array['RUB']);

        $em->persist($national);
        $em->flush();
    }

    public function convert($first, $second)
    {
        return $first * $second;
    }

    private function compareRate($currency)
    {
        //делает запрос в БД, сравнивает сегодняшнюю и вчерашнюю и возвращает текст
        $array = $this->arrayForDB();
        if ($array[$currency] > $yesterday) {
            $string = " ".$currency." курс ввыросл на ";
            $diff = $array[$currency] - $yesterday;
        } else {
            $string = " ".$currency." курс упал на ";
            $diff = $yesterday - $array[$currency];
        }
        return $string.$diff;
    }

    public function joinCompares()
    {
        return $this->compareRate('RUB').", ".$this->compareRate('PLN')
            .", ".$this->compareRate('USD').", ".$this->compareRate('EUR').".";
    }

    public function registration($email, $name) {
        $user = new User();
        $user->setEmail($email);
        $user->setName($name);
        $user->setNationalBank(1);

        $this->em->persist($user);
        $this->em->flush();
    }
}
