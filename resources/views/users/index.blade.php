@extends('layouts.app')

@section('title')
  {{ $pageTitle }}
@endsection

@section('styles')
  <link href="/css/jquery.dataTables.css" rel="stylesheet">
  <link href="/css/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title"><i class="fa fa-users" aria-hidden="true"></i> {{ $pageTitle }}</h2>
          </div>

          <div class="panel-body">
            <p><a class="btn btn-sm btn-primary" href="{{ route('users.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Add</a></p>

            {!! $html->table(['class'=>'table-striped']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bootstrap.min.js"></script>
  {!! $html->scripts() !!}
@endsection
