<?php
/** @var \App\Entities\Collaborator[]|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator $collaborators */
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
@section('titleSuffix', 'collaborator.index')

{{-- includes --}}
@include('layouts.yields.nav-admin')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Top</a></li>
                <li class="breadcrumb-item active">協力者</li>
            </ol>
        </div>
    </div>

    <div class="row message-and-tools-line">
        <div class="col-sm-12 pull-right text-right">
            <a href="{{ route('admin.collaborator.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 追加</a>
        </div>
    </div>

    <div class="row">
        @if(count($collaborators) and $collaborators instanceof Illuminate\Pagination\AbstractPaginator)
            <div class="col-sm-12 text-center">
                {{--{!! $collaborators->appends(Request::all())->render() !!}--}}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>grade</th>
                        <th>name</th>
                        <th>name_read</th>
                        <th>kana_name_read</th>
                        <th></th>
                    </tr>
                    @foreach($collaborators as $collaborator)
                        <tr>
                            <td><a href="{{ route('admin.collaborator.show', [$collaborator->id]) }}">{{ $collaborator->id }}</a></td>
                            <td>{{ $collaborator->grade }}</td>
                            <td>{{ $collaborator->name }}</td>
                            <td>{{ $collaborator->name_read }}</td>
                            <td>{{ $collaborator->kana_name_read }}</td>
                            <td>
                                {!! Form::open([
                                    'route' => ['admin.collaborator.destroy', $collaborator->id],
                                    'method' => 'delete',
                                    'class'=> 'form form-inline',
                                ]) !!}
                                <a href="{{ route('admin.collaborator.edit', [$collaborator->id]) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> 編集</a>
                                <button type="submit" class="btn btn-sm btn-danger confirm-delete-btn" data-confirm-msg="{{ $collaborator->name }} を削除してよろしいですか？" ><i class="fa fa-trash-o"></i> 削除</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        @if(count($collaborators) and $collaborators instanceof Illuminate\Pagination\AbstractPaginator)
            <div class="col-sm-12 text-center">
                {!! $collaborators->appends(Request::all())->render() !!}
            </div>
        @endif
    </div>
@endsection
