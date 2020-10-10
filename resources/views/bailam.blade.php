@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bailam') }}</div>
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
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bailams as $bailam)
                                    <tr>
                                        <td><a href="{{ route('download_bailam', $bailam['filename']) }}" download>{{ $bailam['filename'] }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
