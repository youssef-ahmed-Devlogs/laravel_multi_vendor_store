@props(['method' => 'GET'])

<form {{ $attributes->class([]) }} method="{{ in_array($method, ['GET', 'POST']) ? $method : 'POST' }}">

    @if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE']))
        @csrf
    @endif

    @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    {{ $slot }}
</form>
