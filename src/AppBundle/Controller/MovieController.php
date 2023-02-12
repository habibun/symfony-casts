<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use AppBundle\Form\MovieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MovieController extends BaseController
{
    /**
     * @Route("/movies/new", name="movies_new")
     */
    public function newAction(Request $request)
    {
        $movie = new Movie();

        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getEntityManager();
            $em->persist($movie);
            $em->flush();
            // todo do some work, like save ...

            $this->addFlash('success', 'Sam would be pleased');

            return $this->redirectToRoute('movies_list', array());
        }

        return $this->render('movie/new.html.twig', array(
            'quote' => $this->get('quote_generator')->getRandomQuote(),
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/movies", name="movies_list")
     */
    public function listAction()
    {
        $em = $this->getEntityManager();
        $movies = $em->getRepository('AppBundle:Movie')
            ->findAll();

        return $this->render('movie/list.html.twig', array(
            'movies' => $movies,
        ));
    }
}
