<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Illuminate\Support\Facades\Mail;


class ProcessEmailQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-email-queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection(
            config('rabbitmq.host'),
            config('rabbitmq.port'),
            config('rabbitmq.user'),
            config('rabbitmq.password')
        );

        $channel = $connection->channel();
        $queue = config('rabbitmq.email_send_queue');

        $channel->queue_declare($queue, false, false, false, false);

        $callback = function (AMQPMessage $msg) {
            $data = json_decode($msg->body, true);

            // Отправка почты
            // Mail::raw($data['message'], function ($message) use ($data) {
            //     $message->to($data['email'])
            //         ->subject($data['subject']);
            // });
            var_dump("Message start reading");
            sleep(15);
            var_dump("Message stop reading. " . $msg->getBody());

            $msg->ack();
        };

        $channel->basic_consume($queue, '', false, false, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
