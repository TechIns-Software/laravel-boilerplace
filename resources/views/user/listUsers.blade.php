@extends('layout.layout-admin')

@section('title',__('user.list_title'))

@section('css')
    @vite(['resources/css/user/list.css'])
@endsection

@section('main')
    <div class="col-12 mt-4 text-center">
        <h1 class="pageTitle" >Χρήστες</h1>

        <form id="searchform" method="GET" action="{{route('user.list')}}">
            <div class="d-flex justify-content-end flex-wrap" role="toolbar" aria-label="Filters and Selections">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Αναζήτηση Χρήστη" name="search"
                           value="{{request()->input('search')}}"
                    >
                    <button type="submit" class="input-group-text" id="btnGroupAddon2"><i class="fa fa-search"></i></button>
                </div>
                <div class="btn-group m-2">
                    <a id="resetForm" href="{{route('user.list')}}" class="btn btn-secondary" >Εκκαθάριση Φόρμας</a>
                </div>
                <div class="btn-group m-2" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="font-weight:bold;">{{ $users->perPage() }}</span>&nbsp;Χρήστες Ανα σελίδα
                    </button>
                    <ul class="dropdown-menu">
                        @foreach([10,20,50,100] as $pageLimit)
                            <li>
                                <label class="dropdown-item">
                                    <input type="radio" form="searchform" name="limit" value="{{$pageLimit}}"
                                           @if($users->perPage() == $pageLimit) checked @endif
                                    >
                                    {{$pageLimit}} Χρήστες Ανα σελίδα
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="btn-group  m-2" role="group" >
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @empty(request()->input('role'))
                            Όλοι οι χρήστες
                        @else
                            {{__("user.".request()->input('role'))}}
                        @endif
                    </button>
                    <div class="dropdown-menu">
                        <li>
                            <label class="dropdown-item">
                                <input type="radio" name="role" value=""
                                       @empty(request()->input('role')) checked @endif
                                >
                                Όλοι οι χρήστες
                            </label>
                        </li>
                        <li>
                            <label class="dropdown-item" aria-current="true"
                                   @if(request()->input('role') == App\Models\User::USER_ADMIN) checked @endif
                            >
                                <input type="radio" name="role" value="{{App\Models\User::USER_ADMIN}}">
                                Διαχειρηστής
                            </label>
                        </li>
                        <li>
                            <label class="dropdown-item">
                                <input type="radio" name="role" value="{{App\Models\User::USER_CLIENT}}"
                                       @if(request()->input('role') == App\Models\User::USER_CLIENT) checked @endif
                                >
                                Κανονικός Χρήστης
                            </label>
                        </li>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <a class="btn btn-primary btn-block" href="{{@route('user.register.view')}}"> Προσθήκη Χρήστη <i class="fa-solid fa-user-plus"></i></a>
        </div>
    </div>

    <div id="userTableContainer" class="row mt-4">
        @include("components/listUser",['users'=>$users])
    </div>
@endsection

@section("js")
    @vite(['resources/js/user/list.js'])
@endsection
