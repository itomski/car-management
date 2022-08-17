@extends('layouts.standard')

@section('header')
    <h1>Kontakt</h1>
@endsection

@section('main')

    <div class="row">
        <div class="col-sm-8 col-md-6">
            <form action="{{ route('contact') }}" method="post">

                @csrf

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" value="mr" {{ request()->title == 'mr' ? 'checked' : '' }}>
                        <label class="form-check-label">Mr</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" value="mrs" {{ request()->title == 'mrs' ? 'checked' : '' }}>
                        <label class="form-check-label">Mrs</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" value="miss" {{ request()->title == 'miss' ? 'checked' : '' }}>
                        <label class="form-check-label">Miss</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label>First name</label><br>
                    <input type="text" name="first_name" class="form-control" value="{{ request()->first_name }}">
                </div>

                <div class="mb-3">
                    <label>Last name</label><br>
                    <input type="text" name="last_name" class="form-control" value="{{ request()->last_name }}">
                </div>

                <div class="mb-3">
                    <label>Email</label><br>
                    <input type="email" name="email" value="{{ request()->email }}" id="email" class="form-control {{ in_array('email', $errorArr) ? 'is-invalid' : ''}}">
                    @if(in_array('email', $errorArr))
                    <div id="email" class="invalid-feedback">
                        Du musst deine E-Mail-Adresse angeben
                    </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Phone number</label><br>
                    <input type="tel" name="phone" class="form-control" value="{{ request()->phone }}">
                </div>

                <div class="mb-3">
                    <label>Message</label><br>
                    <textarea name="msg" id="msg" class="form-control {{ in_array('msg', $errorArr) ? 'is-invalid' : ''}}"></textarea>
                    <div id="msg" class="invalid-feedback">
                        Du musst eine Nachricht eingeben
                    </div>
                </div>


                <div class="mb-3">
                    <label>Country</label><br>
                    <select class="form-control" name="country">
                        <option {{ request()->country == 'China' ? 'selected' : '' }}>China</option>
                        <option {{ request()->country == 'India' ? 'selected' : '' }}>India</option>
                        <option {{ request()->country == 'United States' ? 'selected' : '' }}>United States</option>
                        <option {{ request()->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                        <option {{ request()->country == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>
                    <input type="checkbox" name="terms" >
                    I agree to the <a href="/terms">terms and conditions</a>
                    </label>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection