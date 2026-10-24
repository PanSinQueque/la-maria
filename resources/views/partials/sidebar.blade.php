@php
$items = [
    ['dashboard',        'dashboard',    'Dashboard',  '⌂'],
    ['productos.index',  'productos.*',  'Productos',  '◇'],
    ['categorias.index', 'categorias.*', 'Categorías', '▦'],
    ['usuarios.index',   'usuarios.*',   'Usuarios',   '♙'],
    ['roles.index',      'roles.*',      'Roles',      '♧'],
    ['contacto.index',   'contacto.*',   'Contacto',   '✉'],
    ['cotizacion.index', 'cotizacion.*', 'Cotización', '$'],
];
@endphp

<aside class="sidebar" id="sidebar">
    <div class="sidebar__brand">
        <div class="sidebar__brand-mark" aria-hidden="true">LM</div>
        <div class="sidebar__brand-text">
            <span class="sidebar__brand-name">La María</span>
            <span class="sidebar__brand-caption">Pastelería</span>
        </div>
    </div>

    <div class="sidebar__section-label">MENÚ PRINCIPAL</div>

    <nav class="sidebar__nav" aria-label="Navegación principal">
        @foreach ($items as [$ruta, $patron, $texto, $icono])
            @php $activo = request()->routeIs($patron); @endphp
            <a href="{{ route($ruta) }}"
                class="sidebar__link {{ $activo ? 'is-active' : '' }}"
                @if($activo) aria-current="page" @endif>
                <span class="sidebar__icon" aria-hidden="true">{{ $icono }}</span>
                <span>{{ $texto }}</span>
            </a>
        @endforeach

        <div class="sidebar__divider"></div>

        <a href="{{ route('empresa') }}"
            class="sidebar__link {{ request()->routeIs('empresa') ? 'is-active' : '' }}"
            @if(request()->routeIs('empresa')) aria-current="page" @endif>
            <span class="sidebar__icon" aria-hidden="true">⌂</span>
            <span>Empresa</span>
        </a>
    </nav>

    <div class="sidebar__footer">
        <span class="sidebar__footer-dot" aria-hidden="true"></span>
        <span>Panel administrativo</span>
    </div>
</aside>