<?php
/** @var \App\Entities\Action[]|\Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator $actions */
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
@section('titleSuffix', 'user.index')

{{-- includes --}}
@include('layouts.yields.nav-admin')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Top</a></li>
                <li class="breadcrumb-item active">アクション</li>
            </ol>
        </div>
    </div>

    <div class="row message-and-tools-line">
        <div class="col-sm-12 pull-right text-right">
            <a href="{{ route('admin.action.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 追加</a>
        </div>
    </div>

    <div class="row">
        @if(count($actions) and $actions instanceof Illuminate\Pagination\AbstractPaginator)
            <div class="col-sm-12 text-center">
                {{--{!! $actions->appends(Request::all())->render() !!}--}}
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
                        <th>japanese_name</th>
                        <th></th>
                    </tr>
                    @foreach($actions as $action)
                        <tr>
                            <td><a href="{{ route('admin.action.show', [$action->id]) }}">{{ $action->id }}</a></td>
                            <td>{{ $action->name }}</td>
                            <td>{{ $action->japanese_name }}</td>
                            <td>
                                {!! Form::open([
                                    'route' => ['admin.action.destroy', $action->id],
                                    'method' => 'delete',
                                    'class'=> 'form form-inline',
                                ]) !!}
                                <a href="{{ route('admin.action.edit', $action->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> 編集</a>
                                <button type="submit" class="btn btn-sm btn-danger confirm-delete-btn" data-confirm-msg="{{ $action->name }} を削除してよろしいですか？" ><i class="fa fa-trash-o"></i> 削除</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        @if(count($actions) and $actions instanceof Illuminate\Pagination\AbstractPaginator)
            <div class="col-sm-12 text-center">
                {!! $actions->appends(Request::all())->render() !!}
            </div>
        @endif
    </div>
@endsection
