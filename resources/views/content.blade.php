@extends('home')
@section('contents')
    <div class="text-white" id="contents">
        <div class="card bg-transparent border-0">
            <div class="card-header">
                <span class="fs-2 fw-bold">{{ $result['title'] }}</span> -
                <span class="fs-5 fst-italic">{{ $result['author'] }}</span>
            </div>
            <div class="card-body border-top border-light">
                <p class="card-text" id="desc">{{ $result['description']}}.</p>
            </div>
        </div>
    </div>
@endsection