{{-- @component('mail::header')
    <img src="https://industriaspatzi.com/images/perfil.png" class="logo" alt="Industrias en Ladrillo Patzi">
@endcomponent --}}
@component('mail::message')
# @lang('¡Hola!')

@lang('Se ha producido un intento de inicio de sesión fallido en tu cuenta :app.', ['app' => config('app.name')])

> **@lang('Cuenta:')** {{ $account->email }}<br/>
> **@lang('Hora:')** {{ $time->toCookieString() }}<br/>
> **@lang('Dirección IP:')** {{ $ipAddress }}<br/>
> **@lang('Navegador:')** {{ $browser }}<br/>
@if ($location && $location['default'] === false)
> **@lang('Ubicación:')** {{ $location['city'] ?? __('Ciudad desconocida') }}, {{ $location['state'], __('Estado desconocido') }}
@endif

@lang('Si fuiste tú, puedes ignorar esta alerta. Si sospechas de alguna actividad sospechosa en tu cuenta, por favor cambia tu contraseña.')

@lang('Regards,')<br/>
{{ config('app.name') }}
@endcomponent
