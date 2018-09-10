<?php
/** @var \App\Entities\Video[]|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator $videos */

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

    <div class="row" style="padding-top: 40px">
        @if(count($videos) and $videos instanceof Illuminate\Pagination\AbstractPaginator)
            <div class="col-sm-12">
                <div class="pull-right">
                    {!! $videos->appends(Request::all())->render() !!}
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>アクション</th>
                        <th>投稿協力者</th>
                        <th>アクション協力者</th>
                        <th></th>
                    </tr>
                    @foreach($videos as $video)
                        <tr>
                            <td><a href="{{ route('admin.video.show', [$video->id]) }}">{{ $video->id }}</a></td>
                            <td>{{ $video->name }}</td>
                            <td>{{ $video->action->name }}</td>
                            <td>{{ $video->postCollaborator->name }}</td>
                            <td>{{ $video->actCollaborator->name }}</td>
                            <td>
                                {!! Form::open([
                                    'route' => ['admin.video.destroy', $video->id],
                                    'method' => 'delete',
                                    'class'=> 'form form-inline',
                                ]) !!}
                                <a href="{{ route('admin.video.edit', [$video->id]) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> 編集</a>
                                <button type="submit" class="btn btn-sm btn-danger confirm-delete-btn" data-confirm-msg="{{ $video->name }} を削除してよろしいですか？" ><i class="fa fa-trash-o"></i> 削除</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        @if(count($videos) and $videos instanceof Illuminate\Pagination\AbstractPaginator)
            <div class="col-sm-12 text-center">
                {!! $videos->appends(Request::all())->render() !!}
            </div>
        @endif
    </div>
@endsection
