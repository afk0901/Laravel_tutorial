  {{--if the session message does exist, flash is just an assignment--}}

    @if ($flash = session('message'))

      <div id="message-flash" class="alert alert-success" role="alert">
        
        {{ $flash }}
      
      </div>  

      @endif