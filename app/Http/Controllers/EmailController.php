<?php

namespace App\Http\Controllers;
use App\Services\RabbitMQService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    // protected $rabbitMQService;

    // public function __construct(RabbitMQService $rabbitMQService)
    // {
    //     $this->rabbitMQService = $rabbitMQService;
    // }

    public function send(Request $request)
    {
        $data = $request->all();

        // Преобразование данных в JSON
        $message = json_encode($data);

        // Публикация сообщения в очередь
        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish($message);

        return response()->json(['status' => 'Message sent to RabbitMQ']);
    }

}
