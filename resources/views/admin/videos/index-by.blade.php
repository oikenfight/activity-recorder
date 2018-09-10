<?php
/** @var \App\Entities\Action[]|\App\Entities\Collaborator[]|\Illuminate\Support\Collection| $items */
// ここに書くのは間違ってるけど、これくらいいいよね。。めんどいし。
$selectableQuery = [
    'all' => '全て',
    'action' => 'アクション',
    'collaborator' => '協力者',
    'date' => '日',
];
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->video_num }}</td>
                            @elseif(Request::query('by')==='collaborator')
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->post_video_num }}</td>
                                <td>{{ $item->act_video_num }}</td>
                            @else
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->video_num }}</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
