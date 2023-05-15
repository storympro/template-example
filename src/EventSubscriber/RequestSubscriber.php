<?php

namespace App\EventSubscriber;

use App\Helpers\Translator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Contracts\Translation\TranslatorInterface;

class RequestSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private TranslatorInterface $translator,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['init', 1000],
            ]
        ];
    }

    public function init(RequestEvent $event)
    {
        new Translator($this->translator);
    }
}
