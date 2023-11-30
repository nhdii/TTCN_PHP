<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
  <title>Trang Chủ</title>

  <style>
    /* Thêm CSS tùy chỉnh dưới đây */
    .image-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image-media-img {
      width: 100%; /* Rộng 100% của phần tử chứa */
      height: auto; /* Chiều cao tự động để giữ tỷ lệ khung hình */
    }

    .featured-products {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .featured-products .bg-white {
      width: 300px; /* Điều chỉnh kích thước sản phẩm theo ý muốn */
      margin: 10px; /* Khoảng cách giữa các sản phẩm */
    }
  </style>

</head>
<body>
@include('layouts.nav')

<div class="bg-gray-100 p-6 text-center">
  <h2 class="text-3xl font-bold text-gray-800">Move, Shop, Customize & Celebrate With Us.</h2>
  <p class="text-lg text-gray-600">No matter what you feel like doing today, It’s better as a Member.</p>
  {{-- <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full inline-block mt-4">Shop Now</a> --}}
</div>


<figure class="relative image-card">
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute inset-0 opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center">
      <div class="text-center text-white z-10">
        <p class="text-lg font-semibold">Order Deadline</p>
        <h2 class="text-6xl font-bold">MARK YOUR CALENDAR</h2>
        <p class="text-base">Order online by 6 Dec, 11:59PM to get your gifts in time.</p>
        <div class="mt-4">
          <a href="#" class="bg-white text-black px-6 py-2 rounded-full inline-block">Shop</a>
        </div>
      </div>
    </div>
  </div>
  <div class="media-container">
    <div class="image-wrapper">
      <img src="https://static.nike.com/a/images/f_auto/dpr_1.3,cs_srgb/w_1473,c_limit/94a6fc3f-22e0-4afe-b2c2-4b1921a87689/nike-just-do-it.jpg" alt="Nike. Just Do It" class="image-media-img">
    </div>
  </div>
</figure>



<div class="bg-white p-6">
  <div class="container mx-auto mt-8 p-4">
    <h2 class="text-3xl font-bold mb-4">Featured</h2>

    <div class="relative overflow-hidden">
      <ul id="carousel" class="flex transition-transform duration-300 ease-in-out">
        <!-- Product 1 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/featured-img/nike-air-force1-lv8.png" alt="Product 1" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Never Out of Style</figcaption>
              </a>
            </figure>
          </div>
        </li>

        <!-- Product 2 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/featured-img/nike-p6000-premium.png" alt="Product 2" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Retro Edit</figcaption>
              </a>
            </figure>
          </div>
        </li>

        <!-- Product 3 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/featured-img/nike-air-max-90.png" alt="Product 3" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Trending Kicks</figcaption>
              </a>
            </figure>
          </div>
        </li>

        <!-- Sản phẩm 4 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/featured-img/air-jordan-1-low.png" alt="Product 4" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Accessories</figcaption>
              </a>
            </figure>
          </div>
        </li>
      </ul>

      <!-- Navigation buttons -->
      <button class="absolute left-0 top-1/2 transform -translate-y-1/2 px-5 py-3 bg-gray-400 text-white rounded-full focus:outline-none" onclick="prevSlide()">&#8249;</button>
      <button class="absolute right-0 top-1/2 transform -translate-y-1/2 px-5 py-3 bg-gray-400 text-white rounded-full focus:outline-none" onclick="nextSlide()">&#8250;</button>
    </div>
  </div>
</div>

<!-- Thêm sau khối Featured Products -->
<div class="bg-white p-6">
  <div class="container mx-auto mt-8 p-4">
    <h2 class="text-3xl font-bold mb-4">Popular Right Now</h2>

    <div class="relative overflow-hidden">
      <ul id="popularCarousel" class="flex transition-transform duration-300 ease-in-out">
        <!-- Popular Product 1 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/popular-img/product1.png" alt="Popular Product 1" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Popular Product 1</figcaption>
              </a>
            </figure>
          </div>
        </li>

        <!-- Popular Product 2 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/popular-img/product2.png" alt="Popular Product 2" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Popular Product 2</figcaption>
              </a>
            </figure>
          </div>
        </li>

        <!-- Popular Product 3 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/popular-img/product3.png" alt="Popular Product 3" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Popular Product 3</figcaption>
              </a>
            </figure>
          </div>
        </li>

        <!-- Popular Product 4 -->
        <li class="w-1/3 px-2">
          <div class="bg-white w-96 shadow p-4 rounded-lg border border-gray-200">
            <figure>
              <a href="#">
                <img src="/storage/images/popular-img/product4.png" alt="Popular Product 4" class="w-full h-96 object-cover mb-4">
                <figcaption class="text-center font-semibold text-gray-800">Popular Product 4</figcaption>
              </a>
            </figure>
          </div>
        </li>
      </ul>

      <!-- Navigation buttons -->
      <button class="absolute left-0 top-1/2 transform -translate-y-1/2 px-5 py-3 bg-gray-400 text-white rounded-full focus:outline-none" onclick="prevPopularSlide()">&#8249;</button>
      <button class="absolute right-0 top-1/2 transform -translate-y-1/2 px-5 py-3 bg-gray-400 text-white rounded-full focus:outline-none" onclick="nextPopularSlide()">&#8250;</button>
    </div>
  </div>
</div>

@include('layouts.footer')

<script>
  let currentSlide = 0;
  const totalSlides = document.querySelectorAll('#carousel li').length;

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlideVisibility();

    // Kiểm tra xem đã đến slide cuối cùng chưa
    if (currentSlide === 0) {
      // Nếu đã đến slide cuối cùng, quay lại slide đầu tiên
      setTimeout(() => {
        currentSlide = 0;
        updateSlideVisibility();
      }, 300); // Thời gian chờ để hoạt động transition
    }
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlideVisibility();
  }

  function updateSlideVisibility() {
    const carousel = document.getElementById('carousel');
    const slideWidth = document.querySelector('#carousel li').offsetWidth;
    carousel.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
  }
</script>

<script>
  let currentPopularSlide = 0;
  const totalPopularSlides = document.querySelectorAll('#popularCarousel li').length;

  function nextPopularSlide() {
    currentPopularSlide = (currentPopularSlide + 1) % totalPopularSlides;
    updatePopularSlideVisibility();

    // Kiểm tra xem đã đến slide cuối cùng chưa
    if (currentPopularSlide === 0) {
      // Nếu đã đến slide cuối cùng, quay lại slide đầu tiên
      setTimeout(() => {
        currentPopularSlide = 0;
        updatePopularSlideVisibility();
      }, 300); // Thời gian chờ để hoạt động transition
    }
  }

  function prevPopularSlide() {
    currentPopularSlide = (currentPopularSlide - 1 + totalPopularSlides) % totalPopularSlides;
    updatePopularSlideVisibility();
  }

  function updatePopularSlideVisibility() {
    const popularCarousel = document.getElementById('popularCarousel');
    const slideWidth = document.querySelector('#popularCarousel li').offsetWidth;
    popularCarousel.style.transform = `translateX(-${currentPopularSlide * slideWidth}px)`;
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>