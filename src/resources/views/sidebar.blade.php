<nav class="specify-sidebar">
    <ul class="specify-sidebar-list">
        @foreach ($sidebarTree as $node)
            @include('specify::node', [
                'node' => $node,
                'depth' => 0,
            ])
        @endforeach
    </ul>
</nav>