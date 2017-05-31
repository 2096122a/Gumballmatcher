@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Factions
                        </h2>
                    </div>

                    <div class="panel-body">
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
                                        Created
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($factions as $faction)
                                    <tr>
                                        <td>
                                            @if ($faction->image)<img src="{{ $faction->image }}" height="40" title="{{ $faction->name }}">@endif
                                        </td>
                                        <td>
                                             {{ $faction->name }}
                                        </td>
                                        <td>
                                             {{ $faction->created_at }}
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="3">
                                        None to display
                                    </td>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="col-md-8 col-md-offset-4">
                            <a class="btn btn-link" href="{{ route('home') }}">
                                Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
