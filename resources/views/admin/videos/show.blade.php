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
    <div>
        This is admin.video.show
    </div>
@endsection
