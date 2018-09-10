<?php
/** @var $errors \Illuminate\Support\ViewErrorBag */
/** @var \App\Entities\Collaborator $collaborator */

$grades = [
    0 => '選択してください',
    1 => '1',
    2 => '2',
    3 => '3',
    4 => '4',
    5 => '5',
    6 => '6',
    7 => '7',
];
?>

<!-- grade -->
<div class="form-group row {{ $errors->has('collaborator.grade') ? ' has-error' : '' }}">
    {!! Form::label('collaborator[grad]', 'grad', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    <div class="col-sm-9">
        {{Form::select('collaborator[grade]', $grades, old('collaborator.grade', $collaborator->grade ?? ''), ['class' => 'form-control'])}}
        <p class="help-block">
            @foreach($errors->get('collaborator.name') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>

<!-- name -->
<div class="form-group row {{ $errors->has('collaborator.name') ? ' has-error' : '' }}">
    {!! Form::label('collaborator[name]', 'name', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('collaborator[name]', old('collaborator.name', $collaborator->name ?? ''), ['class' => 'form-control', 'placeholder' => 'name を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('collaborator.name') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>

<!-- name_read -->
<div class="form-group row {{ $errors->has('collaborator.name_read') ? ' has-error' : '' }}">
    {!! Form::label('collaborator[name_read]', 'name_read', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('collaborator[name_read]', old('collaborator.name_read', $collaborator->name_read ?? ''), ['class' => 'form-control', 'placeholder' => '読み（アルファベット）を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('collaborator.name_read') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>

<!-- kana_name_read -->
<div class="form-group row {{ $errors->has('collaborator.kana_name_read') ? ' has-error' : '' }}">
    {!! Form::label('collaborator[kana_name_read]', 'kana_name_read', ['class' => 'col-form-label col-sm-2 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('collaborator[kana_name_read]', old('collaborator.kana_name_read', $collaborator->kana_name_read ?? ''), ['class' => 'form-control', 'placeholder' => '読み（かな）を入力して下さい']) !!}
        <p class="help-block">
            @foreach($errors->get('collaborator.kana_name_read') as $errorStr)
                {{ $errorStr }}
            @endforeach
        </p>
    </div>
</div>
