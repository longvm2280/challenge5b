@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Challenge') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Challenge</th>
                                    <th>Suggestion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $challenge['challenge'] }}</td>
                                    <td>{{ $challenge['suggestion'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                <div class="card-header">{{ __('Answer') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <form method="POST" action="{{ route('answer') }}?challengeid={{ $challenge['id'] }}">
                            @csrf
			  				<input id="answer" name="answer" type="text" class="form-control" name="answer" required autocomplete="answer">
			  				<button type="submit">Answer</button>
			  			</form>
                    </div>
                </div>
                @if (isset($filecontent))
                <div class="card">
                <div class="card-header" style="color: green">{{ __('Correct') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <p>{{ $filecontent }}</p>
                    </div>
                </div>
                @else
                <div class="card">
                <div class="card-header" style="color: red">{{ __('Incorrect') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <p>Try again</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
