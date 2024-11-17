<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected $connection;
    protected $channel;
    protected $email_send_queue;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            config('rabbitmq.host'),
            config('rabbitmq.port'),
            config('rabbitmq.user'),
            config('rabbitmq.password')
        );

        $this->channel = $this->connection->channel();
        $this->email_send_queue = config('rabbitmq.email_send_queue');

        $this->channel->queue_declare($this->email_send_queue, false, false, false, false);
    }

    public function publish($message)
    {
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, '', $this->email_send_queue);
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
