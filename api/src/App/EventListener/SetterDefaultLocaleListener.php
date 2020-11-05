<?php

namespace WebOffice\App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Contracts\Translation\TranslatorInterface;

class SetterDefaultLocaleListener
{
    public string $defaultLanguage;
    public TranslatorInterface $translator;

    public function setLocale(RequestEvent $event)
    {
        $locale = $event->getRequest()->headers->get('app-locale', $this->defaultLanguage);
        $this->translator->setLocale($locale);
    }
}