<?php

namespace Rmzamora\CalendarBundle\Blamer;

use Rmzamora\CalendarBundle\Model\AttendeeInterface;

class AttendeeNoopBlamer implements AttendeeBlamerInterface
{

    public function blame(AttendeeInterface $attendee)
    {
        // do nothing
    }

}
