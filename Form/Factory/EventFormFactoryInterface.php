<?php

namespace Rmzamora\CalendarBundle\Form\Factory;

use Symfony\Component\Form\Form;

interface EventFormFactoryInterface
{

    /**
     * @return Form
     */
    public function createForm($data = null);

}
