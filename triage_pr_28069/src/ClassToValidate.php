<?php

namespace App;

use Symfony\Component\Validator\Constraints as Assert;

class ClassToValidate
{
    /**
     * @Assert\MultipleOf(5)
     * @Assert\Blank()
     */
    public $enteredNumber;
}
