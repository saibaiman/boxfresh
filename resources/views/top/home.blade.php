@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">boxfresh</div>
                    <div class="text-center">
		        {{ $user->name }}
                    </div>
                    <div class="panel-body text-center">
                         please send question  
                    </div>
                    <div class="text-center">
                    <a href="{{ route('top.form', ['user' => $user->id]) }}" class='btn btn-primary'>
		        Send question
	            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
