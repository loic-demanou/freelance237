<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;


class ConversationController extends Controller
{
    public function index()
    {
        $conversations=auth()->user()->conversations()->latest()->get();

        
        return view('conversations.index', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', compact('conversation'));
    }

    public function create(User $user)
    {
        $conversation = Conversation::updateOrCreate([
            'from' => auth()->user()->id,
            'to' => $user->id,
            'job_id' => $user->id

        ]);

        Message::updateOrCreate([
            'user_id' => auth()->user()->id,
            'conversation_id' => $conversation->id,
            'content' => "Bonjour !"
        ]);

        return view('conversations.show', compact('conversation'));

    }
}
