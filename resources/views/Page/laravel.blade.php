<h1> Welcome to, {{ $name }}</h1>

<!-- @unless (Auth::check())  //login ache kina
       You are not Log in.
@endunless -->

<!-- @guest 
<a href = "">Login</a>
@else
<a href = "">Profile</a>
@endguest
<br> -->
<!-- {{ url()->current() }}  //see current location or url -->
{{ url()->full() }}
<br>

<a href= "{{ url('/') }}">Back to home</a>