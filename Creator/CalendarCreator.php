<?php

namespace Rmzamora\CalendarBundle\Creator;

use Rmzamora\CalendarBundle\Model\CalendarManagerInterface;
use Rmzamora\CalendarBundle\Blamer\CalendarBlamerInterface;
use Rmzamora\CalendarBundle\Model\CalendarInterface;

class CalendarCreator implements CalendarCreatorInterface
{
    /**
     * The manager
     *
     * @var CalendarManagerInterface
     */
    protected $calendarManager;

    /**
     * The blamer
     *
     * @var CalendarBlamerInterface
     */
    protected $calendarBlamer;

    public function __construct(CalendarManagerInterface $calendarManager, CalendarBlamerInterface $calendarBlamer)
    {
        $this->calendarManager = $calendarManager;
        $this->calendarBlamer = $calendarBlamer;
    }

    public function create(CalendarInterface $calendar)
    {
        $this->calendarBlamer->blame($calendar);
        $this->calendarManager->addCalendar($calendar);

        return true;
    }
}
