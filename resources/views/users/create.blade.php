@extends('layouts.app')

@section('title')
  {{ $pageTitle }}
@endsection

@section('styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ $pageTitle }}</h2>
          </div>

          <div class="panel-body">
            {!! Form::open(['url' => route('users.store'),
              'method' => 'post', 'class'=>'form-horizontal']) !!}
              @include('users._form', ['edit' => false])
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection
