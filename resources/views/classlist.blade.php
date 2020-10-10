@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Class list') }}</div>

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
					        		<th>Name</th>
					        		<th>E-mail</th>
					        		<th>Phone Number</th>
					      		</tr>
					    	</thead>
					    	<tbody>
					    		@foreach($data as $user)
					      			<tr class="clickable" onclick="window.location='{{ route('otherinfo') }}{{ __('?id=') }}{{ $user['id'] }}'">
						        		<td>{{ $user['nameofuser'] }}</td>
						        		<td>{{ $user['email'] }}</td>
						        		<td>{{ $user['phone'] }}</td>
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
