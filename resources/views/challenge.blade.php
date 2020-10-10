@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Challenge list') }}</div>
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
                                @foreach($challenges as $challenge)
                                    <tr>
                                        @if (Auth::user()->usertype == 1)
                                            <td>{{ $challenge['challenge'] }}</td>
                                            <td>{{ $challenge['suggestion'] }}</td>
                                        @else
                                            <td class="clickable" onclick="window.location='{{ route('answer') }}{{ __('?challengeid=') }}{{ $challenge['id'] }}'">{{ $challenge['challenge'] }}</td>
                                            <td>{{ $challenge['suggestion'] }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if (Auth::user()->usertype == 1)
                    <div class="card-header">{{ __('Upload Challenge') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
    			  			<form method="POST" action="{{ route('upload_challenge') }}" enctype="multipart/form-data">
                                @csrf
    			  				<input type="file" name="file" id="file"><br><br>
    			  				<input id="suggestion" type="text" class="form-control" name="suggestion" required autocomplete="suggestion">
    			  				<input type="submit" name="upload" value="Upload">
    			  			</form>
    					</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
