<?php

namespace Rmzamora\CalendarBundle\Security\Authorization\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Rmzamora\CalendarBundle\Model\CalendarInterface;
use Rmzamora\CalendarBundle\Model\CalendarManagerInterface;

class CalendarVoter implements VoterInterface
{

    protected $calendarManager;
    protected $class;

    public function __construct(CalendarManagerInterface $calendarManager, $class)
    {
        $this->calendarManager = $calendarManager;
        $this->class = $class;
    }

    public function supportsAttribute($attribute)
    {
        return in_array(strtolower($attribute), array(
            'create',
            'edit',
            'delete',
            'view',
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

    protected function canCreate(TokenInterface $token, CalendarInterface $calendar)
    {
        return is_object($token->getUser());
    }

    protected function canEdit(TokenInterface $token, CalendarInterface $calendar)
    {
        return $this->calendarManager->isAdmin($token->getUser(), $calendar);
    }

    protected function canDelete(TokenInterface $token, CalendarInterface $calendar)
    {
        return $this->calendarManager->isAdmin($token->getUser(), $calendar);
    }

    protected function canView(TokenInterface $token, CalendarInterface $calendar)
    {
        return $calendar->isPublic() || $this->calendarManager->isAdmin($token->getUser(), $calendar);
    }

}
