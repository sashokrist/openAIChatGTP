<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Session;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OpenAIController extends Controller
{
    protected $openaiService;

    public function __construct(OpenAIService $openaiService)
    {
        $this->openaiService = $openaiService;
    }

    public function index()
    {
        $sessions = Chat::orderBy('created_at', 'desc')->take(10)->get();
        return view('openai', compact('sessions'));
    }

    public function getCompletion(Request $request)
    {
        $messages = $request->input('messages', []);
        $userMessage = collect($messages)->last(); // Assuming the last message is the user's input

        $completion = $this->openaiService->getCompletion($messages);

        // Extract the AI's response content from the completion
        $aiResponseContent = $completion['choices'][0]['message']['content'] ?? '';

        if (!empty($aiResponseContent)) {
            // Save to the Chat model
            Chat::create([
                'user_id' => auth()->id(), // Ensure the user is authenticated
                'ask' => $userMessage['content'] ?? '',
                'response' => $aiResponseContent
            ]);
        }

        return response()->json($completion);
    }

    public function fetchChatHistory()
    {
        $chats = Chat::latest()->get(); // Fetch chats in the desired order
        return response()->json($chats); // Return the chats as JSON
    }


    public function getContent($id)
    {
        $chat = Chat::find($id); // Assuming you have a ChatSession model

        if (!$chat) {
            return response()->json(['error' => 'Chat session not found'], ResponseAlias::HTTP_NOT_FOUND);
        }

        return response()->json([
            'ask' => $chat->ask,
            'response' => $chat->response
        ]);
    }

}
