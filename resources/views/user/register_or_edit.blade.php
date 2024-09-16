@extends('layout.layout-admin')

@section('css')
@endsection

@section('main')
    <div class="text-center mt-4">
        @empty($user)
        <h1 class="pageTitle">Προσθήκη Νέου Χρήστη</h1>
        @else
        <h1 class="pageTitle">Χρήστης  <span >{{$user->name}}</span></h1>
        @endif
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
           <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <form id="userForm" method="POST"
              class="g-3 needs-validation"
              action="{{url()->current()}}" novalidate>
            @csrf
            @if(!empty($user))
                <input type="hidden" name="user_id" value="{{$user->id}}">
            @endif
            <div class="mb-3 row">
                <label for="emailInput" class="col-sm-2" >Email*</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="emailInput" placeholder="Email χρήστη"
                           @if(!empty($user))
                               value="{{$user->email}}"
                           @else
                               value="{{old('email')}}"
                           @endif
                           required>
                    <div class="invalid-feedback">
                        @if($errors->has('email'))
                            {{$errors->first('email')}}
                        @else
                            Παρακαλώ επιλέξτε ένα έγγυρο email
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nameInput" class="col-sm-2" >Ονοματεπώνυμο*</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control  @if($errors->has('name')) is-invalid @endif" id="nameInput" placeholder="Ονοματεπύνωμο χρήστη"
                           @if(!empty($user))
                               value="{{$user->name}}"
                           @else
                               value="{{old('name')}}"
                           @endif
                           required>
                    <div class="invalid-feedback">
                        @if($errors->has('name'))
                            {{$errors->first('name')}}
                        @else
                            Πaρακαλώ συμπληρώστε το ονοματεπώνυμο του χρήστη.
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-2" >Password</label>
                <div class="col-sm-10">
                    <div id="passwordVisible" class="input-group mb-1">
                        <input id="password" type="password" class="form-control @if($errors->has('password') || $errors->has('password_confirmation')) is-invalid @endif" name="password" placeholder="Κωδικός Πρόσβασης" @empty($edit) required @endif>
                            <button class="btn btn-secondary" type="button" onclick="toogleEyePasword('password','passwordEye')">
                                <i id="passwordEye" class="fa-regular fa-eye"></i>
                            </button>
                    </div>
                    <input id="password-repeat" type="password" name="password_confirmation" class="form-control @if($errors->has('password')||$errors->has('password_confirmation')) is-invalid @endif" placeholder="Εισάγετε τον κώδικο πρόβασης όπως και απο πάνω" @empty($edit) required @endif>
                    <div class="invalid-feedback">
                        @if($errors->has('password'))
                            {{$errors->first('password')}}
                        @elseif($errors->has('password_confirmation'))
                            {{$errors->first('password_confirmation')}}
                        @else
                            Παρακαλώ συμπληρώστε το password του χρήστη.
                        @endif
                    </div>
                </div>
            </div>

            <div class="submitContainer">
                <button type="submit" class="btn btn-primary">Αποθήκευση Χρήστη</button>
            </div>
        </form>
@endsection

@section('js')
    @vite(['resources/js/user/user.js'])
@endsection
