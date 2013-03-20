<?php

namespace Rmzamora\CalendarBundle\Blamer;

use Rmzamora\CalendarBundle\Model\CalendarInterface;

interface CalendarBlamerInterface
{
    /**
     * Perfoms operations on the $calendar
     *
     * @param CalendarInterface $calendar The calendar
     */
    public function blame(CalendarInterface $calendar);
}
