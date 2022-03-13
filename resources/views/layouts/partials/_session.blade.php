
@if (session('success'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

@if (session('warning'))

    <script>
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: "{{ session('warning') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif


{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        @foreach ($errors->all() as $error)--}}
{{--            <p>{{ $error }}</p>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endif--}}
