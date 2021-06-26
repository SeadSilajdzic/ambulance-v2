@if(session()->has('success'))
    {{ session()->get('success') }}
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

@if(session()->has('toast_success'))
    {{ session()->get('toast_success') }}
@endif

@if(session()->has('toast_error'))
    {{ session()->get('toast_error') }}
@endif

@if(session()->has('toast_warning'))
    {{ session()->get('toast_warning') }}
@endif

@if(session()->has('toast_info'))
    {{ session()->get('toast_info') }}
@endif

@if(session()->has('toast_question'))
    {{ session()->get('toast_question') }}
@endif


