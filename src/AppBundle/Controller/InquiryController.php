<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\InquiryType;
use AppBundle\Entity\Inquiry;
use AppBundle\Controller\Request;

class InquiryController extends Controller
{
    private function cForm($entity){
        $form = $this->createForm(new InquiryType(), $entity, [
            // actionを定義
            'action' => $this->generateUrl('create'),
            // methodを定義
            'method' => 'POST'
        ]);
        $form->add('submit', 'submit');
        return $form;
    }


    /**
     * @Route("/inquiry")
     */
    public function indexAction(){
        $inquiry = new Inquiry();
        $form = $this->cForm($inquiry);
//        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        // もし$formが変数を持っていたら、
        if($form->isValid()) {
            // $Inquiryは$this->cForm($inquiry);によって書き換えられてい(参照渡し)
            // DBへの通信を減らすための何か
            $em->persist($inquiry);
            // DBを更新
            $em->flush();
        }
        return $this->render('Inquiry/index.html.twig', ['form' => $form->createView()]);
    }

}
