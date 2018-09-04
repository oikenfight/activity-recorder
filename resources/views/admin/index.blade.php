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
    <div>
        <div id="app"></div>
    </div>
@endsection
