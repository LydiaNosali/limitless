@extends('layouts.app', ['activePage' => 'notifications', 'titlePage' => __('Notifications')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">{{ __('Users') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage users') }}</p>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Status') }}
                                    </th>
                                    <th>
                                        {{ __('Nom et Prénom') }}
                                    </th>
                                    <th>
                                        {{ __('Email') }}
                                    </th>
                                    <th>
                                        {{ __('Date de fin d\'abonnement') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    use App\User;$users=User::all();?>
                                    @foreach($users as $user )
                                        @if($user->role == 'client')
                                        <tr>
                                            <td>
                                                {{ $user->suspend }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->date }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <div style="float:left;">
                                                <form action="/user/suspend" method="post">
                                                        @csrf
                                                        <button type="submit" name="suspend" class="btn btn-success btn-link" data-original-title="" title="" value={{$user->id}} onclick="confirm('{{ __("Are you sure you want to suspend this user?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">done</i>
                                                        <div class="ripple-container"></div>
                                                        </button>
                                                </form>
                                                </div>
                                                <div style="float:right;">
                                                <form action="/user/desuspend" method="post">
                                                    @csrf
                                                    <button type="submit" name="desuspend" class="btn btn-danger btn-link" data-original-title="" title="" value={{$user->id}} onclick="confirm('{{ __("Are you sure you want to desuspend this user?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                    </button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
