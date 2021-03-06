<?php

namespace Rmzamora\CalendarBundle\Security\Authorization\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Rmzamora\CalendarBundle\Model\EventInterface;
use Rmzamora\CalendarBundle\Model\Organizer;
use Rmzamora\CalendarBundle\Model\EventManagerInterface;
use Rmzamora\CalendarBundle\Model\CalendarManagerInterface;

class EventVoter implements VoterInterface
{

    protected $eventManager;
    protected $calendarManager;
    protected $class;

    public function __construct(EventManagerInterface $eventManager, CalendarManagerInterface $calendarManager, $class)
    {
        $this->eventManager = $eventManager;
        $this->calendarManager = $calendarManager;
        $this->class = $class;
    }

    public function supportsAttribute($attribute)
    {
        return in_array(strtolower($attribute), array(
            'create',
            'view',
            'edit',
            'delete',
        ));
    }

    public function supportsClass($class)
    {
        return $class === $this->class;
    }

    public function vote(TokenInterface $token, $object, array $attributes)
    {
        if (!$this->supportsClass(get_class($object))) {
            return VoterInterface::ACCESS_ABSTAIN;
        }
        if (null === $token->getUser()) {
            return VoterInterface::ACCESS_DENIED;
        }

        foreach ($attributes as $attribute) {
            if (!$this->supportsAttribute($attribute)) {
                return VoterInterface::ACCESS_ABSTAIN;
            }
            if (!$this->{"can".$attribute}($token, $object)) {
                return VoterInterface::ACCESS_DENIED;
            }
        }

        return VoterInterface::ACCESS_GRANTED;
    }

    protected function canCreate(TokenInterface $token, EventInterface $event)
    {
        return $event->getCalendar()->isPublic() || $this->calendarManager->isAdmin($token->getUser(), $event->getCalendar());
    }

    protected function canEdit(TokenInterface $token, EventInterface $event)
    {
        return $this->eventManager->isAdmin($token->getUser(), $event) || $this->calendarManager->isAdmin($token->getUser(), $event->getCalendar());
    }

    protected function canDelete(TokenInterface $token, EventInterface $event)
    {
        return $this->eventManager->isAdmin($token->getUser(), $event) || $this->calendarManager->isAdmin($token->getUser(), $event->getCalendar());
    }

    protected function canView(TokenInterface $token, EventInterface $event)
    {
        return $event->getCalendar()->isPublic() || $this->eventManager->isAdmin($token->getUser(), $event);
    }

}
