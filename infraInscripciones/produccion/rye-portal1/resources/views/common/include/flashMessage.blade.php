<div class="flash-message" id="flashMessage">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}" >{{ Session::get('alert-' . $msg) }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
            {{Session::forget('alert-' . $msg)}}
        @endif
    @endforeach
</div>
