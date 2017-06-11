<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Name', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
  {!! Form::label('address', 'Address', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('address', null, ['class'=>'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
  {!! Form::label('phone', 'Phone', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    @if ($edit == true)
      {{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
    @else
      {{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
    @endif

    <a href="{{ route('users.index') }}" class="btn btn-success"><i class="fa fa-reply" aria-hidden="true"></i> Cancel</a>
  </div>
</div>
