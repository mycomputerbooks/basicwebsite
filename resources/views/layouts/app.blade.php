<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ready Hen</title>
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
  {{-- <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css"> --}}
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
  <body>
    @include('inc.navbar')
    <div id="app">
        {{-- <div class="container"> --}}
        {{-- @if(Request::is('/'))
            @include('inc.showcase')
        @endif --}}
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>
        {{-- </div> --}}

        <footer id="footer" class="text-center">
        <p>Copyright &copy; mycomputerbooks.com</p>
        </footer>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script>
        $('#editQuestion').on('show.bs.modal', function (event) {
            console.log('Modal Opened');
            var button = $(event.relatedTarget)
            var title = button.data('mytitle')
            var chapter = button.data('mychapter')
            var description = button.data('mydescription')
            var modal = $(this)
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #chapter').val(chapter);
            modal.find('.modal-body #description').val(description);
        });
        $('#editAnswer').on('show.bs.modal', function (event) {
            console.log('Modal Opened');
            var button = $(event.relatedTarget)
            var content = button.data('mycontent')
            var modal = $(this)
            modal.find('.modal-body #content').val(content);
        });

    </script>
  </body>
</html>
