<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<!--  BOX ICONS  -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    {{--   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> --}}
{{--     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> 



  <meta name="csrf-token" content="{{ csrf_token() }}">
<!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
  
  <title>Exe Data Center</title>
<style>

/*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");


/*===== VARIABLES CSS =====*/
:root{
  --header-height: 3rem;
  --nav-width: 68px;

  /*===== Colors =====*/
  --first-color: #4723D9;
  --first-color-light: #AFA5D9;
  --white-color: #F7F6FB;
  
  /*===== Font and typography =====*/
  --body-font: 'Nunito', sans-serif;
  --normal-font-size: 1rem;
  
  /*===== z index =====*/
  --z-fixed: 100;
}

/*===== BASE =====*/
*,::before,::after{
  box-sizing: border-box;
}

body{
  position: relative;
  margin: var(--header-height) 0 0 0;
  padding: 0 1rem;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  transition: .5s;
}

a{
  text-decoration: none;
}

/*===== HEADER =====*/
.header{
  width: 100%;
  height: var(--header-height);
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1rem;
  background-color: var(--white-color);
  z-index: var(--z-fixed);
  transition: .5s;
}

.header__toggle{
  color: var(--first-color);
  font-size: 1.5rem;
  cursor: pointer;
}

.header__img{
  width: 35px;
  height: 35px;
  display: flex;
  justify-content: center;
  border-radius: 50%;
  overflow: hidden;
}

.header__img img{
  width: 40px;
}

/*===== NAV =====*/
.l-navbar{
  position: fixed;
  top: 0;
  left: -30%;
  width: var(--nav-width);
  height: 100vh;
  background-color: #fff;
  padding: .5rem 1rem 0 0;
  transition: .5s;
  z-index: var(--z-fixed);
}

.nav{
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
}

.nav__logo, .nav__link{
  display: grid;
  grid-template-columns: max-content max-content;
  align-items: center;
  column-gap: 1rem;
  padding: .5rem 0 .5rem 1.5rem;
}

.nav__logo{
  margin-bottom: 2rem;
}

.nav__logo-icon{
  font-size: 1.25rem;
  color: var(--white-color);
}

.nav__logo-name{
  color: #000;
  font-weight: 700;
}

.nav__link{
  position: relative;
  color: #000;
  transition: .3s;
  font-size: 18px;
  font-weight: 600;

}
.nav-header{
  padding: .5rem 0 .5rem 1.5rem;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
}
.nav__link:hover{
  
  text-decoration: none;
}

.nav__icon{
  font-size: 1.25rem;
}

/*Show navbar movil*/
.show{
  left: 0;
}

/*Add padding body movil*/
.body-pd{
  padding-left: calc(var(--nav-width) + 1rem);
}

/*Active links*/
.active{
  color: #0056b3;
}

.active::before{
  content: '';
  position: absolute;
  left: 0;
  width: 2px;
  height: 32px;
  background-color: var(--white-color);
}

/* start css for counter cards*/

.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }

/*End of counter cards*/

/* ===== MEDIA QUERIES=====*/
@media screen and (min-width: 768px){
  body{
    margin: calc(var(--header-height) + 1rem) 0 0 0;
    padding-left: calc(var(--nav-width) + 2rem);
  }

  .header{
    height: calc(var(--header-height) + 1rem);
    padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
  }

  .header__img{
    width: 40px;
    height: 40px;
  }

  .header__img img{
    width: 45px;
  }

  .l-navbar{
    left: 0;
    padding: 1rem 1rem 0 0;
  }
  
  /*Show navbar desktop*/
  .show{
    width: calc(var(--nav-width) + 156px);
  }

  /*Add padding body desktop*/
  .body-pd{
    padding-left: calc(var(--nav-width) + 188px);
  }
}
.nav-icon{
    text-align: center;
    width: 1.6rem;
    font-size: 1.2rem;
    margin-right: .2rem;
}

.ul-upper-right li a{
  display: inline-block;
  color: #7f7f7f;
  text-decoration: none;
  font-size: 18px;
}

.ul-upper-right li{
  padding:0 10px;
}
/*-----------*/
.collapsed .show{
  transition: 0.5s linear;
}
.nav-link2[data-toggle].collapsed:after {
    content: " ▾";
    position: absolute;
    right: 0;
    transition: 0.5s linear;
}

.nav-link2[data-toggle]:not(.collapsed):after {
    content: " ▴";
    position: absolute;
    right: 20px;
    transition: 0.5s linear;
}
.nav-link .nav__link .active .collapsed{
  transition: 0.5s linear;
}

li.nav-item.dropdown.d-flex.justify-content-end {
    width: auto!important;
}
.dropdown-menu.show {
    width: auto;
}
.cus-padd li{
  padding: 0 5px!important;
}
.dropdown-menu2{
  min-width: 9rem;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

@media(max-width: 991px){
  .navbar-nav .dropdown-menu {
     position: absolute; 
}
}
@media(max-width: 767px){
  .nav-header{
    display: none;
  }
  .for-hide-dash{
    display: none;
  }
}

</style>

</head>

<body id="body-pd" class="body-pd">
  @include('layouts.admin.navbar') 

    {{-- <div id="wrapper"> --}}
    @include('layouts.admin.sidenav')
    <!-- Sidebar -->
  
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" style ="margin-top: 50px;">
        @yield('content')      
    </div>    
  {{-- </div>
 --}}


            <script>
            // hide and show 
            $(document).ready(function(){
                $('#header-toggle').on('click',function(){
                    if ( $('.nav-header').hasClass('d-none')) {
                        $('.nav-header').removeClass('d-none');
                    }else{
                        $('.nav-header').addClass('d-none');
                    }

                });
            });
        </script>
       <!-- JavaScript Bundle with Popper -->


        <!--===== MAIN JS =====-->
        <script src="{{asset('/assets/js/main.js')}}"></script>
   
</body>
</html> 
