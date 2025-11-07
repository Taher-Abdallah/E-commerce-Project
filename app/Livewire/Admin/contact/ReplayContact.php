<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Mail\ReplayContactMail;
use Illuminate\Support\Facades\Mail;

class ReplayContact extends Component
{
    public $contact;
    public $id,$email,$subject,$replayMessage,$clientName;


    protected $rules = [
        'replayMessage' => 'required|min:10|max:1000',
    ];

    // رسائل مخصصة بالعربية
    protected $messages = [
        'replayMessage.required' => 'يجب كتابة رسالة الرد',
        'replayMessage.min' => 'الرسالة يجب أن تكون 10 أحرف على الأقل',
        'replayMessage.max' => 'الرسالة يجب ألا تزيد عن 1000 حرف',
    ];

    #[On('replay-message')] 
    public function launchModal($contactId){
        $this->setDataAttribute($contactId);
        $this->dispatch('open-replay-contact-modal');
    }
    public function replayContact()
    {
        $this->validate();
        $contact = Contact::find($this->id);
        // ارسال الايميل
        Mail::to($this->email)->send(new ReplayContactMail($this->replayMessage, $this->subject, $this->clientName));

        // رسالة نجاح
        $this->dispatch('contact-replayed', 'Your replay has been sent successfully');

        // اغلاق المودال
        $this->dispatch('close-replay-contact-modal');
        $this->contact->replay_status = 1;
        $this->contact->save();
        $this->dispatch('refreshCounts');
    }
    public function setDataAttribute($contactId)
    {
        $this->contact  = Contact::find($contactId);
        $this->id       = $this->contact->id;
        $this->email    = $this->contact->email;
        $this->subject  = $this->contact->subject;
        $this->clientName = $this->contact->name;
    }
    public function render()
    {
        return view('livewire.admin.contact.replay-contact');
    }
}
