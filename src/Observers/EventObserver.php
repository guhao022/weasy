<?php

namespace Modules\Weasy\Observers;

use Modules\Weasy\Models\Event;
use Modules\Weasy\Services\Event as EventService;

/**
 * Event模型观察者.
 *
 * @author rongyouyuan <rongyouyuan@163.com>
 */
class EventObserver
{
    /**
     * eventService.
     *
     * @var Modules\Weasy\Services\Event
     */
    private $eventService;

    /**
     * construct.
     *
     * @param EventService $eventService EventService
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function creating()
    {
        # code...
    }

    public function saving(Event $event)
    {
        if (!$event->key) {
            $event->key = $this->eventService->makeEventKey();
        }
    }

    public function created()
    {
        # code...
    }
}
