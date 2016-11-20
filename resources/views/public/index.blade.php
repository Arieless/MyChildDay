@extends('layouts.home')
@section('title','MyChildDay')
@section('content')

    <div class ="indexContainerMain toHide"> <!-- This was added for easy background change -->
      <section class="sectionMain" >
        <div class="textOverVideo">
        <h1>Creamos una manera dinamica e innovadora donde padres y maestros pueden compartir y comunicarse...</h1>
        <h3>Nuestra intencion es llegar a todos los preescolares y guarderias para que ningun padre se pierda un momento de su hijo. Pediselo a tu preescolar y probalo!</h3>
        </div>
        <div class="overVideo">
        </div>
        <video loop muted autoplay poster="/images/imagen2.jpg"
         <source src="/video/mychilddaywide.mp4" type="video/mp4">
        />
      </section>
      <section class="sectionVideo">
        <section class="videoWrapper">
            <!-- <iframe src="https://www.youtube.com/embed/5iKitGJeAZ4" allowfullscreen></iframe> -->
        </section>
        <section class="description">
              <h1>Enterate del día a día de tu hijo...<br><br>
                 y sus pequeños logros...</h1>
        </section>
      </section>

      <section class="sectionParallax">
          <div class="parallaxContain">
              <h2>Una solucion multiplataforma <br>
                 donde padres y familiares pueden relacionarse<br>
                  con maestros y enterarse de las actividades de sus hijos</h2>
          </div>
      </section>
      <div class="containerSectionInfo"> <!-- This was added for easy background change -->
        <section class="sectionInfo">
                <article class="infoArticle">
                  <div class="infoArticleImg">
                    <img src="/images/icons/website-lock.svg" class="icons">
                  </div>
                    <div class="infoArticleText">
                      <div class="textContainer">
                        <h3>Facil de usar</h3>
                        <p>Creamos una manera dinamica e innovadora donde padres y maestros pueden compartir y comunicarse</p>
                      </div>
                    </div>
                </article>
                <article class="infoArticle">
                  <div class="infoArticleImg">
                    <img src="images/icons/wallet.svg" class="icons">
                  </div>
                    <div class="infoArticleText">
                      <div class="textContainer">
                        <h3>Multiplataforma</h3>
                        <p>Interfaz diseñada para celulares, tablets y desktops</p>
                      </div>
                    </div>
                </article>
                <article class="infoArticle">
                  <div class="infoArticleImg">
                    <img src="images/icons/speech-bubble.svg" class="icons">
                  </div>
                  <div class="infoArticleText">
                    <div class="textContainer">
                      <h3>Enterate de las actividades de tu hijo</h3>
                      <p>Informate sobre las actividades diarias de tu hijo</p>
                    </div>
                  </div>
                </article>
                <article class="infoArticle">
                  <div class="infoArticleImg">
                    <img src="images/icons/calculator.svg" class="icons">
                  </div>
                  <div class="infoArticleText">
                    <div class="textContainer">
                      <h3>Comunicate con la escuela</h3>
                      <p>Enterate de las actividades que realiza la escuela</p>
                    </div>
                  </div>
                </article>
                <article class="infoArticle">
                    <div class="infoArticleImg">
                      <img src="images/icons/hand-shopping-bag.svg" class="icons">
                    </div>
                    <div class="infoArticleText">
                      <div class="textContainer">
                        <h3>Recibe fotos</h3>
                        <p>Enterate de las actividades diarias mediante fotos que sacan los maestros</p>
                      </div>
                    </div>
                </article>
                <article class="infoArticle">
                    <div class="infoArticleImg">
                    <img src="images/icons/seo-tag.svg" class="icons">
                    </div>
                    <div class="infoArticleText">
                      <div class="textContainer">
                        <h3>No sé que poner</h3>
                        <p>Mi imaginacion colapso y ya no se que puedo escribir aca</p>
                      </div>
                    </div>
                </article>
        </section>
      </div>
    </div>
@endsection
