

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp(){
    consultarADMIN();
    consultarALUMNO();
    consultarPROF();
    consultarASIS();
}
async function consultarASIS(){
    try {
        const url = 'http://localhost:3000/api/asistencias';
        const resultado = await fetch(url);
        const asistencias = await resultado.json();
        mostrarAsistencias(asistencias);
    } catch (error){
        console.log(error);
    }
}
function mostrarAsistencias(asistencias){
    asistencias.forEach( asistencia => {
        const { id, matricula, fecha, hora, nrc, salon } = asistencia;
        
        const idAsis = document.createElement('TH');
        idAsis.textContent = id;

        const matriculaAlumno = document.createElement('TH');
        matriculaAlumno.textContent = matricula;

        const fechAsis = document.createElement('TH');
        fechAsis.classList.add('nombre');
        fechAsis.textContent = fecha;

        const horaAsis = document.createElement('TH');
        horaAsis.classList.add('nombre');
        horaAsis.textContent = hora;

        const nrcClase = document.createElement('TH');
        nrcClase.classList.add('nombre');
        nrcClase.textContent = nrc;

        const salonClase = document.createElement('TH');
        salonClase.classList.add('nombre');
        salonClase.textContent = salon;

        

        const adminTabla = document.createElement('TR');
        adminTabla.classList.add('admin-datos');
        adminTabla.dataset.idAdmin = id;

        adminTabla.appendChild(idAsis);
        adminTabla.appendChild(matriculaAlumno);
        adminTabla.appendChild(fechAsis);
        adminTabla.appendChild(horaAsis);
        adminTabla.appendChild(nrcClase);
        adminTabla.appendChild(salonClase);;

        document.querySelector('#asistencias').appendChild(adminTabla);
    })
}
// ADMIN
async function consultarADMIN(){
    try {
        const url = 'http://localhost:3000/api/admin';
        const resultado = await fetch(url);
        const admins = await resultado.json();
        mostrarAdmin(admins);
    } catch (error){
        console.log(error);
    }
}

function mostrarAdmin(admins){
    admins.forEach( admin => {
        const {id, nombre, apellidoPaterno, apellidoMaterno, correo } = admin;
        
        const nombreAdmin = document.createElement('TH');
        nombreAdmin.textContent = nombre;

        const paternoAdmin = document.createElement('TH');
        paternoAdmin.classList.add('nombre');
        paternoAdmin.textContent = apellidoPaterno;

        const maternoAdmin = document.createElement('TH');
        maternoAdmin.classList.add('nombre');
        maternoAdmin.textContent = apellidoMaterno;

        const correoAdmin = document.createElement('TH');
        correoAdmin.classList.add('nombre');
        correoAdmin.textContent = correo;

    

        const iconoEliminar= document.createElement('A');
        iconoEliminar.setAttribute("href" , '/eliminar-admin');
        iconoEliminar.innerHTML = 
        `<form action="/eliminar-admin" method="POST">
        <input type="hidden" name="id" value="${id}">
        <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-off" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 3l18 18" />
            <path d="M4 7h3m4 0h9" />
            <path d="M10 11l0 6" />
            <path d="M14 14l0 3" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923" />
            <path d="M18.384 14.373l.616 -7.373" />
            <path d="M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
        </button>
        
    </form>`;

        const  iconos= document.createElement('TH');
        iconos.classList.add('operaciones');
        iconos.appendChild(iconoEliminar);

        const adminTabla = document.createElement('TR');
        adminTabla.classList.add('admin-datos');
        adminTabla.dataset.idAdmin = id;

        adminTabla.appendChild(nombreAdmin);
        adminTabla.appendChild(paternoAdmin);
        adminTabla.appendChild(maternoAdmin);
        adminTabla.appendChild(correoAdmin);
        adminTabla.appendChild(iconos);;

        document.querySelector('#admins').appendChild(adminTabla);
    })
}

// ALUMNOS
async function consultarALUMNO(){
    try {
        const url = 'http://localhost:3000/api/alumnos';
        const resultado = await fetch(url);
        const alumnos = await resultado.json();
        mostrarAlumno(alumnos);
    } catch (error){
        console.log(error);
    }
}

function mostrarAlumno(alumnos){
    alumnos.forEach( alumno => {
        const {id, nombre, apellidoPaterno, apellidoMaterno, matricula, carrera } = alumno;
        
        const nombreAlumno = document.createElement('TH');
        nombreAlumno.textContent = nombre;

        const paternoAlumno = document.createElement('TH');
        paternoAlumno.classList.add('nombre');
        paternoAlumno.textContent = apellidoPaterno;

        const maternoAlumno = document.createElement('TH');
        maternoAlumno.classList.add('nombre');
        maternoAlumno.textContent = apellidoMaterno;

        const matriculaAlumno = document.createElement('TH');
        matriculaAlumno.classList.add('nombre');
        matriculaAlumno.textContent = matricula;

        const carreraAlumno = document.createElement('TH');
        carreraAlumno.classList.add('nombre');
        carreraAlumno.textContent = carrera;

        const iconoEditar= document.createElement('A');
        iconoEditar.setAttribute("href" , '/editar-alumno');
        iconoEditar.innerHTML = 
        `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#50b2c0" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
        </svg>`;

        const iconoEliminar= document.createElement('A');
        iconoEliminar.setAttribute("href" , '/eliminar-alumno');
        iconoEliminar.innerHTML = 
        `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-off" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M3 3l18 18" />
        <path d="M4 7h3m4 0h9" />
        <path d="M10 11l0 6" />
        <path d="M14 14l0 3" />
        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923" />
        <path d="M18.384 14.373l.616 -7.373" />
        <path d="M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>`;

        const iconos = document.createElement('TH');
        iconos.classList.add('operaciones');
        iconos.appendChild(iconoEditar);
        iconos.appendChild(iconoEliminar);

        const alumnosTabla = document.createElement('TR');
        alumnosTabla.classList.add('alumno-datos');
        alumnosTabla.dataset.idAlumno = id;

        alumnosTabla.appendChild(nombreAlumno);
        alumnosTabla.appendChild(paternoAlumno);
        alumnosTabla.appendChild(maternoAlumno);
        alumnosTabla.appendChild(matriculaAlumno);
        alumnosTabla.appendChild(carreraAlumno);
        alumnosTabla.appendChild(iconos);;

        document.querySelector('#alumnos').appendChild(alumnosTabla);
    })
}

// MAESTROS
async function consultarPROF(){
    try {
        const url = 'http://localhost:3000/api/profesor';
        const resultado = await fetch(url);
        const profesores = await resultado.json();
        mostrarProfe(profesores);
    } catch (error){
        console.log(error);
    }
}

function mostrarProfe(profesores){
    profesores.forEach( profe => {
        const {id, nombre, apellidoPaterno, apellidoMaterno, clave, telefono } = profe;
        
        const idProfe = id;

        const nombreProfe = document.createElement('TH');
        nombreProfe.textContent = nombre;

        const paternoProfe = document.createElement('TH');
        paternoProfe.classList.add('nombre');
        paternoProfe.textContent = apellidoPaterno;

        const maternoProfe = document.createElement('TH');
        maternoProfe.classList.add('nombre');
        maternoProfe.textContent = apellidoMaterno;

        const claveProfe = document.createElement('TH');
        claveProfe.classList.add('nombre');
        claveProfe.textContent = clave;

        const telProfe = document.createElement('TH');
        telProfe.classList.add('nombre');
        telProfe.textContent = telefono;

        const iconoEditar= document.createElement('A');
        iconoEditar.setAttribute("href" , `/editar-profe?id=${idProfe}`);
        iconoEditar.innerHTML = 
        `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#50b2c0" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
        </svg>`;

        const iconoEliminar= document.createElement('A');
        iconoEliminar.setAttribute("href" , '/eliminar-profe');
        iconoEliminar.innerHTML = 
        `<form action="/eliminar-profe" method="POST">
        <input type="hidden" name="id" value="${id}">
        <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-off" width="32" height="32" viewBox="0 0 24 24" stroke-width="3" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 3l18 18" />
            <path d="M4 7h3m4 0h9" />
            <path d="M10 11l0 6" />
            <path d="M14 14l0 3" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923" />
            <path d="M18.384 14.373l.616 -7.373" />
            <path d="M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
        </button>
        
    </form>`;

        const iconos = document.createElement('TH');
        iconos.classList.add('operaciones');
        iconos.appendChild(iconoEditar);
        iconos.appendChild(iconoEliminar);

        const profeTabla = document.createElement('TR');
        profeTabla.classList.add('alumno-datos');
        profeTabla.dataset.idAlumno = id;

        profeTabla.appendChild(nombreProfe);
        profeTabla.appendChild(paternoProfe);
        profeTabla.appendChild(maternoProfe);
        profeTabla.appendChild(claveProfe);
        profeTabla.appendChild(telProfe);
        profeTabla.appendChild(iconos);;

        document.querySelector('#profesores').appendChild(profeTabla);
    })
}



// HORA EN PANTALLA

const fechaHoraEl = document.getElementById("fecha-hora");

    const fechaPredefinida = new Date().toLocaleDateString("es-MX", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    });
    function obtenerFechaHora() {
            const fecha = new Date();
            const opciones = {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "numeric",
                minute: "numeric",
                second: "numeric",
            };
            return fecha.toLocaleDateString("es-MX", opciones);
    }

    fechaHoraEl.textContent = fechaPredefinida;

    setInterval(() => {
    fechaHoraEl.textContent = obtenerFechaHora();
    }, 1000);