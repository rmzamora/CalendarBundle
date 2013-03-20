<?php
namespace Rmzamora\CalendarBundle\Tests\Creator;

use Rmzamora\CalendarBundle\Blamer\AttendeeBlamerInterface;
use Rmzamora\CalendarBundle\Creator\AttendeeCreator;
use Rmzamora\CalendarBundle\Model\AttendeeManagerInterface;
use Rmzamora\CalendarBundle\Tests\CalendarTestCase;

/**
 * @author  Yannick Voyer <yan.voyer@gmail.com>
 * @package CalendarBundle
 */
class AttendeeCreatorTest extends CalendarTestCase
{
    public function testCreate()
    {
        $attendee = $this->getMockAttendee();
        $manager  = $this->getMockAttendeeManager_ExpectsAddAttendee($attendee);
        $blamer   = $this->getMockAttendeeBlamer_ExpectsBlame($attendee);

        $creator = $this->getCreator($manager, $blamer);
        $this->assertTrue($creator->create($attendee), "Should return true on success");
    }

    /**
     * Returns the creator to test
     *
     * @param AttendeeManagerInterface $attendeeManager The attendee manager
     * @param AttendeeBlamerInterface  $attendeeBlamer  The attendee blamer
     *
     * @return \Rmzamora\CalendarBundle\Creator\AttendeeCreator
     */
    protected function getCreator(AttendeeManagerInterface $attendeeManager, AttendeeBlamerInterface  $attendeeBlamer)
    {
        return new AttendeeCreator($attendeeManager, $attendeeBlamer);
    }
}
