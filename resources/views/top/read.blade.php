@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('top.index', ['user' => $userd->id ] ) }}" class="card-link text-right btn btn-success">=> unread</a> 
            @if (!isset($message['0']))
            <div class="panel panel-default">
                <div class="panel-body text-center">
	        <p>no question for you, please wait for being sent question.</p>
                </div>
            </div>
	    @else
	    @foreach ($message as $question) 
            <div class="panel panel-default">
            <!--   <div class="panel-heading">boxfresh</div> -->
                <div class="panel-body text-center">
                    {{ $question->message }} 
                </div>
                <div class="panel-footing">
                        {{ $question->created_at->diffForHumans() }} 
		    <div class="text-right">
                        <a href="{{ route('unread', ['message' => $question->id ] ) }}" class="card-link">unread</a> 
                     </div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="d-flex justify-content-center">
                <div class="text-center">
                     {{ $message->links() }}
                </div> 
            </div> 
        </div>
    </div>
</div>
@endsection
