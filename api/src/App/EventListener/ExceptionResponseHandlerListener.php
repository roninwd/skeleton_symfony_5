<?php

namespace WebOffice\App\EventListener;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use WebOffice\App\Service\Response\Contracts\ErrorResponseFormatterInterface;

class ExceptionResponseHandlerListener
{
    /** @required */
    public ErrorResponseFormatterInterface $responseFormatter;

    public function format(ExceptionEvent $event)
    {
        $event->setResponse($this->responseFormatter->error($event->getThrowable()));
    }
}