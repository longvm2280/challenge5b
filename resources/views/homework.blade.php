@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Homework list') }}</div>
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
                                    <th>Homework</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allhomework as $homework)
                                    <tr>
                                        @if (Auth::user()->usertype == 0)
                                            <td><a href="{{ route('download', $homework['filename']) }}" download>{{ $homework['filename'] }}</a></td>
                                            <td>
                                                <div class="container">
                                                    <form method="POST" action="{{ route('upload') }}?questionid={{$homework['id']}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="file" id="file"><br><br>
                                                        <input type="submit" name="upload" value="Upload">
                                                    </form>
                                                </div>
                                            </td>
                                        @else
                                            <td class="clickable" onclick="window.location='{{ route('bailam') }}{{ __('?questionid=') }}{{ $homework['id'] }}'">{{ $homework['filename'] }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if (Auth::user()->usertype == 1)
                    <div class="card-header">{{ __('Upload') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
    			  			<form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                                @csrf
    			  				<input type="file" name="file" id="file"><br><br>
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
