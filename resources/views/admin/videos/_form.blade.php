<?php
/** @var $errors \Illuminate\Support\ViewErrorBag */
/** @var \App\Entities\Video $video */
?>

<!-- name -->
<div class="form-group row {{ $errors->has('video.name') ? ' has-error' : '' }}">
    {!! Form::label('video[name]', 'name', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    {{--<label for="from-name" class="col-form-label col-sm-2 text-right">name</label>--}}
    <div class="col-sm-9">
        {!! Form::text('video[name]', old('video.name', $video->name ?? ''), ['class' => 'form-control', 'placeholder' => 'name を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('video.name') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>

<!-- japanese name -->
<div class="form-group row {{ $errors->has('video.japanese_name') ? ' has-error' : '' }}">
    {!! Form::label('video[japanese_name]', 'japanese_name', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('video[japanese_name]', old('video.japanese_name', $video->japanese_name ?? ''), ['class' => 'form-control', 'placeholder' => 'japanese_name を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('video.japanese_name') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>
