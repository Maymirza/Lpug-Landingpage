<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?=FCPATH?>/imagelanding/gunadarma.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />


  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.tailwindcss.com"></script>

<title>LPUG</title>
</head>
<body>
    <header class="sticky z-20 top-0 my-5 px-8 md:px-16 lg:px-20 text-gray-600 body-font bg-white">

          <nav class="flex flex-wrap justify-between font-bold">
            <div
              smooth
              href="#top"
              class="flex title-font font-medium items-center text-gray-900 my-4 mb-0 lg:my-0 lg:mb-4 md:mb-0"
            >
              <img
                class="h-auto w-36 md:w-44 lg:w-52"
                src="<?= '/imagelanding/LPUG_FIX.png'; ?>"
                alt="lpug-logo"
              />
            </div>
  
            <div class="ml-auto">
  
            <button
            class="inline-flex p-3 hover:bg-[#700D8B] rounded lg:hidden text-black hover:text-white outline-none"
            onClick="handleClick()"
          >
            <svg
              class="w-4 h-4"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
          </div>
  
          <div
          class="w-full lg:inline-flex lg:flex-grow lg:w-auto hidden"
         id="popup">
  
            <div class="lg:inline-flex lg:flex-wrap lg:flex-row flex flex-col items-center w-full h-auto lg:h-24 my-8 space-y-4 lg:my-0 space-x-0 lg:space-x-10 lg:space-y-0">
              <div class="sm:ml-auto  md:ml-auto flex flex-col lg:flex-row items-center text-base justify-center space-y-4 space-x-0 lg:space-x-10 lg:space-y-0 ">
                <a
                  smooth
                  href="#beranda"
                  class="hover:text-gray-900 text-sm lg:text-base"
                >
                  Beranda
                </a>
                <a smooth href="#alur" class="hover:text-gray-900 text-sm lg:text-base">
                  Alur Pendaftaran
                </a>
                <a
                  smooth
                  href="#kursus"
                  class="hover:text-gray-900 text-sm lg:text-base"
                >
                  Materi Kursus
                </a>
                <a
                  smooth
                  href="#tentang"
                  class="hover:text-gray-900 text-sm lg:text-base"
                >
                  Tentang
                </a>
                <a
                  smooth
                  href="#pengumuman"
                  class="hover:text-gray-900 text-sm lg:text-base"
                >
                  Pengumuman
                </a>
                <a
                  smooth
                  href="#kontak"
                  class="hover:text-gray-900 text-sm lg:text-base"
                >
                  Kontak
                </a>
                
                 <a href="https://ecourse-lpug.gunadarma.ac.id/login/index.php"> <button class="inline-flex items-center justify-center bg-[#700D8B] border-0 rounded-xl w-24 h-8 lg:w-40 lg:h-11 focus:outline-none hover:bg-gray-200 text-white text-sm lg:text-base hover:text-black">
                    Login
                  </button></a>
               
              </div>
            </div>
  
          </div>
          </nav>
      
      </header>




      <section class="text-gray-600 body-font overflow-hidden mx-10 my-16 lg:mx-24" id="beranda">
        <div class="container flex flex-col-reverse lg:flex-row">
          <div class="flex flex-col justify-end mb-0 lg:mb-16 w-full lg:w-1/2">
            <div class="items-center justify-center text-3xl lg:text-5xl mb-4 lg:mb-10">
              <h1 class="text-black font-semibold">Lembaga Pengembangan</h1>
              <h2 class="text-[#700D8B] font-semibold">
                Universitas Gunadarma
              </h2>
            </div>
            <p class="text-sm lg:text-xl tracking-wider w-full lg:w-2/3 mb-6 lg:mb-14">
              Lembaga Pengembangan Universitas Gunadarma merupakan unit struktural
              yang berada di tingkat universitas.
            </p>
  
            <button class="inline-flex items-center justify-center bg-[#700D8B] border-0 rounded-lg w-40 h-11 focus:outline-none hover:bg-gray-200 text-white">
              Lebih Lanjut
              <i class="ml-3 h-4 w-4 fa fa-arrow-right" ></i>
            </button>
          </div>
          <div class="w-full lg:w-1/2 h-auto">
            <img
              class="items-center justify-center h-full w-auto"
              src=" /imagelanding/slider.png"
              alt="slider"
            />
          </div>
        </div>
      </section>


      <section class="text-gray-600 body-font overflow-hidden" id="alur">
        <div class="flex flex-col">
          <div class="flex flex-col mt-24 mb-8 mx-10 lg:mx-24">
            <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-4">Alur Pendaftaran</h1>
            <span class="bg-[#FDC89E] rounded-none h-1 lg:h-2 w-28 ml-6 lg:ml-14"></span>
          </div>
          <div class="flex flex-row">
            <div class="flex flex-col mt-16 lg:mt-52">
              <img src=" /imagelanding/vector5.svg" class="left-0 w-12 lg:w-36 h-auto" alt="shapebulat" />
            </div>
            <div class="w-full">
              <img src=" /imagelanding/tatacara.png" class="w-full max-w-sm lg:max-w-6xl" alt="alurdaftar"/>
            </div>
          </div>
          <div class="flex justify-end">
            <img src=" /imagelanding/vector1.png" class="right-0 w-12 lg:w-36 h-auto" alt="bunga1"/>
          </div>
        </div>
      </section>

      <section class="text-gray-600 body-font overflow-hidden" id="kursus">
        <div>
        <div class="flex flex-row justify-between">
          <div class="flex flex-col mt-14 lg:mt-24 mb-4 lg:mb-8 mx-10 lg:mx-24">
            <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-4">Kursus</h1>
            <span class="bg-[#FDC89E] rounded-none h-1 lg:h-2 w-7 lg:w-14 ml-4 lg:ml-6"></span>
          </div>
          <div class="flex flex-col">
            <img src=" /imagelanding/vector2.png" class="right-0 w-12 lg:w-36 h-auto" alt="vector flower"/>
          </div>
        </div>
          <div class="flex flex-wrap mb-10 mx-8 lg:mx-24">
          
                <div class="w-1/3 cursor-pointer hover:scale-105 transform transition duration-300 ease-out p-2">
                  <div class="bg-white rounded-xl shadow-lg p-2 lg:p-12">
                    <div class="flex flex-col items-center justify-center">
                      <img
                        class="object-contain object-center h-20 lg:h-36 w-full mb-2 lg:mb-6"
                        src=" /imagelanding/oracle.png"
                        alt="content"
                      />
                     <i class="fa fa-chevron-down"></i>
                    </div>
                  </div>
                </div>
                <div class="w-1/3 cursor-pointer hover:scale-105 transform transition duration-300 ease-out p-2">
                  <div class="bg-white rounded-xl shadow-lg p-2 lg:p-12">
                    <div class="flex flex-col items-center justify-center">
                      <img
                        class="object-contain object-center h-20 lg:h-36 w-full mb-2 lg:mb-6"
                        src=" /imagelanding/cisco.png"
                        alt="content"
                      />
                     <i class="fa fa-chevron-down"></i>
                    </div>
                  </div>
                </div>
                <div class="w-1/3 cursor-pointer hover:scale-105 transform transition duration-300 ease-out p-2">
                  <div class="bg-white rounded-xl shadow-lg p-2 lg:p-12">
                    <div class="flex flex-col items-center justify-center">
                      <img
                        class="object-contain object-center h-20 lg:h-36 w-full mb-2 lg:mb-6"
                        src=" /imagelanding/sap.png"
                        alt="content"
                      />
                     <i class="fa fa-chevron-down"></i>
                    </div>
                  </div>
                </div>
            
          </div>
          <div class="flex flex-col">
            <img src=" /imagelanding/vector3.png" class="left-0 w-11 lg:w-28 h-auto" alt="vector flower" />
          </div>
          </div>
      </section>



      <section class="text-gray-600 body-font overflow-hidden" id="tentang">
        <div>
          <div class="flex flex-row">
            <div class="flex flex-col">
              <img
                src=" /imagelanding/vector4.png"
                class="left-0 w-11 lg:w-28 h-auto"
                alt="vector flower"
              />
            </div>
            <div class="flex flex-col mt-14 lg:mt-24 mb-8 mx-0 lg:mx-8">
              <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-4">
                Tentang
              </h1>
              <span class="bg-[#FDC89E] rounded-none h-1 lg:h-2 w-7 lg:w-14 ml-6"></span>
            </div>
          </div>
          <div class="flex flex-wrap mb-0 lg:mb-10 mx-8 lg:mx-24 justify-between">
            <div class="w-full lg:w-1/2 flex justify-center items-center lg:-mx-14">
              <img
                class="object-cover object-left h-80 w-auto lg:h-auto lg:w-full mb-6"
                src=" /imagelanding/tentang.png"
                alt="content"
              />
            </div>
            <div class="w-full lg:w-1/2">
              <div class="slider">
                <div class="bg-white rounded-xl border-gray-100 border-2 p-4 lg:p-12 h-full shadow-lg ">
                  <p class="text-sm lg:text-xl tracking-wider text-left leading-loose">
                    Lembaga Pengembangan Universitas Gunadarma merupakan unit
                    struktural yang berada di tingkat universitas. Tugas dan
                    tanggung jawabnya adalah melakukan koordinasi pelaksanaan
                    kegiatan pendidikan dan pelatihan berbasis TIK yang
                    diperuntukkan untuk mahasiswa di luar kegiatan perkuliahan
                    di kelas, atau untuk masyarakat umum dengan berkoordinasi
                    dengan unit terkait.
                  </p>
                </div>
                <div class="bg-white rounded-xl border-gray-100 border-2 p-4 lg:p-12 h-full ">
                  <p class="text-sm lg:text-xl tracking-wider text-left leading-loose ">
                    Lembaga Pengembangan ini membawahi lembaga pengembangan di
                    tingkat fakultas, yaitu Lembaga Pengembangan Komputerisasi
                    (LePKom) , Lembaga Pengembangan Teknologi (LePTek), Lembaga
                    Pengembangan Manajemen dan AKuntansi (LePMA), Lembaga
                    Pengembangan Sastra dan Bahasa (LePSaB), Lembaga
                    Pengembangan Teknik Sipil dan Perencanaan (LePTSP), Lembaga
                    Pengembangan Psikologi (LePPsi). Selain kegiatan pelatihan
                    bersertifikasi nasional, lembaga pengembangan juga
                    melaksanakan kegiatan pelatihan bersertifikat Regional dan
                    Internasional. Pelatihan bersertifikat Regional yang
                    diselenggarakan adalah pelatihan Value Plus, sedangkan
                    pelatihan bersertifikat Internasional adalah Oracle, Cisco,
                    Java dan SAP.
                  </p>
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>


      <section class="text-gray-600 body-font overflow-hidden" id="pengumuman">
        <div class="my-8 mx-10 lg:mx-24">
          <div class="flex flex-col my-16">
            <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-4">Pengumuman</h1>
            <span class="bg-[#FDC89E] rounded-none h-1 lg:h-2 w-14 ml-8 lg:ml-4"></span>
          </div>
          <div>
            
          </div>
        </div>
      </section>

      <footer class="bg-[#42194E]" id="kontak">
        <div class="mx-6 lg:mx-12 pt-16 pb-4 max-w-xl md:max-w-full lg:max-w-5xl xl:max-w-screen-2xl md:px-8 lg:px-8">
          <div class="grid lg:grid-cols-3 gap-0 space-x-4 lg:space-x-20">
            <div class="col-span-1 flex justify-left items-center">
              <img
                src=" /imagelanding/logofooter.png"
                class="w-full max-w-lg h-auto "
                alt="logo"
              />
            </div>
  
            <div class="flex flex-col ml-10 lg:mx-auto w-72">
              <div>
                <div class="flex flex-col mb-2 lg:mb-4">
                  <h2 class="title-font font-bold text-white text-md lg:text-xl">
                    Alamat
                  </h2>
                  <span class="bg-[#FDC89E] rounded-none h-1 w-14 lg:w-16 mt-1"></span>
                </div>
                <p class="text-md lg:text-xl text-white tracking-wider font-extralight">
                  Jl. Margonda Raya No.100, Pondok Cina, Beji, Kota Depok, Jawa
                  Barat 16424
                </p>
              </div>
  
              <div class="flex flex-col mb-2 lg:mb-4 my-8">
                <h2 class="title-font font-bold text-white text-md lg:text-xl">
                  UG Direktori
                </h2>
                <span class="bg-[#FDC89E] rounded-none h-1 w-24 lg:w-28 mt-1"></span>
              </div>
              <nav class="flex flex-col space-y-1 lg:space-y-4 list-none text-md lg:text-xl text-white tracking-wider font-extralight">
                <a
                  href="https://baak.gunadarma.ac.id/"
                  target="_blank"
                  rel="noreferrer"
                >
                  BAAK
                </a>
                <a
                  href="https://studentsite.gunadarma.ac.id/"
                  target="_blank"
                  rel="noreferrer"
                >
                  STUDENTSITE
                </a>
                <a
                  href="https://library.gunadarma.ac.id/"
                  target="_blank"
                  rel="noreferrer"
                >
                  LIBRARY
                </a>
                <a
                  href="https://v-class.gunadarma.ac.id/"
                  target="_blank"
                  rel="noreferrer"
                >
                  V-CLASS
                </a>
              </nav>
            </div>
  
            <div class="lg:max-w-xl col-span-1 mt-8 lg:mt-0">
              <div class="flex flex-col mb-2 lg:mb-4">
                <h2 class="title-font font-bold text-white text-md lg:text-xl">
                  Kontak
                </h2>
                <span class="bg-[#FDC89E] rounded-none h-1 w-14 lg:w-16 mt-1"></span>
              </div>
              <nav class="list-none text-md lg:text-xl text-white tracking-wider font-extralight">
                <p>Phone : 062 - 21 - 78881070</p>
                <p class="mt-4">Fax : 062 - 21 - 78881071</p>
                <p class="mt-4">E-mail : lpug@gunadarma.ac.id</p>
              </nav>
            </div>
          </div>
          <div class="py-6">
            <div class="flex flex-col">
              <span class="bg-white rounded-none h-0.5 w-full"></span>
              <div class="flex flex-row text-white justify-between mt-4">
                <p class="text-sm lg:text-xl"><i class="fa fa-copyright"></i> 2022 LPUG</p>
                <div class="flex space-x-3 justify-center items-center">
                  <img src=" /imagelanding/linkedin.svg" alt="linkedin" />
                  <a
                    href="https://www.linkedin.com/company/lembaga-pengembangan-universitas-gunadarma/"
                    target="_blank"
                    rel="noreferrer"
                    class="text-sm lg:text-xl font-bold underline"
                  >
                    Linkedin
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
</body>

<script>
    function handleClick() {
        let e = document.getElementById("popup")
        if (e.classList[4] == 'hidden') {
          e.classList.remove('hidden');
        }else{
            e.classList.add("hidden")
        }
      }
</script>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
  <!-- Slick JS -->    
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            lazyLoad: true,
            fade: true
        });
      });
</script>
</html>