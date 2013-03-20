<?php

namespace Rmzamora\CalendarBundle\Creator;

use Rmzamora\CalendarBundle\Model\AttendeeInterface;

interface AttendeeCreatorInterface
{
    /**
     * Performs operations when creating an $attendee
     *
     * @param AttendeeInterface $attendee The attendee
     *
     * @return boolean Whether the creation was a success
     */
    public function create(AttendeeInterface $attendee);
}
