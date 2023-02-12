<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/posts")
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        return $this->render('Post/index.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * @Route("/posts/{id}", name="post_show")
     */
    public function showAction(Post $post)
    {
        return $this->render('Post/show.html.twig', array(
            'post' => $post
        ));
    }
}
