<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\InquiryType;
use AppBundle\Entity\Inquiry;
use Symfony\Component\HttpFoundation\Request;

class InquiryController extends Controller
{
	private function cForm($entity){
		$form = $this->createForm(new InquiryType(), $entity, []);
		return $form;
	}


	/**
	 * @Route("/inquiry")
	 * @Method("get")
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

	/**
	 * @Route("/complete")
	 * 
	*/
	public function completeAction(){
		return $this->render('Inquiry/complete.html.twig');
	}


	/**
	 * @Route("/inquiry", name="appbundle_inquiry_post")
	 * @Method("post")
	 */
	public function indexPostAction(Request $request){
		$inquiry = new Inquiry();
		$form = $this->cForm($inquiry);
		$form->handleRequest($request);
		if ($form->isValid()) {
			return $this->redirect($this->generateUrl('app_inquiry_complete'));
		}
		return $this->render('Inquiry/index.html.twig', ['form' => $form->createView()]);
	}
	@Route("/answer/{id}/change", name="backend_completed_product_form_change_cfa_status")
}
