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
  width:80px;
  height:60px;
  background: #fff;
  text-align:center;
  padding-left: 10px;
  margin: 20px;
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
  background: green;
}
ul li:hover:nth-child(1) a:before{
    background: green;
  
}
ul li:hover:nth-child(1) a:after{
    background: green;
  
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
  background: purple
}
ul li:hover:nth-child(4) a:before{
    background: purple
}
ul li:hover:nth-child(4) a:after{
    background: purple
}

ul li:hover:nth-child(5) a{
    background: maroon;
    }
    ul li:hover:nth-child(5) a:before{
        background: maroon;
        }
        ul li:hover:nth-child(5) a:after{
            background: maroon;
            }
            ul li:hover:nth-child(6) a{
                background: orange
                }
                ul li:hover:nth-child(6) a:before{
                    background: orange;
                    }
                    ul li:hover:nth-child(6) a:after{
                        background: orange;
                        }
                        ul li:hover:nth-child(7) a{
                            background: magenta;
                            }
                            ul li:hover:nth-child(7) a:before{
                                background: magenta;
                                }
                                ul li:hover:nth-child(7) a:after{
                                    background: magenta;
                                    }
                                    ul li:hover:nth-child(8) a{
                                        background: green;
                                        }
.cherch form {
            position: relative;
            top: 50%;
            left: 4rem;
            transform: translate(-50%, -50%);
            transition: all 1s;
            width: 50px;
            height: 50px;
            background: white;
            box-sizing: border-box;
            border-radius: 25px;
            border: 4px solid white;
            padding: 5px;
            box-shadow: 0px 0px 15px red;
        }
        
.cherch input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 42.5px;
            line-height: 30px;
            outline: 0;
            border: 0;
            display: none;
            font-size: 1em;
            border-radius: 20px;
            padding: 0 20px;
        }
        
.fa {
            box-sizing: border-box;
            padding: 10px;
            width: 42.5px;
            height: 42.5px;
            position: absolute;
            top: 0;
            right: 0;
            border-radius: 50%;
            color: red;
            text-align: center;
            font-size: 1.2em;
            transition: all 1s;
        }
        
.cherch form:hover {
            width: 200px;
            cursor: pointer;
        }
        
.cherch form:hover input {
            display: block;
        }
        
.cherch form:hover .fa {
            background: red;
            color: white;
        }
</style>
                 


<nav style="padding: 1rem;" class="navbar navbar-expand-lg">
   
    <!-- <img style="border-radius: 50%;" src="http://localhost:8000/diop.jpeg" alt="logo" width="130px" height="70px"> -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <div class="cherch">
    <form action="">
        <input type="search" required>
        <i class="fa fa-search"></i>
    </form>
    </div>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 15rem; color: black" href="/accueil" role="button">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 4rem; color: black" href="/annee">Années Scolaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 4rem; color: black" href="/niveau">Niveaux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 4rem; color: black" href="/annee"><?php echo $data['annee']['annee_scolaire']; ?></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/classe">Classes</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 4rem; color: black" href="/listeEleves">Élèves</a>
            </li>
           <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 4rem; color: black" href="/discipline/gestion">Discipline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1rem; margin-left: 4rem; color: black" href="/log">Quitter</a>
            </li>
        </ul>
    </div>
     <script>
        document.getElementById("searchForm").addEventListener("submit", function (event) {
            event.preventDefault();
            var searchTerm = this.querySelector("input").value.toLowerCase();

            switch (searchTerm) {
                case "accueil":
                    window.location.href = "/accueil";
                    break;
                case "niveaux":
                    window.location.href = "/niveau";
                    break;
                case "annee_scolaire":
                    window.location.href = "/annee";
                    break;
                case "eleves":
                    window.location.href = "/listeEleves";
                    break;
                case "discipline":
                    window.location.href = "/discipline/gestion";
                    break;
                case "quitter":
                    window.location.href = "/log";
                    break;
                default:
                    // Rediriger vers une page par défaut pour une recherche invalide
                    window.location.href = "https://www.example.com/search?q=" + encodeURIComponent(searchTerm);
                    break;
            }
        });
    </script>
</nav>
