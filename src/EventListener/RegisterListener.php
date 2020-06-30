<?php declare(strict_types=1);

namespace App\EventListener;

use App\Client\MailerInterface;
use App\Event\CustomerRegistered;
use App\Provider\MailerProvider;

final class RegisterListener
{
    public static function getSubscribedEvents(): array
    {
        return [
            CustomerRegistered::class => [
                'onCustomerRegistered',
                'sendEmailToCustomer'
            ]
        ];
    }

    public function onCustomerRegistered(CustomerRegistered $event): void
    {
        file_put_contents(
            sprintf('register_%s.log', date('Y-m-d_His')),
            serialize($event)
        );

    }

    /**
     * registration confirmation email.
     *
     * @param CustomerRegistered $customer
     */

    public function sendEmailToCustomer(CustomerRegistered $customer): void
    {
        $inst = new MailerProvider(MailerInterface::class);
        $inst->sendEmail('confirmation_001', $customer->getEmail(), [$customer->getFirstName(), $customer->getLastName(), $customer->getGender()]);
    }

}
