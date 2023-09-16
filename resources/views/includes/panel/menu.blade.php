<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    background: #EAEBEF;
    font-family: 'Poppins', sans-serif;
}

.nav{
    width: 200px;
}

.nav__link{
    color: #303440;
    display: block;
    padding: 15px 0;
    text-decoration: none;
}

.nav__link--inside{
    border-radius: 6px ;
    padding-left: 20px;
    text-align: left;
}

.nav__link--inside:hover{
    background: #F6F8FA;
}

.list{
    width: 200px;
    height: 100%;
    overflow-y: auto;
    display: flex;
    justify-content: center;
    flex-direction: column;
    border-radius: 0 16px 16px 0;
    background: #fff;
}

.list__item{
    list-style: none;
    width: auto;
    text-align: left;
    overflow: hidden;
}

.list__item--click{
    cursor: pointer;
}

.list__button{
    display: grid;
    place-items: start;
    gap: 1em;
    width: 70%;
    margin: 0 auto;
}
.list__button a {
    text-decoration: none;
}
.list__button i {
    margin-rigth: 0.5em;
}

.arrow .list__arrow{
    transform: rotate(90deg);
}

.list__arrow{
    margin-left: auto;
    transition: transform .3s;
}

.list__show{
    width: 80%;
    margin-left: auto;
    border-left: 2px solid #303440;
    list-style: none;
    transition: height .4s;
    height: 0;
}



</style>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú despegable</title>
</head>
<body>
    
    <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <a href="{{route('dashboard.index')}}" class="nav__link">
                    <i class="ni ni-tv-2 text-primary"></i>  Panel</a>
                </div>
            </li>


            @hasrole('Admin|Secretaria')

            <li class="list__item">
                <div class="list__button">
                    <a href="{{route('alumnos.index')}}" class="nav__link">
                    <i class="ni ni-hat-3"></i>  Alumnos</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <a href="{{route('padres.index')}}" class="nav__link">
                    <i class="fas fa-user-tie text-orange"></i>  Padres</a>
                </div>
            </li>

            <li class="list__item list__item--click" class="nav-item dropdown">
                <div class="list__button list__button--click">
                    <a href="#" class="nav__link">
                    <i class="fas fa-chalkboard-teacher text-yellow"></i>  Secretaria</a>
                    
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="{{Route('principal.create')}}" class="nav__link nav__link--inside">Matricula</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{route('cursos.index')}}" class="nav__link nav__link--inside">Grado/Seccion</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{route('indexcompromiso.create')}}" class="nav__link nav__link--inside">Compromiso</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{route('cursostotales.index')}}" class="nav__link nav__link--inside">Cursos Totales</a>
                    </li>
                    @hasrole('Admin')
                    <li class="list__inside">
                        <a href="{{route('periodo')}}" class="nav__link nav__link--inside">Periodos Matricula</a>
                    </li>
                    @endhasrole
                </ul>
            </li>
            @endhasrole

            @hasrole('Admin|Orientacion')
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <a href="#" class="nav__link">
                    <i class="fas fa-book-reader text-red"></i>  Orientacion</a>
                </div>

                <ul class="list__show">

                    <li class="list__inside">
                        <a href="{{Route('escolar.index')}}" class="nav__link nav__link--inside">Formulario Escolar</a>
                    </li>

                    </ul>
              </li>
              @endhasrole

              @hasrole('Admin|Consejeria')
            <li class="list__item">
                <div class="list__button">
                    <a href="{{Route('tabla.index')}}" class="nav__link">
                    <i class="fas fa-users text-red"></i>  Consejeria</a>
                </div>
            </li>
            @endhasrole

            @hasrole('Admin|Tesoreria')
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <a href="#" class="nav__link">
                    <i class="fas fa-comment-dollar text-green"></i>  Tesoreria</a>
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="{{Route('firmacontratotesoreria.create')}}" class="nav__link nav__link--inside">Firma de Contrato</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{Route('vistapago.index')}}" class="nav__link nav__link--inside">Pago a Realizar</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{Route('retrasadas.index')}}" class="nav__link nav__link--inside">Pago Retrasada</a>
                    </li>
                </ul>
            </li>
            @endhasrole

            @hasrole('Admin|Secretaria')
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <a href="#" class="nav__link">
                    <i class="fas fa-cogs text-blue"></i>  Configuracion</a>
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="{{Route('grados.index')}}" class="nav__link nav__link--inside">Grado</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{Route('horario.index')}}" class="nav__link nav__link--inside">Horario</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{Route('jornada.index')}}" class="nav__link nav__link--inside">Jornada</a>
                    </li>
                    <li class="list__inside">
                        <a href="{{Route('modalidad.index')}}" class="nav__link nav__link--inside">Modalidad</a>
                    </li>
                    <li class="list__inside">
                        <a href="{{Route('seccionindex.index')}}" class="nav__link nav__link--inside">Seccion</a>
                    </li>
                </ul>

            </li>
            @endhasrole

            @hasrole('Admin')
            <li class="list__item">
                <div class="list__button">
                    <a href="{{Route('usuarios.index')}}" class="nav__link">
                    <i class="	fas fa-users-cog text-Dark grey"></i> Personal</a>
                </div>
            </li>
            @endhasrole

            <li class="list__item">
                <div class="list__button">
                    <a href="#" class="nav__link" onclick="event.preventDefault(); document.getElementById('formlogout').submit();">
                    <i class="fas fa-sign-in-alt"></i>  Cerrar Sesion</a>
                    <form action="{{route('logout')}}" method="POST" style="display: none;" id="formlogout">
                     @csrf
                    </form>
                </div>  
            </li>

        </ul>
    </nav>


</body>
</html>


<script>
let listElements = document.querySelectorAll('.list__button--click');

listElements.forEach(listElement => {
    listElement.addEventListener('click', ()=>{
        
        listElement.classList.toggle('arrow');

        let height = 0;
        let menu = listElement.nextElementSibling;
        if(menu.clientHeight == "0"){
            height=menu.scrollHeight;
        }

        menu.style.height = `${height}px`;

    })
});
</script>