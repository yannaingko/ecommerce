<div>
    <style>
        .noti{
            position: absolute;
            z-index: 10;
            width: 500px;
            right: 1px;
            display: none;
            border-width: 4px;
            border-style: solid;
            border-image: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%) 1;
            height: 500px;                                                                                   
            overflow: auto;
        }
    </style>
    <a href="#" class="nav">      
        <span class="nav__notification">
            <span class="nav__notification__icon"></span>
            <span class="nav__notification__num">{{$notifications->count()}}</span>
        </span>
    </a>
    <div class="noti">
        <div class="card row">
            <div class="card-header sticky-top">
                <span class="ms-5 text-brand">Notification</span> 
                <a class="text-danger float-end" wire:click.prevent="readnoti">CLEAR ALL</a>
            </div>
            <div class="card-body">
                <ul class="pt-2">
                    @if(auth()->user()->utype == 'ADM')
                        @foreach($notifications as $notification)
                            @if($notification->data['type'] == 'register')
                                <li class="notification-message row" >
                                    <a class="col" wire:click.prevent="markNotification({{$notification->id}})">
                                        <div class="media"> <span class="avatar avatar-sm">
                                            <img class=" rounded-circle" alt="Image" src="">
                                            </span>
                                            <div>
                                                <p style="font-size: 13px"><span><span class="test-muted"></span><span class="text-warning">{{$notification->data['name']}}</span> ({{$notification->data['email']}})</span> has just <span>registered.</span>
                                                    <br><span style="font-size: 13px"><span>{{$notification->created_at->diffForHumans()}}</span> 
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @elseif($notification->data['type'] == 'new_review')
                                <li class="notification-message row" >
                                    <a class="col" wire:click.prevent="markNotification({{$notification->id}})">
                                        <div class="media"> <span class="avatar avatar-sm">
                                            <img class=" rounded-circle" alt="Image" src="">
                                            </span>
                                            <div>
                                                <p style="font-size: 13px"><span><span class="test-muted"></span><span class="text-warning">{{$notification->data['name']}}</span> ({{$notification->data['email']}})</span> has just give <span class="text-warning">Review.</span>
                                                    <br><span style="font-size: 13px"><span>{{$notification->created_at->diffForHumans()}}</span> 
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @elseif($notification->data['type'] == 'new_comment')
                                <li class="notification-message row" >
                                    <a class="col" wire:click.prevent="markNotification({{$notification->id}})">
                                        <div class="media"> <span class="avatar avatar-sm">
                                            @if($notification->data['avatar'] == null)
                                                <img class=" rounded-circle" alt="Image">
                                            @else
                                                <img class=" rounded-circle" alt="Image" src="{{asset('assets/imgs/avatar')}}/{{$notification->data['name']}}/{{$notification->data['avatar']}}">
                                            @endif
                                            </span>
                                            <div>
                                                <p style="font-size: 13px"><span><span class="test-muted"></span><span class="text-warning">{{$notification->data['name']}}</span> ({{$notification->data['email']}})</span> has just give<span class="text-warning">Comment.</span>
                                                    <br><span style="font-size: 13px"><span>{{$notification->created_at->diffForHumans()}}</span> 
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            <hr>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
            $(document).ready(function(){
                $(".nav").click (function showHide(){
                    $(".noti").slideToggle("slow");
                })
        }); 
    </script>
@endpush