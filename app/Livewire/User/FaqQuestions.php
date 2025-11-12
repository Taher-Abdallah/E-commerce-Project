<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\FaqQuestion;

class FaqQuestions extends Component
{
    public $name, $email, $subject, $message;

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|min:2|max:100',
            'message' => 'required|min:3|max:1000',
        ];
    }

    public function updated()
    {
        $this->validate();
    }

    public function submit()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];
        FaqQuestion::create($data);
        $this->reset();
        $this->dispatch('faq-question-created','Your question has been submitted successfully.');
    }
    public function render()
    {
        return view('livewire.user.faq-questions');
    }
}
