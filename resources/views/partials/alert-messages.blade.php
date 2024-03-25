@if(session()->has('alert-message') && session()->get('alert-message.type') == 'danger')
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i>  {{ session()->get('alert-message.title') }}</h5>
    {{ session()->get('alert-message.message') }}
</div>
@endif

@if(session()->has('alert-message') && session()->get('alert-message.type') == 'info')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-info"></i> {{ session()->get('alert-message.title') }}</h5>
    {{ session()->get('alert-message.message') }}
</div>
@endif

@if(session()->has('alert-message') && session()->get('alert-message.type') == 'warning')
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i>{{ session()->get('alert-message.title') }}</h5>
    {{ session()->get('alert-message.message') }}
</div>
@endif

@if(session()->has('alert-message') && session()->get('alert-message.type') == 'success')
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i>{{ session()->get('alert-message.title') }}</h5>
    {{ session()->get('alert-message.message') }}
</div>
@endif
