<?php

namespace App\Http\Livewire\Forms;

use App\Models\Conversation as ChatConversation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use OpenAI;

class Conversation extends Component
{
    public $question;

    public $trail;

    public $profile;

    public function rules()
    {
        return [
            'question' => ['required'],
        ];
    }

    public function mount($profile = '')
    {
        $this->profile = $profile != '' ? $profile : Auth::id();
        $this->displayConversation();
    }

    public function displayConversation()
    {
        $this->trail = ChatConversation::where('user_id', $this->profile)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //dd($this->question);
        $this->validate();
        $yourApiKey = env('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);

        // $result = $client->chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         ['role' => 'user', 'content' => $request->input('question')],
        //     ]
        // ]);
        $question = $this->question ?? null;
        $maxToken = 120 + strlen($question);

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
        $wordCount = strlen($this->question) + strlen($response);

        ChatConversation::create([
            'query' => $this->question,
            'answer' => $response,
            'user_id' => Auth::id(),
            'smsCompliance' => false,
            'wordCount' => $wordCount,
        ]);

    }

    public function render()
    {
        return view('livewire.forms.conversation');
    }
}
