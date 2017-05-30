@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Fates
                            <span class="small pull-right">
                                ( / )
                            </span>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('gumball') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user" value="{{ $user->id }}"/>

                            @foreach ($errors->all() as $message)
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endforeach

                            @forelse ($groups as $group)
                                <h3>
                                    @if ($group->image)<img src="{{ $group->image }}" height="40" title="{{ $group->name }}">@endif
                                    {{ $group->name }}
                                </h3>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                &nbsp;
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Gumballs
                                            </th>
                                            <th>
                                                Created
                                            </th>
                                            <th>
                                                Completed
                                            </th>
                                            <th>
                                                Done
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($group->fates()->orderBy('name')->get() as $fate)
                                            <tr>
                                                <td>
                                                    @if ($fate->image)<img src="{{ $fate->image }}" height="40" title="{{ $fate->name }}">@endif
                                                </td>
                                                <td>
                                                    {{ $fate->name }}
                                                </td>
                                                <td>
                                                    <ol class="small">
                                                        @forelse ($fate->gumballs()->get() as $gumball)
                                                            <li>{{ $gumball->name }}</li>
                                                        @empty
                                                            <li class="list-unstyled">-</li>
                                                        @endforelse
                                                    </ol>
                                                </td>
                                                <td>
                                                    {{ $fate->created_at }}
                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    None to display
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <hr>
                            @empty
                                <h3>
                                    None to display
                                </h3>
                            @endforelse

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                    <a class="btn btn-link" href="{{ route('home') }}">
                                        Home
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
