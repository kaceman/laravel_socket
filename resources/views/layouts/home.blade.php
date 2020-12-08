@extends('main')

@section('content')
    <h1>Hello Home Page</h1>
@endsection

@section('scripts')
    <script>
        console.log('I am executed')
        setTimeout(function () {
            var channel = Echo.join('home');
            channel.here((users) => {
                channel.pusher.channels.channels[channel.name].trigger('NewMessage', 'Hello World');
            });
        }, 5000);
        Echo.channel('home')
            .listen('NewMessage', e => {
                console.log(e.message);
            });
    </script>
@endsection
