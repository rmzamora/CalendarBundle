<?php

namespace Rmzamora\CalendarBundle\Form\Factory;

use Symfony\Component\Form\Form;

interface AttendeeFormFactoryInterface
{

    /**
     * @return Form
     */
    public function createForm($data = null);

}
