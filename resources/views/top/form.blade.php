
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @if (session('flash_message'))
            <div class="alert alert-success text-center">
                {{ session('flash_message') }}
            </div>
        @endif
	
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="panel panel-default">
                <div class="panel-heading text-center">Send Question</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('top.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="text-area" class="col-md-4 control-label">question</label> 

                            <div class="col-md-6">
                                <textarea id="text-area" cols="70" rows="%" class="form-control " name="question">
                               </textarea> 
			    </div>
                        </div>

			<input type='hidden' name="user_id" value="{{ $user->id }}">

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Send question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




