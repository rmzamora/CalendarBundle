<?php

namespace Rmzamora\CalendarBundle\Blamer;

use Rmzamora\CalendarBundle\Model\CalendarInterface;

class CalendarNoopBlamer implements CalendarBlamerInterface
{

    public function blame(CalendarInterface $calendar)
    {
        // do nothing
    }

}
