<?php

namespace Rmzamora\CalendarBundle\Model;

abstract class CalendarManager implements CalendarManagerInterface
{
    /**
     * (non-PHPdoc)
     * @see \Rmzamora\CalendarBundle\Model\CalendarManagerInterface::createCalendar()
     */
    public function createCalendar()
    {
        $class = $this->getClass();
        $calendar = new $class();

        return $calendar;
    }
}
