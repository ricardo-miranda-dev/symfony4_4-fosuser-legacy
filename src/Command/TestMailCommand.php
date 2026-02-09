<?php

namespace App\Command;

use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestMailCommand extends Command
{
    protected static $defaultName = 'app:test-mail';

    private $mailer;

    public function __construct(Swift_Mailer $mailer)
    {
        parent::__construct();
        $this->mailer = $mailer;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = (new Swift_Message('Prueba SwiftMailer'))
            ->setFrom(['ressetingrequest@datafact.com.ec' => 'Sistema'])
            ->setTo(['info@datafact.com.ec'])
            ->setBody('Correo de prueba', 'text/plain');

        $this->mailer->send($message);

        $output->writeln('Correo enviado');
        return Command::SUCCESS;
    }
}
