<div id="popUpContainerBackground" class="popUpContainerBackground" style="display: {{ ((isset($displayLogin) && $displayLogin == 'block') || (isset($displayRegister) && $displayRegister == 'block')) ? 'block' : 'none' }}">
</div>

@include('layouts.components.register', ['display' => $displayRegister])
@include('layouts.components.login', ['display' => $displayLogin])
