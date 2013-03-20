<?php

namespace Rmzamora\CalendarBundle\Creator;

use Rmzamora\CalendarBundle\Model\EventInterface;
use Rmzamora\CalendarBundle\Model\EventManagerInterface;
use Rmzamora\CalendarBundle\Blamer\EventBlamerInterface;

class EventCreator implements EventCreatorInterface
{
    /**
     * The event manager
     *
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * The event blamer
     *
     * @var EventBlamerInterface
     */
    protected $eventBlamer;

    /**
     * Construct of the class
     *
     * @param EventManagerInterface $eventManager The event manager
     * @param EventBlamerInterface  $eventBlamer  The event blamer
     */
    public function __construct(EventManagerInterface $eventManager, EventBlamerInterface $eventBlamer)
    {
        $this->eventManager = $eventManager;
        $this->eventBlamer  = $eventBlamer;
    }

    public function create(EventInterface $event)
    {
        $this->eventBlamer->blame($event);
        $this->eventManager->addEvent($event);

        return true;
    }
}
