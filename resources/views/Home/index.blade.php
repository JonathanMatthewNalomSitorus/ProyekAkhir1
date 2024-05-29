<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *,
*::before,
*::after {
  box-sizing: border-box;
  scroll-behavior: smooth;
}
 
body {
  font-family: 'Quicksand', sans-serif;
  margin: 0;
  display: flex;
  flex-direction: column;
}
 
header.navbar-container {
  position: fixed;
  gap: 10px;
  width: 100%;
  padding: 10px;
  margin-inline: auto;
  display: flex;
  justify-content: space-around;
  align-items: center;
  z-index: 9999;
  background: #2d3e50;
}
 
header.navbar-container .logo img {
  width: 60px;
}
 
header.navbar-container .nav-list ul {
  padding-left: 0;
  display: flex;
  justify-content: center;
  gap: 2rem 1rem;
}
 
header.navbar-container .nav-list li {
  list-style-type: none;
}
 
header.navbar-container .nav-list li a {
  padding: 0.5rem 1.5rem;
  border-radius: 999px;
  text-decoration: none;
  font-size: 1.05rem;
  font-weight: 500;
  color: white;
  transition: all 0.2s ease-in-out;
}

header.navbar-container .logout a{
  border-radius: 999px;
  padding: 0.5rem 1.5rem;
  color: white;
  transition: all 0.2s ease-in-out;
  text-decoration: none;
  list-style: none;
}

header.navbar-container .logout :hover a{
  background-color: white;
  color: #425c77;
}
 
header.navbar-container .nav-list li:hover a {
  background-color: white;
  color: #425c77;
  margin-right: 20px;
}

#utama {
    width: 100%;
    height: 100vh;
    max-width: 1200px;
    margin-inline: auto;
    padding: 2rem 4rem;
    display: flex;
    align-items: center;
    margin-top: 70px;
}

#utama .content{
    flex: 1;
    display: flex;
    align-items: center;
    margin-bottom: 50px;
}

#utama .content .content-description{
    flex: 1 1;
}

#utama .content .content-description .title{
    margin-block: 1rem;
    font-size: 3.5rem;
}

button{
    padding: 0.8rem 2.5rem;
    border: 3px solid transparent;
    border-radius: 999px;
    margin-block-start: 1rem;
    background-color: #2d3e50;
    font-family: 'Quicksand', sans-serif;
    text-transform: uppercase;
    font-size: 1rem;
    font-weight: 700;
    color: white;
    cursor: pointer;
    transition: all 0.15s ease-in;
}

button:hover {
    border: 3px solid #2d3e50;
    background-color: transparent;
    color: #2d3e50;
}

#utama .content .content-image {
    flex: 1;
    display: flex;
}

#utama .content .content-image img {
    width: 220px;
    min-width: 175px;
    margin: auto;
}

#utama aside {
    position: fixed;
    inset-block: 0;
    inset-inline-end: 0;
}

#utama aside .social-media {
    height: 100%;
    display: flex;
}

#utama aside .social-media ul {
    padding: 1.5rem 1rem;
    border-top-left-radius: 12px;
    border-bottom-left-radius: 12px;
    margin: auto;
    background-color: #2d3e50;
    display: flex;
    flex-flow: column nowrap;
    align-items: center;
    justify-content: center;
    gap: 1.5rem;
}

#utama aside .social-media li {
    list-style-type: none;
}

#utama aside .social-media li a{
    text-decoration: none;
    font-size: 1.5rem;
    color: white;
    transition: all 0.2s ease-in-out;
}

#utama aside .social-media li a:hover {
  color: #89b0d9;
}

@media screen and (max-width: 768px){
  header.navbar-container{
    flex-direction: column;
  }

  header.navbar-container .nav-list ul{
    flex-wrap: wrap;
    column-gap: 0.5rem;
  }

  #utama{
    padding: 1rem 3rem;
  }

  #utama .content{
    flex-direction: column;
    gap: 2rem;
  }

  #utama .content .content-description .title {
    font-size: 3rem;
  }
  
  #utama .content .content-description p {
    font-size: 1rem;
  }

  #utama .content .content-image{
    order: -1;
  }
}

#visi-misi{
  background-color: #fff;
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

#edit{
    background-color: #fff;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
}

#list{
  width: 600px;
}

#misi img{
  width: 600px;
}

    </style>
</head>

<body>
    <header class="navbar-container">
        <div class="logo">
            <img src="{{asset('storage/images/sekolah/th.jpeg')}}" alt="">
        </div>

        <nav class="nav-list">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="/sekolah">Tentang</a></li>
                <li><a href="/informasi">Informasi</a></li>
                <li><a href="#">galeri</a></li>
            </ul>
        </nav>

        <div class="logout">
            <a href="/logout">Logout</a>
        </div>
    </header>
    <main id="utama">
        <div class="content">
            <div class="content-description">
                <h1 class="title">SMP Negeri 4 Laguboti</h1>
                <p>
                    Selamat datang di halaman resmi SMP Negeri 4 Laguboti,
                    tempat dimana kami berkomitmen untuk menyediakan pendidikan
                    berkualitas dan lingkungan belajar yang mendukung perkembangan 
                    potensi siswa.Dengan semangat kebersamaan dan inovasi,kami berupaya 
                    menciptakan generasi penerus yang unggul dan berdaya saing.
                    Mari bergabung dengan kami dalam menjelajah ragam informasi 
                    dan kegiatan yang memperkaya pengalaman belajar di 
                    SMP Negeri 4 Laguboti.
                </p>
                <a href="#visi-misi"><button>Lebih Lanjut</button></a>
            </div>
            <div class="content-image">
                <img src="{{asset('storage/images/sekolah/th.jpeg')}}" alt="">
            </div>
        </div>

        <aside>
            <div class="social-media">
                <ul>
                    <li><a href="#"><i class="fab fa-youtube">

                    </i></a></li>

                    <li><a href="#"><i class="fab fa-linkedin-in">

                    </i></a></li>

                    <li><a href="#"><i class="fab fa-twitter">

                    </i></a></li>

                    <li><a href="#"><i class="fab fa-facebook">

                    </i></a></li>
                </ul>
            </div>
        </aside>
    </main>

    <section id="visi-misi">
        <div class="visi">
          <h1>VISI</h1>
          <p id="list">TERWUJUDNYA PESERTA DIDIK YANG RELIGIUS,BERKARAKTER,BERDAYA SAING,BERBUDAYA DAN BERWAWASAN LINGKUNGAN</p>
          <h1>MISI</h1>
          <ol id="list">
            <li>Melaksanakan kegiatan keagamaan yang diprogramkan secara terencana,teratur,dan berkesinambungan.</li>
            <li>Terbentuknya pribadi yang berdisiplin.</li>
            <li>Melaksanakan kegiatan pembelajaran dan bimbingan secara efektif.</li>
            <li>Meningkatkan kualitas profesionalisme guru.</li>
            <li>Mendorong dan membantu siswa untuk mengenal potensi dirinya sehingga daoat dikembangkan secara optimal.</li>
            <li>Mewujudkan lingkungan sekolah yang aman,bersih,dan nyaman secara rutin dan terencana.</li>
          </ol>

          <a href="#edit"><button>Lebih Lanjut</button></a>
        </div>

        <div id="misi">
          <img src="{{asset('storage/images/register/register.jpg')}}" alt="">
        </div>
    </section>

    <section id="edit">
      <div class="" id="back-end">
      <h1>Event</h1>
      @foreach($informasiData as $informasi)
      <div>
      <h3>{{ $informasi->judul }}</h3>
      <p>{{ $informasi->isi }}</p>
      <img src="{{ asset('storage/'. $informasi->foto) }}" alt="{{ $informasi->judul }}"> 
      </div>
      @endforeach
      <br><br>
      <h1><a href="/informasi"><button>edit informasi</button></a></h1>
      <h1>gallery</h1>
      @foreach($galleryData as $gallery)
      <div>
        <h3>{{ $gallery->judul }}</h3>
        <p>{{ $gallery->deskripsi }}</p>
        <img src="{{ asset('storage/'. $gallery->foto) }}" alt="{{ $gallery->judul }}"> 
      </div>
      @endforeach
      <br><br>
      <h1><a href="/gallery"><button>edit gallery</button></a></h1>
    </div>
    </section>

    <footer class="text-center p-4 text-white">
        @smpn4Laguboti
    </footer>
    

    <script>
      alert('Selamat Datang di Website SMPN 4 Laguboti');
    </script>
</body>
</html>