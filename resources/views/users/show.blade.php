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
            <h2 class="panel-title"><i class="fa fa-user" aria-hidden="true"></i> {{ $pageTitle }}</h2>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">
                Name
              </div>

              <div class="col-md-10">
                {{ $user->name }}
              </div>
            </div>

            <div class="row">
              <div class="col-md-2">
                Address
              </div>

              <div class="col-md-10">
                {{ $user->address }}
              </div>
            </div>

            <div class="row">
              <div class="col-md-2">
                Phone
              </div>

              <div class="col-md-10">
                {{ $user->phone }}
              </div>
            </div>

            <div class="row show-btn">
              <div class="col-md-2">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                <a href="{{ route('users.index') }}" class="btn btn-sm btn-success"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection
