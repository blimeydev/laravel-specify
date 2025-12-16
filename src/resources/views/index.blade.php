@extends('specify::layout')

@section('sidebar')
    <div>Sidebar</div>
@endsection

@section('content')
    <ul>
        @forelse ($specifications as $specification)
            <li>
                <a href="{{ route('specify.show', ['feature' => $specification['feature']]) }}">
                    {{ $specification['label'] }}
                </a>
            </li>
        @empty
            
        @endforelse
    </ul>
@endsection