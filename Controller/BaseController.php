<?php

namespace Rmzamora\CalendarBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Rmzamora\CalendarBundle\Model\CalendarManagerInterface;
use Rmzamora\CalendarBundle\Model\EventManagerInterface;
use Rmzamora\CalendarBundle\Form\Factory\CalendarFormFactoryInterface;
use Rmzamora\CalendarBundle\Form\Factory\EventFormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Rmzamora\CalendarBundle\Model\AttendeeManagerInterface;
use Rmzamora\CalendarBundle\Form\Factory\AttendeeFormFactoryInterface;

abstract class BaseController extends ContainerAware
{

    /**
     * @return CalendarManagerInterface
     */
    protected function getCalendarManager()
    {
        return $this->container->get('rmzamora_calendar.manager.calendar');
    }

    /**
     * @return EventManagerInterface
     */
    protected function getEventManager()
    {
        return $this->container->get('rmzamora_calendar.manager.event');
    }

    /**
     * @return AttendeeManagerInterface
     */
    protected function getAttendeeManager()
    {
        return $this->container->get('rmzamora_calendar.manager.attendee');
    }

    /**
     * @return CalendarFormFactoryInterface
     */
    protected function getCalendarFormFactory()
    {
        return $this->container->get('rmzamora_calendar.form_factory.calendar');
    }

    /**
     * @return EventFormFactoryInterface
     */
    protected function getEventFormFactory()
    {
        return $this->container->get('rmzamora_calendar.form_factory.event');
    }

    /**
     * @return AttendeeFormFactoryInterface
     */
    protected function getAttendeeFormFactory()
    {
        return $this->container->get('rmzamora_calendar.form_factory.attendee');
    }

    protected function createRedirect($controller, $action, $data = array())
    {
        return new RedirectResponse($this->container->get('router')->generate($this->container->getParameter(sprintf('rmzamora_calendar.routing.%s.%s', $controller, $action)), $data));
    }

}
