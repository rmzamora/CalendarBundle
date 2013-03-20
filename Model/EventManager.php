<?php

namespace Rmzamora\CalendarBundle\Model;

abstract class EventManager implements EventManagerInterface
{
    /**
     * (non-PHPdoc)
     * @see \Rmzamora\CalendarBundle\Model\EventManagerInterface::createEvent()
     */
    public function createEvent(CalendarInterface $calendar)
    {
        $class = $this->getClass();
        $event = new $class();

        $event->setCalendar($calendar);

        return $event;
    }
}
