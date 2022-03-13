<div id="messages">
    <a class="nav-link" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-comments fa-lg"></i>
        <!-- Counter - Messages -->
        @if(count(Helper::messageList())>5)
            <span data-count="5" class="badge badge-danger navbar-badge badge-counter">5+</span>
        @else
            <span data-count="{{count(Helper::messageList())}}" class="badge badge-danger navbar-badge  badge-counter">{{count(Helper::messageList())}}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div id="message-items">
            @foreach(Helper::messageList() as $message)
        <a class="dropdown-item"  href="{{route('message.show',$message->id)}}">
            <!-- Message Start -->
            <div class="media">
                @if($message->photo)
                <img src="{{$message->photo}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                @else
                    <img src="{{asset('admin_files/img/avatar2.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                @endif
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        {{$message->name}}
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">{{$message->subject}}...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$message->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <!-- Message End -->
        </a>
                <div class="dropdown-divider"></div>
                @if($loop->index+1==5)
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
        </div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        <a class="dropdown-item dropdown-footer" href="{{route('message.index')}}">Read More Messages</a>

    </div>
</div>

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            Echo.channel('message')
                .listen('MessageSent', (e) => {

                    const message_container = $('#message-items');
                    const message_counter_area = $('#messages .count');
                    const message_counter = parseInt( $(message_counter_area).attr('data-count') ) + 1;
                    const message_length = parseInt( $('#message-items>.dropdown-item').length );
                    $(message_counter_area).attr('data-count', message_counter);

                    const data = `
                    <a class="dropdown-item" href="${e.message.url}">
                        <div class="media">
                                <img src="${e.message.photo}" alt="${e.message.name}" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    ${e.message.name}
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">${e.message.subject}...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ${e.message.date}</p>

                        </div>
                        </a>
                    `;

                    $(message_container).prepend(data);

                    if(message_counter<=5){
                        $(message_counter_area).text( message_counter );
                    }else{
                        $(message_counter_area).text('5+');
                    };

                    if(message_length>=5) $(message_container).find('.message-item').last().remove();

                });

        });
    </script>

@endpush
