<?php

namespace Club\AccountBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminLedgerController extends Controller
{
  /**
   * @Route("/account/ledger/new")
   * @Template
   */
  public function newAction()
  {
    $ledger = new \Club\AccountBundle\Entity\Ledger();
    $form = $this->createForm(new \Club\AccountBundle\Form\Ledger(), $ledger);

    if ($this->getRequest()->getMethod() == 'POST') {
      $form->bindRequest($this->getRequest());

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getEntityManager();

        $em->persist($ledger);
        $em->flush();

        $this->get('session')->setFlash('notice','Your changes has been saved.');
        return $this->redirect($this->generateUrl('club_account_adminledger_index', array('id' => $ledger->getAccount()->getId())));
      }
    }

    return array(
      'form' => $form->createView()
    );
  }

  /**
   * @Route("/account/ledger/{id}")
   * @Template()
   */
  public function indexAction($id)
  {
    $em = $this->getDoctrine()->getEntityManager();

    $ledgers = $em->getRepository('ClubAccountBundle:Ledger')->findBy(array(
      'account' => $id
    ));

    return array(
      'ledgers' => $ledgers
    );
  }
}
