<?php
/** @var \App\Entities\Collaborator $collaborator */
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
                <li class="breadcrumb-item"><a href="{{ route('admin.collaborator.index') }}">協力者</a></li>
                <li class="breadcrumb-item active">編集</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {!! Form::open([
            'route' => ['admin.collaborator.update', $collaborator->id],
            'method' => 'put',
            'class'=> 'form form-horizontal',
            ]) !!}

            @include('admin.collaborators._form')

            <div class="form-group">
                <div class="offset-sm-2 col-sm-9">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
