<?php

namespace Rmzamora\CalendarBundle\Model;

abstract class AttendeeManager implements AttendeeManagerInterface
{
    /**
     * (non-PHPdoc)
     * @see \Rmzamora\CalendarBundle\Model\AttendeeManagerInterface::createAttendee()
     */
    public function createAttendee(EventInterface $event)
    {
        $class = $this->getClass();
        $attendee = new $class();

        $attendee->setEvent($event);

        return $attendee;
    }
}
