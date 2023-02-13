<?php

namespace App\Controller;

use App\SomeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContainerTestController extends AbstractController
{
    public function test()
    {
        $form = $this->createForm(SomeFormType::class);
        // error will happen on previous line
    }
}
