<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ContactMessage extends Component
{
    use WithPagination;
    public $itemSearch;
    public $message;
    public $screen='inbox';
    public $page=1;

    protected $listeners = ['message-deleted' => '$refresh',
    'mark-unread' => '$refresh',
    'message-restored' => '$refresh',
    'refresh-show' => '$refresh',
    ];
    public function updatingItemSearch()
    {
        $this->resetPage();
    }

    
    //لما اضغط عالرساله في href هيوديني
    public function markAsRead($msgId){
        $message = Contact::withTrashed()->find($msgId);
        if (!$message || $message->deleted_at !== null) {
            return; // لو مش موجودة أو في التراش، متعملش read
        }
            $message->is_read = 1;
            $message->save();
    }
    public function showMessage($msgId)
    {
        $this->markAsRead($msgId); // when you click on a message, mark it as read.
        $this->dispatch('showMessage', $msgId); //this event will show the message in the right side 
        $this->message=$msgId;
    }




    #[On('select-screen')]
    public function selectScreen($screen){
        $this->screen=$screen;
        $this->dispatch('refresh-show');
    }



    public function render()
    {
        $messages=Contact::query();

        if($this->screen=='Readed'){
            $messages->where('is_read',1);
        }
        elseif($this->screen=='Answerd'){
            $messages->where('replay_status',1);
        }
        elseif($this->screen=='inbox'){
            $messages;
        }elseif($this->screen=='Trash'){
            $messages->onlyTrashed();
        }
        if($this->itemSearch){
            $messages->where('email','like','%'.$this->itemSearch.'%');
        }
        return view('livewire.admin.contact.contact-message',[
            'messages' => $messages->latest()->paginate(5)
        ]);
    }
}
