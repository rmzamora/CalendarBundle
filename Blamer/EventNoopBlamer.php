<?php

namespace Rmzamora\CalendarBundle\Blamer;

use Rmzamora\CalendarBundle\Model\EventInterface;

class EventNoopBlamer implements EventBlamerInterface
{

    public function blame(EventInterface $event)
    {
        // do nothing
    }

}
