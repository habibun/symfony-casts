<?php

namespace App\Controller;

use App\ClassToValidate;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TestingController
{
    public function test(ValidatorInterface $validator)
    {
        $myObject = new ClassToValidate();
        $myObject->enteredNumber = 9;

        $errors = $validator->validate($myObject);
        var_dump($errors);die;
    }
}