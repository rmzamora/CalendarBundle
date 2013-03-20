<?php

namespace Rmzamora\CalendarBundle\Blamer;

use Rmzamora\CalendarBundle\Model\EventInterface;

interface EventBlamerInterface
{
    /**
     * Performs operations on the $event
     *
     * @param EventInterface $event The event
     */
    public function blame(EventInterface $event);
}
