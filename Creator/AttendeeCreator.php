<?php

namespace Rmzamora\CalendarBundle\Creator;

use Rmzamora\CalendarBundle\Model\AttendeeManagerInterface;
use Rmzamora\CalendarBundle\Blamer\AttendeeBlamerInterface;
use Rmzamora\CalendarBundle\Model\AttendeeInterface;

class AttendeeCreator implements AttendeeCreatorInterface
{
    /**
     * The manager
     *
     * @var AttendeeManagerInterface
     */
    protected $attendeeManager;

    /**
     * The blamer
     *
     * @var AttendeeBlamerInterface
     */
    protected $attendeeBlamer;

    public function __construct(AttendeeManagerInterface $attendeeManager, AttendeeBlamerInterface $attendeeBlamer)
    {
        $this->attendeeManager = $attendeeManager;
        $this->attendeeBlamer = $attendeeBlamer;
    }

    public function create(AttendeeInterface $attendee)
    {
        $this->attendeeBlamer->blame($attendee);
        $this->attendeeManager->addAttendee($attendee);

        return true;
    }
}
