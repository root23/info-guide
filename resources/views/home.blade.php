@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card notifications-card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->is_admin)
                        @forelse($notifications as $notification)
                            <div class="alert alert-success" role="alert">
                                [{{ $notification->created_at }}] {!! $notification->data['message'] !!}
                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                    Закрыть
                                </a>
                            </div>

                            @if($loop->last)
                                <a href="#" id="mark-all">
                                    Отметить все, как прочитанные
                                </a>
                            @endif
                        @empty
                            There are no new notifications
                        @endforelse

                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('adminlte_js')
    <script src="{{ asset('js/app.js') }}"></script>
    @if (Auth::user()->is_admin)
        <script>

            Echo.channel('private-App.User.{{ Auth::user()->id }}')
                .notification((notification) => {
                   console.log(notification);
                   var notification_html = '<div class="alert alert-success" role="alert">' +
                       '[' + notification.created_at + '] ' + notification.message + '<a href="#" class="float-right mark-as-read" data-id="'
                       + notification.id + '">Закрыть</a></div>';
                   $('.notifications-card .card-body').append(notification_html);
                });

            function sendMarkRequest(id = null) {
                return $.ajax("{{ route('admin.markNotification') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                       id
                    }
                });
            }

            $(function () {
                $('.mark-as-read').click(function () {
                    let request = sendMarkRequest($(this).data('id'));

                    request.done(() => {
                       $(this).parents('div.alert').remove();
                    });
                });

                $('#mark-all').click(function() {
                    let request = sendMarkRequest();
                    request.done(() => {
                        $('div.alert').remove();
                    })
                });
            });
        </script>
    @endif
@stop
