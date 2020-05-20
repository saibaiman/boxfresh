

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">boxfresh-kerokero</div>

                <div class="panel-body">
                    @if (session('flash_message'))
                        <div class="alert alert-danger text-center">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    <div class="text-center">
                    <a href="{{ route('top.index', ['user' => $user_id]) }}" class="btn btn-primary">
                        => question index
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
