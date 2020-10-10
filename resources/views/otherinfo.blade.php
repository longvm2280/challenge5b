@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Information') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Name: ') }}{{ $otherdata['nameofuser'] }}<br>
                    {{ __('E-mail: ') }}{{ $otherdata['email'] }}<br>
                    {{ __('Phone number: ') }}{{ $otherdata['phone'] }}<br>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Message') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($conversation != NULL)
                        @foreach ($conversation as $mess)
                            @if ($mess['fromid'] == Auth::user()->id)
                                <div class="form-group row">
                                    <label for="mess" class="col-md-4 col-form-label text-md-right">{{ __('You:') }}</label>
                                    <form method="POST" action="{{ route('otherinfo_mess') }}?id={{ $otherdata['id'] }}&messid={{ $mess['id'] }}">
                                        @csrf
                                        <input id="mess" value="{{ $mess['mess'] }}" type="text" class="form-control" name="mess" required autocomplete="mess">
                                        <button type="submit" class="btn btn-primary" name="submit" value="change">
                                            {{ __('Change') }}
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="submit" value="delete">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="form-group row">
                                    <label for="mess" class="col-md-4 col-form-label text-md-right">{{ $otherdata['nameofuser'] }}:</label>

                                    <div class="col-md-6">
                                        <input id="mess" value="{{ $mess['mess'] }}" type="text" class="form-control" name="mess" required autocomplete="mess">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <div class="form-group row">
                        <label for="newmess" class="col-md-4 col-form-label text-md-right">{{ __('You:') }}</label>
                        <form method="POST" action="{{ route('otherinfo_mess') }}?id={{ $otherdata['id'] }}">
                            @csrf
                            <input id="newmess" type="text" class="form-control" name="newmess" required autocomplete="newmess">
                            <button type="submit" class="btn btn-primary" name="submit" value="send">
                                {{ __('Send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
