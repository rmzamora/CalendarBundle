<?php

namespace Rmzamora\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Rmzamora\CalendarBundle\Model\AttendeeInterface;

class AttendeeType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('status', 'choice', array(
                'choices' => array(
                    AttendeeInterface::STATUS_ACCEPT    => 'Accept',
                    AttendeeInterface::STATUS_TENTATIVE => 'Tentative',
                    AttendeeInterface::STATUS_DECLINE   => 'Decline',
                ),
            ));
    }

    public function getName()
    {
        return 'rmzamora_calendar_attendee';
    }

}
