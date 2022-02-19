@extends('layouts.master_layout')
@section('title', $title)
@section('main')
    <div class="detail-news">
        <div class="row content">
            <div class="col-8">
                <h1 class="title">
                    {{ $detail->name }}
                </h1>
                <div class="dateandcat">
                    {{ date_format($detail->created_at, 'd/m/Y - H:i') }}
                </div>
                <div class="main-content"> {!! $detail->content !!} </div>
                <div class="sourceandauthor text-end">
                    <p class="source">{{ $detail->author }}</p>
                    <p class="author">Nguồn: <a href="{{ $detail->source }}">{{ $detail->source }}</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
