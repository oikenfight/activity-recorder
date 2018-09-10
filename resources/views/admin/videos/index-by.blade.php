<?php
/** @var \App\Entities\Action[]|\App\Entities\Collaborator[]|\Illuminate\Support\Collection| $items */
?>

{{-- layout --}}
@extends('layouts.admin-default')

{{-- Additional Css --}}
@section('additionalCss')
@endsection

{{-- Additional JavaScript --}}
@section('additionalJs')
@endsection

{{-- titleSuffix --}}
@section('titleSuffix', 'video.index')

{{-- includes --}}
@include('layouts.yields.nav-admin')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Top</a></li>
                <li class="breadcrumb-item active">ビデオ</li>
            </ol>
        </div>
    </div>

    <!-- query -->
    <div class="row justify-content-center">
        <div class="col-10">
            {!! Form::open([
                'route' => ['admin.video.indexBy'],
                'method' => 'get',
                'class'=> 'form-row',
            ]) !!}
            {{-- by --}}
            <div class="col-10">
                {{Form::select('by', $selectableQuery, old('by', Request::route('by') ?? ''), ['class' => 'form-control'])}}
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">検索</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row justify-content-center" style="padding-top: 40px;">
        <div class="col-sm-11">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        @if(Request::query('by')==='action')
                            <th>アクション</th>
                            <th>ビデオ数</th>
                        @elseif(Request::query('by')==='collaborator')
                            <th>協力者</th>
                            <th>投稿数</th>
                            <th>アクション数</th>
                        @else
                            <th>日付</th>
                            <th>ビデオ数</th>
                        @endif
                    </tr>
                    @foreach($items as $item)
                        <tr>
                            @if(Request::query('by')==='action')
                                <td><a href="{{ route('admin.video.index', ['action' => '?action='.$item->id]) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->video_num }}</td>
                            @elseif(Request::query('by')==='collaborator')
                                <td><a href="{{ route('admin.video.index', ['collaborator' => '?collaborator='.$item->id]) }}">{{ $item->name }}</a></td>
                                <td><a href="{{ route('admin.video.index', ['post_collaborator' => '?post_collaborator='.$item->id]) }}">{{ $item->post_video_num }}</a></td>
                                <td><a href="{{ route('admin.video.index', ['act_collaborator' => '?act_collaborator='.$item->id]) }}">{{ $item->post_video_num }}</a></td>
                            @else
                                <td><a href="{{ route('admin.video.index', ['date' => '?date='.$item->date]) }}">{{ $item->date }}</a></td>
                                <td>{{ $item->video_num }}</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
