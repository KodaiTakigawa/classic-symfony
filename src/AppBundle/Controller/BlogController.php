<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
    public function latestListAction(){
        $blogList = [
            [
                'targetDate' => '2015/3/15',
                'title' => 'report of tokyo-koen'
            ],
            [
                'targetDate' => '2015/2/8',
                'title' => 'practice these days'
            ],
            [
                'targetDate' => '2015/1/3',
                'title' => 'Nice to meet you'
            ],
        ];

        return $this->render('Blog/latestList.html.twig', ['blogList' => $blogList]);
    }
}
