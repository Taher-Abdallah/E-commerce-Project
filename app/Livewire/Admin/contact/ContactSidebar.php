<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;

class ContactSidebar extends Component
{

    protected $listeners = [
        'refresh-show' => '$refresh',
    ];

    public $screen = 'inbox';
    public $inboxCount, $trashCount, $readCount,$answerCount;

    public function mount()
    {
        $this->loadCounts();
    }

    public function loadCounts()
    {
        $this->inboxCount  = Contact::count();
        $this->readCount = Contact::where('is_read', 1)->count();
        $this->trashCount  = Contact::onlyTrashed()->count();
        $this->answerCount = Contact::where('replay_status', 1)->count();
        $this->dispatch('refresh-show');
    }

    #[On('refreshCounts')]
    public function refreshCountsHandler()
    {
        $this->loadCounts();
    }

    public function selectScreen($screen)
    {
        $this->screen = $screen;
        $this->dispatch('select-screen', $screen);
    }
    public function render()
    {
        return view('livewire.admin.contact.contact-sidebar');
    }
}
