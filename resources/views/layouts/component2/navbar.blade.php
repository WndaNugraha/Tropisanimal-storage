<nav class="navbar navbar-expand-lg fixed-top navbar-dark py-3">
  <div class="container-fluid nav-overlay" data-aos="zoom-in">
    <a class="navbar-brand" href="#"><img src="{{asset('ASET/x1/logo.png')}}" alt="Topisanimal" class="d-inline-block  "></a>
    <button class="navbar-toggler menu-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto ">
    <span>&times;</span>
            <li class="nav-item ms-4"  data-aos="zoom-in">
                <a class="nav-link  {{ ($title === 'Home') ? 'active' : '' }}" href="/">HOME</a>
            </li>
            <li class="nav-item ms-4"  data-aos="zoom-in" data-aos-delay="100">
                <a class="nav-link  {{ ($title === 'Tentang Kami') ? 'active' : '' }}" href="/tentangkami">TENTANG</a>
            </li>
            <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="200">
                <a class="nav-link  {{ ($title === 'Berita') ? 'active' : '' }}" href="/berita">BERITA</a>
            </li>
            <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="300">
                <a class="nav-link  {{ ($title === 'Galeri') ? 'active' : '' }}" href="/galeri">GALERI</a>
            </li>
            <li class="nav-item ms-4" data-aos="zoom-in" data-aos-delay="300">
                <a class="nav-link  {{ ($title === 'Kontak') ? 'active' : '' }}" href="/kontak">KONTAK</a>
            </li>
                
        </ul>
    </div>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var nav = document.querySelector('nav');

    window.addEventListener('scroll',function(){
        if (window.pageYOffset > 10) {
            nav.classList.add('bg-a', 'shadow');
        } else{
            nav.classList.remove('bg-a','shadow');
        }
    });
    document.querySelector('.navbar button').onclick = () => {
        document.querySelector('.navbar-nav').classList.add("active");
    }
    document.querySelector('.navbar-nav span').onclick = () => {
        document.querySelector('.navbar-nav').classList.remove("active");
    }


</script>
