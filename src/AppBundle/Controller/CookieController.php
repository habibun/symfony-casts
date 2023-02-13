<?php

namespace AppBundle\Controller;

use AppBundle\Security\CookieVoter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class CookieController extends Controller
{
    /**
     * @Route("/cookies", name="cookie_list")
     */
    public function indexAction()
    {
        $cookies = $this->getDoctrine()
            ->getRepository('AppBundle:DeliciousCookie')
            ->findAll();

        return $this->render('Cookie/index.html.twig', array(
            'cookies' => $cookies,
        ));
    }

    /**
     * @Route("/cookies/nom/{id}", name="cookie_nom")
     * @Method("POST")
     */
    public function nomAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $cookie = $em->getRepository('AppBundle:DeliciousCookie')
            ->find($id);

        if (!$cookie) {
            throw $this->createNotFoundException();
        }

        if (!$this->isGranted(CookieVoter::ATTRIBUTE_NOM, $cookie)) {
            throw $this->createAccessDeniedException('You did not bake this delicious cookie!');
        }

        $em->remove($cookie);
        $em->flush();

        // a new shortcut in Symfony 2.6!
        // 2.5 and below: $request->getSession()->getFlashbag()->add(...);
        $this->addFlash('success', sprintf('That %s was DELICIOUS!', $cookie->getFlavor()));

        $url = $this->generateUrl('cookie_list');

        return $this->redirect($url);
    }
}
