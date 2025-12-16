@php
    $depth = $depth ?? 0;
@endphp

<li class="specify-node depth-{{ $depth }}">
    @if($node['url'])
        <a
            href="{{ $node['url'] }}"
            class="specify-node-link {{ request()->url() === $node['url'] ? 'specify-node-link--active' : '' }}"
        >
            {{ $node['label'] }}
        </a>
    @else
        <a href="#" class="specify-node-label">
            {{ $node['label'] }}
        </a>
    @endif 

    @if (! empty($node['children']))
        <ul class="specify-node-children">
            @foreach ($node['children'] as $child)
                {{-- IMPORTANT: order is preserved by foreach --}}
                @include('specify::node', [
                    'node' => $child,
                    'depth' => $depth + 1,
                ])
            @endforeach
        </ul>
    @endif
</li>
