<?php

namespace Rmzamora\CalendarBundle\Creator;

use Rmzamora\CalendarBundle\Model\EventInterface;

interface EventCreatorInterface
{
    /**
     * Performs operations when creating an event
     *
     * @param EventInterface $event The event to create
     *
     * @return boolean Whether the creation was a success
     */
    public function create(EventInterface $event);
}
