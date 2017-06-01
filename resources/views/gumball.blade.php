@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Gumballs
                            <span class="small pull-right">
                                ({{ $user->gumballs()->count() }} / {{ $gumballs->count() }})
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

                            @forelse ($factions as $faction)
                                <h3>
                                    @if ($faction->image)<img src="{{ $faction->image }}" height="40" title="{{ $faction->name }}">@endif
                                    {{ $faction->name }}
                                    <span class="small pull-right">
                                        ({{ $user->factionGumballs($faction->id)->count() }} / {{ $faction->gumballs()->count() }})
                                    </span>
                                </h3>

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                &nbsp;
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Created
                                            </th>
                                            <th>
                                                Unlocked
                                            </th>
                                            <th>
                                                Owned?
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faction->gumballs()->orderBy('name')->get() as $gumball)
                                            <tr>
                                                <td>
                                                    @if ($gumball->image)<img src="{{ $gumball->image }}" height="40" title="{{ $gumball->name }}">@endif
                                                </td>
                                                <td>
                                                    {{ $gumball->name }}
                                                </td>
                                                <td>
                                                    {{ $gumball->created_at }}
                                                </td>
                                                <td>
                                                    @if ($gumball->userGumball($user->id)->count())
                                                        {{ $gumball->userGumball($user->id)->first()->updated_at }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="gumballs[]" value="{{ $gumball->id }}" {{ $user->gumballs()->where('gumball_id', '=', $gumball->id)->count() || old('gumballs[' . $gumball->id . ']') ? 'checked' : '' }} />
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
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
