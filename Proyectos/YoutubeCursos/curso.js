class Curso {
  constructor(id,title,descripcion,iframe,img,etiquetas){
    this.id=id;
    this.title=title;
    this.descripcion=descripcion;
    this.iframe=iframe;
    this.img=img;
    this.etiquetas=etiquetas;
  }
}

// Objeto de objetos de clase Curso
var cursos = new Object();


//crea y retorna un objeto tipo Curso
function curso_crear(id,title,descripcion,iframe,img,etiquetas){
	return new Curso(id,title,descripcion,iframe,img,etiquetas);
}

cursos[2] = curso_crear(
  2,
  " Fetch API",
  "AJAX está siendo reemplazado por Fetch API de Javascript en este 2018",
  "https://www.youtube.com/embed/videoseries?list=PLDHiWQQRGjSEo1PIrOjeeYeVHQxhw639m",
  "2.jpg",
  "javascript php html css"
);
cursos[3] = curso_crear(
  2,
  "PHP con mysql",
  "Hacer un CRUD de tareas con Bootstrap 4, así como sistema de usuarios y una API pública.",
  "https://www.youtube.com/embed/videoseries?list=PLDHiWQQRGjSHb853SVFGIuXvXwLYcBd2i",
  "3.webp",
  "php mysql html css"
);





function etiquetas(str){
  var divisiones = str.split(" ");
  var ret="";
  for (var i in divisiones) {
     ret +=`<li class="tic ${divisiones[i]}" >${divisiones[i]}</li>`;
  }
  return ret;
}
function pintar(){
  var contenidoCurso = document.getElementById("contenidoCurso");
  for (var index in cursos) {
    contenidoCurso.innerHTML +=`
    <div class="col-xs-12 col-sm-6 col-md-4 col-xl-3 mt-3 ">
      <div class="curso" onclick="window.open('${cursos[index].iframe}', '_blank');">
        <img class="img-fluid" src="img/${cursos[index].img}" alt="">
        <div class="curso-body">
          <ul>${etiquetas(cursos[index].etiquetas)}</ul>
          <h5 class="">${cursos[index].title}</h5>
          <p class="">${cursos[index].descripcion}</p>
        </div>
      </div>
    </div>
    `;
  }
}

pintar();
