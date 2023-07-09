<?php /* Tanmar PG 1.5.0 */

declare(strict_types=1);

namespace Tanmar\BundleExample\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Path\To\Event;

class EventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array{
        return [
            EventClass::class => 'doAwesomeStuff'
        ];
    }

    public function doAwesomeStuff(EventClass $event){
        // do aweseome stuff
    }
}