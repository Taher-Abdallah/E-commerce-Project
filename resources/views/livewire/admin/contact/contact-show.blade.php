    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card email-app-details d-none d-lg-block">
                    <div class="card-content">
                        <div class="email-app-options card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @if ($msg)
                                            {{-- replay --}}
                                            <button wire:click="replayMsg({{ $msg->id }})" type="button"
                                                class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Replay"><i
                                                    class="la la-reply"></i></button>

                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                data-toggle="tooltip" data-placement="top"
                                                data-original-title="Report SPAM"><i
                                                    class="ft-alert-octagon"></i></button>


                                            <button wire:click="deleteMessage({{ $msg->id }})" type="button"
                                                class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Delete"><i
                                                    class="ft-trash-2"></i></button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 text-right">
                                    @if ($msg)
                                    <div class="btn-group ml-1">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">More</button>
                                        <div class="dropdown-menu">
                                    @if($msg && $msg->id && $msg->deleted_at === null)
                                            <a wire:click="markAsUnread({{ $msg->id }})" class="dropdown-item" href="#">Mark as unread</a>
                                            @endif
                                            @if ($msg && $msg->id && $msg->deleted_at!=null)
                                            <a wire:click="restoreMessage({{ $msg->id }})" class="dropdown-item" href="#">Restore</a>
                                            <a wire:click="forceDeleteMessage({{ $msg->id }})" class="dropdown-item" href="#">Force Delete</a>
                                            @endif
                                            <a class="dropdown-item" href="#">Add star</a>
                                            <a class="dropdown-item" href="#">Add to task</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Filter mail</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endif
                            </div>
                        </div>
                        @if ($msg)
                        <div class="email-app-title card-body">
                            <h3 class="list-group-item-heading">Project ABC Status Report</h3>
                            <p class="list-group-item-text">
                                <span class="primary">
                                    <span class="badge badge-primary">Previous</span> <i
                                        class="float-right font-medium-3 ft-star warning"></i></span>
                            </p>
                        </div>
                            <div class="media-list">
                                <div id="headingCollapse1" class="card-header p-0">
                                    <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
                                        aria-controls="collapse1"
                                        class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                        <div class="media-left pr-1">
                                            <span class="avatar avatar-md">
                                                <img class="media-object rounded-circle"
                                                    src="{{ asset('admin-assets') }}/images/portrait/small/avatar-s-1.png"
                                                    alt="Generic placeholder image">
                                            </span>
                                        </div>
                                        <div class="media-body w-100">
                                            <h6 class="list-group-item-heading">{{ $msg->name }}</h6>
                                            <p class="list-group-item-text">{{ $msg->subject }}
                                                <span
                                                    class="float-right text muted">{{ $msg->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1"
                                    class="card-collapse collapse" aria-expanded="true">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p>Hi Wayne,</p>
                                            <p>Can you please provide me ABC Status Report.</p>
                                            <p>Gmail Material Design Concept. Please check the full project
                                                on Behance. Hope that will be fine for you.</p>
                                            <p>Thanks for your consideration !</p>
                                            <p>Regards,
                                                <br />John
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="email-app-text-action card-body">
                                </div>
                            </div>
                            @else
                            <div class="email-app-title card-body">
                                <h3 class="list-group-item-heading">No Message Selected</h3>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
