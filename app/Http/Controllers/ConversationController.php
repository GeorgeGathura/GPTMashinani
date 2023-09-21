<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenAI;

class ConversationController extends Controller
{
    /**
     * Show Conversation Thread
     */
    public function index()
    {
        $trail = Conversation::where('user_id', Auth::id())->get();

        return view('conversations.show', [
            'trail' => $trail,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $this->validate([
        //     'query'=>['required','string'];
        // ]);
        $yourApiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);

        // $result = $client->chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         ['role' => 'user', 'content' => $request->input('question')],
        //     ]
        // ]);
        $question = $request->input('question') ?? null;
        $maxToken = 120 + strlen($question);
        if ($question == null) {
            return back();
        }

        $result = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $question,
            'temperature' => 0.4,
            'max_tokens' => $maxToken,
        ]);

        // $result = $client->chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         ['role' => 'user',
        //         'content' => $request->input('question')],
        //     ]
        // ]);
        $response = '';
        foreach ($result['choices'] as $choice) {
            $response .= $choice['text'];
        }
        $wordCount = strlen($request->question) + strlen($response);

        Conversation::create([
            'query' => $request->question,
            'answer' => $response,
            'user_id' => Auth::id(),
            'smsCompliance' => false,
            'wordCount' => $wordCount,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        $trail = Conversation::where('user_id', Auth::id())->get();

        return view('conversations.show', [
            'trail' => $trail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
