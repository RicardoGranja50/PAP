<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</head>
<body>
<style type="text/css">
  :root {
  --body_gradient_left: #66b3ff;
  --body_gradient_right: #0c6981;
  --form_bg: #ffffff;
  --input_bg: #e5e5e5;
  --input_hover: #eaeaea;
  --submit_bg: #0c6981;
  --submit_hover: #1199bb;
  --icon_color: #6b6b6b;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  /* make the body full height*/
  height: 100vh;
  /* set our custom font */
  font-family: 'Roboto', sans-serif;
  /* create a linear gradient*/
  background-image: linear-gradient(
    to right,
    var(--body_gradient_left),
    var(--body_gradient_right)
  );
  display: flex;
}

#form_wrapper {
  width: 1000px;
  height: 700px;
  /* this will help us center it*/
  margin: auto;
  background-color: var(--form_bg);
  border-radius: 50px;
  /* make it a grid container*/
  display: grid;
  /* with two columns of same width*/
  grid-template-columns: 1fr 1fr;
  /* with a small gap in between them*/
  grid-gap: 5vw;
  /* add some padding around */
  padding: 5vh 15px;
}

#form_left {
  /* center the image */
  display: flex;
  justify-content: center;
  align-items: center;
}

#form_left img {
  width: 350px;
  height: 350px;
}

#form_right {
  display: grid;
  /* single column layout */
  grid-template-columns: 1fr;
  /* have some gap in between elements*/
  grid-gap: 20px;
  padding: 10% 5%;
}

.input_container {
  background-color: var(--input_bg);
  /* vertically align icon and text inside the div*/
  display: flex;
  align-items: center;
  padding-left: 20px;
}

.input_container:hover {
  background-color: var(--input_hover);
}

.input_container,
#input_submit {
  height: 60px;
  /* make the borders more round */
  border-radius: 30px;
  width: 100%;
}

.input_field {
  /* customize the input tag with lighter font and some padding*/
  color: var(--icon_color);
  background-color: inherit;
  width: 90%;
  border: none;
  font-size: 1.3rem;
  font-weight: 400;
  padding-left: 30px;
}

.input_field:hover,
.input_field:focus {
  /* remove the outline */
  outline: none;
}

#input_submit {
  /* submit button has a different color and different padding */
  background-color: var(--submit_bg);
  padding-left: 0;
  font-weight: bold;
  color: white;
  text-transform: uppercase;
}

#input_submit:hover {
  background-color: var(--submit_hover);
  /* simple color transition on hover */
  transition: background-color, 1s;
  cursor: pointer;
}

h1,
span {
  text-align: center;
}

/* shift it a bit lower */
#create_account {
  display: block;
  position: relative;
  top: 30px;
}

a {
  /* remove default underline */
  text-decoration: none;
  color: var(--submit_bg);
  font-weight: bold;
}

a:hover {
  color: var(--submit_hover);
}

i {
  color: var(--icon_color);
}

/* make it responsive */
@media screen and (max-width: 768px) {
  /* make the layout  a single column and add some margin to the wrapper */
  #form_wrapper {
    grid-template-columns: 1fr;
    margin-left: 10px;
    margin-right: 10px;
  }
  /* on small screen we don't display the image */
  #form_left {
    display: none;
  }
}

</style>


<div id="form_wrapper">
    <div id="form_left">
      <img src="{{asset('imagens/aedah.png')}}" alt="computer icon" />
    </div>  
    <form action="{{route('principal.update')}}" method="post">
      @csrf
      <div id="form_right">
        <h1>Change Password</h1>
         <div class="input_container">
          <i class="fas fa-user-friends"></i>
          <input
            placeholder="Username"
            type="nome"
            name="nome"
            class="input_field">
        </div>
        <div class="input_container">
          <i class="fas fa-lock"></i>
          <input
            placeholder="Old Password"
            type="password"
            name="passwordOld"
            id="field_password"
            class="input_field">
        </div>
        <div class="input_container">
          <i class="fas fa-lock"></i>
          <input
            placeholder="New Password"
            type="password"
            name="password"
            id="field_password"
            class="input_field">
        </div>
        @if(session()->has('pass'))
        <br>
          <div class="input_container" role="alert" style="background-color:#ffc1b5;text-align: center">
            {{session('pass')}}
        </div>
        @endif
        @if($errors->has('password'))
          <div class="input_container" role="alert" style="background-color:#ffc1b5">
            A password tem de conter no minímo 8 caracteres.
          </div>
        @endif
            <input
            type="submit"
            value="Confirm"
            id="input_submit"
            class="input_field">
      </form>
      <form action="{{route('principal.principal')}}">
         <input
              type="submit"
              value="Cancel"
              id="input_submit"
              class="input_field">
      </form>
    </div>
  </div>
</body>