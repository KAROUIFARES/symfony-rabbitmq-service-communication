<?php
namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class SendToService2Command extends Command
{
    protected static $defaultName = 'app:send-to-service2';
    protected function configure()
    {
        $this
            ->setDescription('Sends a message to Service2 via RabbitMQ')
            ->setHelp('This command sends a message to Service2 via RabbitMQ.');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $connection = new AMQPStreamConnection(
            $_ENV['RABBITMQ_HOST'],
            $_ENV['RABBITMQ_PORT'],
            $_ENV['RABBITMQ_USER'],
            $_ENV['RABBITMQ_PASSWORD']
        );
        $channel = $connection->channel();
        $channel->queue_declare('service2_queue', false, true, false, false);
        $messageData = 'Hello from Service1 to Service2';
        $message = new AMQPMessage($messageData);
        $channel->basic_publish($message, '', 'service2_queue');
        $output->writeln('Message sent to Service2 via RabbitMQ');
        $channel->close();
        $connection->close();
        return 0;
    }
}
