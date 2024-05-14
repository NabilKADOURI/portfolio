<?php

namespace App\EventSubscriber;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityDeletedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Filesystem\Filesystem;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(private Filesystem $filesystem)
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityDeletedEvent::class => ['deleteUploads'],
        ];
    }

    public function deleteUploads(BeforeEntityDeletedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Project)) {
            return;
        }

        $this->filesystem->remove('uploads/' . $entity->getPicture());
    }
}
