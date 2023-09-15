<style>
body {
  margin:0;
  padding:0;
  background:#002b36;
  font-family: roboto, sans-serif;

}
nav{
  margin-top: 2rem;
}

ul {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%);
  display:flex;
  margin:0;
  padding:0;
}

ul li {
  list-style:none;
  margin:0 5px;
  font-size: 20px;
}

ul li a .fa {
  font-size: 40px;
  color: black;
  line-height:80px;
  transition: .5s;
  padding-right: 14px;
}

ul li a span {
  padding:0;
  margin:0;
  position:absolute;
  top: 30px;
  color: #262626;
  letter-spacing: 4px;
  transition: .5s;
}

ul li a {
  text-decoration: none;
  display:absolute;
  display:block;
  width:110px;
  height:80px;
  background: #fff;
  text-align:left;
  padding-left: 10px;
  transform: rotate(-30deg) skew(35deg) translate(0,0);
  transition:.5s;
  box-shadow: -20px 30px 20px rgba(0,0,0,.5);
 
}
ul li a:before {
  content: '';
  position: absolute;

  top:10px;
  left:-20px;
  height:80px;
  width:20px;
  background: #b1b1b1;
  transform: .5s;
  transform: rotate(0deg) skewY(-45deg);
 
}

ul li a:after {
  content: '';
  position: absolute;
  bottom:-20px;
  left:-10px;
  height:20px;
  width:100%;
  background: #b1b1b1;
  transform: .5s;
  transform: rotate(0deg) skewX(-45deg);
  
  
}

ul li a:hover {
  transform: rotate(-30deg) skew(0deg) translate(20px,-15px);
  box-shadow: -50px 50px 50px rgba(0,0,0,.5);
border-radius: 0 20px 0 0;
}


ul li:hover .fa {
  color:#fff;
}

ul li:hover span {
  color:#fff;
}

ul li:hover:nth-child(1) a{
  background: #3b5998;
}
ul li:hover:nth-child(1) a:before{
  background: #365492;
}
ul li:hover:nth-child(1) a:after{
  background: #4a69ad;
}
ul li:hover:nth-child(2) a{
  background: #e4405f;
}
ul li:hover:nth-child(2) a:before{
  background: #d81c3f;
}
ul li:hover:nth-child(2) a:after{
  background: #e46880;
}
ul li:hover:nth-child(3) a{
  background: #00aced;
}
ul li:hover:nth-child(3) a:before{
  background: #097aa5;
}
ul li:hover:nth-child(3) a:after{
  background: #53b9e0;
}

ul li:hover:nth-child(4) a{
  background: #dd4b39;
}
ul li:hover:nth-child(4) a:before{
  background: #b33a2b;
}
ul li:hover:nth-child(4) a:after{
  background: #e66a5a;
}

ul li:hover:nth-child(5) a{
    background: #0077b5;
    }
    ul li:hover:nth-child(5) a:before{
        background: #005a8f;
        }
        ul li:hover:nth-child(5) a:after{
            background: #0088cc;
            }
            ul li:hover:nth-child(6) a{
                background: #0077b5;
                }
                ul li:hover:nth-child(6) a:before{
                    background: #005a8f;
                    }
                    ul li:hover:nth-child(6) a:after{
                        background: #0088cc;
                        }
                        ul li:hover:nth-child(7) a{
                            background: #0077b5;
                            }
                            ul li:hover:nth-child(7) a:before{
                                background: #005a8f;
                                }
                                ul li:hover:nth-child(7) a:after{
                                    background: #0088cc;
                                    }
                                    ul li:hover:nth-child(8) a{
                                        background: #0077b5;
                                        }
</style>
                 


<nav class="navbar navbar-expand-lg">
   
    <img src="http://localhost:4000/images.png" alt="logo" width="120px" height="80px">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 10rem; color: black" href="/accueil" role="button">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 4rem; color: black" href="/annee">Années Scolaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 4rem; color: black" href="/niveau">Niveaux d'Etudes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 4rem; color: black" href="/annee"><?php echo $data['annee']['annee_scolaire']; ?></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/classe">Classes</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 4rem; color: black" href="/listeEleves">Élèves</a>
            </li>
           <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 4rem; color: black" href="/discipline/gestion">Gestion Discipline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-right: 4rem; color: black" href="/log">Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>

