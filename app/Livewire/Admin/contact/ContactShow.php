<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;

class ContactShow extends Component
{

    public $msg;

protected $listeners = [
            'refresh-show' => '$refresh',
        ];
    public function markAsUnread($msgId)
    {
        $message = Contact::withTrashed()->find($msgId);
        if (!$message || $message->deleted_at !== null) {
            return; // لو مش موجودة أو في التراش، متعملش unread
        }
        $message->is_read = 0;
        $message->save();
        $this->dispatch('mark-unread', 'The message has been marked as unread');
        $this->dispatch('refreshCounts');
    }

    #[On('showMessage')] // داlistner 
    public function showMessage($msgId)
    {
        $this->msg=Contact::where('id',$msgId)->withTrashed()->first();
        $this->dispatch('refresh-show');
        $this->dispatch('refreshCounts');
    }

    //   جيب آخر رسالة (لو لسه فيه رسائل)
    // public function mount(){
    //     $this->msg=Contact::latest()->first();
    //     $this->dispatch('refresh-show');
    // }
    public function forceDeleteMessage($msgId){
        $msg = Contact::withTrashed()->where('id',$msgId); 
        $msg->forceDelete();
        $this->dispatch('message-deleted', 'Your message has been permanently deleted');

    }

    public function restoreMessage($msgId){
        $msg = Contact::withTrashed()->where('id',$msgId); 
        $msg->restore();
        $this->dispatch('message-restored', 'Your message has been restored');
        // بعد الاستعادة، جيب آخر رسالة (لو لسه فيه رسائل)
        $this->msg = Contact::withTrashed()->latest()->first();
        $this->dispatch('refreshCounts');
    }

    public function deleteMessage($msgId){
        $msg = Contact::where('id',$msgId); // أبسط وأوضح
        $msg->delete();
        $this->dispatch('message-deleted', 'Your message has been deleted');

        // بعد الحذف، جيب آخر رسالة (لو لسه فيه رسائل)
        $this->msg = Contact::latest()->first();
        $this->dispatch('refreshCounts');

    }
    
    public function replayMsg($msgId){
        $this->dispatch('replay-message',$msgId);
    }
    
    public function render()
    {
        return view('livewire.admin.contact.contact-show');
    }
}
