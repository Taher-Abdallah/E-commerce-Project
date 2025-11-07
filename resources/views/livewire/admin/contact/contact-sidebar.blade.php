          <div class="email-app-menu col-md-5 card d-none d-lg-block">
            <div class="form-group form-group-compose text-center">
              <button type="button" class="btn btn-danger btn-block my-1"><i class="ft-mail"></i> Compose</button>
            </div>
            <h6 class="text-muted text-bold-500 mb-1">Messages</h6>
            <div class="list-group list-group-messages">
              <a wire:click="selectScreen('inbox')" href="#" class="list-group-item @if ($screen == 'inbox') active @endif list-group-item-action border-0">
                <i class="ft-inbox mr-1"></i> Inbox
                <span class="badge badge-secondary badge-pill float-right">{{ $inboxCount }}</span>
              </a>
              <a href="#" wire:click="selectScreen('Readed')" class="list-group-item @if ($screen == 'Readed') active @endif list-group-item-action border-0">
                 <span class="badge badge-secondary badge-pill float-right">{{ $readCount }}</span> <i class="la la-paper-plane-o mr-1"></i> Readed</a>
              <a href="#" wire:click="selectScreen('Answerd')" class="list-group-item @if ($screen == 'Answerd') active @endif list-group-item-action border-0">
                 <span class="badge badge-secondary badge-pill float-right">{{ $answerCount }}</span> <i class="ft-file mr-1"></i> Answerd</a>
              <a href="#" wire:click="selectScreen('Trash')" class="list-group-item @if ($screen == 'Trash') active @endif list-group-item-action border-0">
                 <span class="badge badge-secondary badge-pill float-right">{{ $trashCount }}</span> <i class="ft-trash-2 mr-1"></i> Trash</a>
            </div>

          </div>