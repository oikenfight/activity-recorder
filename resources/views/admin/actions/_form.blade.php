<?php
/** @var $errors \Illuminate\Support\ViewErrorBag */
/** @var \App\Entities\Action $action */
?>

<!-- name -->
<div class="form-group row {{ $errors->has('action.name') ? ' has-error' : '' }}">
    {!! Form::label('action[name]', 'name', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    {{--<label for="from-name" class="col-form-label col-sm-2 text-right">name</label>--}}
    <div class="col-sm-9">
        {!! Form::text('action[name]', old('action.name', $action->name ?? ''), ['class' => 'form-control', 'placeholder' => 'name を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('action.name') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>

<!-- japanese name -->
<div class="form-group row {{ $errors->has('action.japanese_name') ? ' has-error' : '' }}">
    {!! Form::label('action[japanese_name]', 'japanese_name', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('action[japanese_name]', old('action.japanese_name', $action->japanese_name ?? ''), ['class' => 'form-control', 'placeholder' => 'japanese_name を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('action.japanese_name') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>
