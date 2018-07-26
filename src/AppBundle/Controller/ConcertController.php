<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ConcertController extends Controller
{
    /**
     * @Route("/concert/")
     */
    public function indexAction(){
        $concertList = [
            [
                'date' => '2015/5/3',
                'time' => '14:00',
                'place' => '東京文化会館',
                'available' => false,
            ],
            [
                'date' => '2015/7/12',
                'time' => '14:00',
                'place' => '鎌倉文化会館',
                'available' => true,
            ],
            [
                'date' => '2015/9/20',
                'time' => '15:00',
                'place' => '横浜みなとみらいホール',
                'available' => true,
            ],
            [
                'date' => '2015/11/8',
                'time' => '15:00',
                'place' => 'Yokosuka',
                'available' => false,
            ],
            [
                'date' => '2016/1/10',
                'time' => '14:00',
                'place' => 'SHIBUYA',
                'available' => true,
            ],
        ];
        return $this->render('Concert/index.html.twig', ['concertList' => $concertList]);
    }
}
