@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
		    <div class="text-center">Login</div>
		</div>

                <div class="panel-body">
                    <div class="text-center">     
		        <a class="btn btn-success" href="{{ route('twitter.login') }}">
                        Login with Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
