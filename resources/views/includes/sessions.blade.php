@if(session()->has('toast_success'))
    {{ session()->get('toast_success') }}
@endif

@if(session()->has('error'))
    {{ session()->get('error') }}
@endif

@if(session()->has('warning'))
    {{ session()->get('warning') }}
@endif

@if(session()->has('info'))
    {{ session()->get('info') }}
@endif

@if(session()->has('question'))
    {{ session()->get('question') }}
@endif

