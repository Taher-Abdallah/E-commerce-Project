          <div class="email-app-list-wraper col-md-7 card p-0">
            <div class="email-app-list">
              <div class="card-body chat-fixed-search">
                <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                  <input type="text" wire:model.live="itemSearch" class="form-control" id="iconLeft4" placeholder="Search email">
                  <div class="form-control-position">
                    <i class="ft-search"></i>
                  </div>
                </fieldset>
              </div>
              <div id="users-list" class="list-group">
                <div class="users-list-padding media-list">
                  @forelse ($messages as $msg )
                                      <a @if ($msg->id == $message) style="background-color: #f5f5f5"
                                         @endif wire:click="showMessage({{$msg->id}})" href="#" class="media border-0">
                    <div class="media-left pr-1">
                      <span class="avatar avatar-md">
                        <span class="media-object rounded-circle text-circle bg-info">{{ substr($msg->name, 0, 1) }}</span>
                      </span>
                    </div>
                    <div class="media-body w-100">
                      <h6 class="list-group-item-heading text-bold-500">{{$msg->name}}
                        <span class="float-right">
                          <span class="font-small-2 primary">{{$msg->created_at->diffForHumans()}}</span>
                        </span>
                      </h6>
                      <p class="list-group-item-text text-truncate text-bold-600 mb-0">{{Str::limit($msg->subject, 20)}}</p>
                      <p class="list-group-item-text mb-0">{{Str::limit($msg->message, 38)}}
                        <span class="float-right primary">
                          @if ($msg->is_read == 0)
                            <span class="badge badge-danger mr-1">New Contact </span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>
                            @else
                            <span class="badge badge-success mr-1">Readed </span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span>
                          @endif
                      </p>
                    </div>
                  </a>
                  @empty
            <div class="text-center p-3">No Messages Found</div>
                  @endforelse
                  {{ $messages->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
          </div>