<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .swiper-slide {
            position: relative;
            text-align: center;
            color: white;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
        }

        .swiper-slide .text-overlay {
            position: absolute;
            bottom: 18%;

            padding: 10px 20px;
            border-radius: 5px;
        }

        .login:hover {
            background-color: rgb(242 111 0);
        }
    </style>
</head>

<body class="">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="lg:flex justify-between px-[10px] ">
        <div class="flex justify-center lg:mx-auto pt-[40px] pb-[20px] lg:pb-[200px]">
            <div class="lg:w-[600px] w-full border border-[#00000033] rounded-[20px] p-5 shade">
                <div class="flex justify-center">
                    <img src="{{ asset('admin-assets/images/nanpa.svg') }}" style="width: 80%;"/>
                </div>
                <div class="mt-10">
                    <h1 class="font-bold text-[34px] leading-[42px] text-[#000000] text-center">Login</h1>
                    <p class="font-medium text-[16px] leading-[22px] text-center pt-5">To continue, please enter your
                        email address and password</p>
                </div>

                <form class="mt-5" action="{{ route('login') }}" method="POST" autocomplete="off">
                    @csrf
                    <div>
                        <label class="font-normal text-[15px] leading-[18px] text-[#000000]">Email Address</label>
                        <input type="email" name="email" placeholder="Enter Email Address" autocomplete="off"
                            class="w-full h-[60px] border border-[#B1B6C6] outline-none rounded-[16px] pl-[19px] mt-1"
                            required>
                    </div>

                    <div class="mt-4 relative">
                        <label class="font-normal text-[15px] leading-[18px] text-[#000000]">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off"
                            class="w-full h-[60px] border border-[#B1B6C6] outline-none rounded-[16px] pl-[19px] mt-1"
                            placeholder="Enter password" required>
                        <img id="togglePassword" src="{{ asset('admin-assets/images/EYE.svg') }}"
                            class="absolute right-[16px] bottom-[18px]" />
                    </div>

                    <!-- Captcha -->
                    <div class="mt-4">
                        <label class="font-normal text-[15px] leading-[18px] text-[#000000]">Captcha</label>
                        <div
                            class="flex items-center justify-between mt-2 bg-gray-100 border border-gray-300 rounded-lg p-3 shadow-sm">
                            <span id="captcha"
                                class="font-bold text-[24px] text-[#333]">{{ session('captcha') }}</span>
                            <button type="button" onclick="refreshCaptcha()"
                                class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded transition duration-200">Refresh</button>
                        </div>
                        <input type="text" name="captcha_input" placeholder="Enter Captcha" autocomplete="off"
                            class="w-full h-[60px] border border-[#B1B6C6] outline-none rounded-[16px] pl-[19px] mt-3 transition duration-200 focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required>
                    </div>

                    <div class="flex justify-center my-10">
                        <a href="{{ route('custom.password.forgot') }}"
                            class="font-semibold text-[15px] leading-[18px] text-[#000000] text-center">
                            Forgot Password?
                        </a>
                    </div>

                    <div class="flex justify-center">
                        <button
                            class="login w-[374px] h-[60px] bg-[#B1B6C6] text-center font-bold text-[20px] text-[#FFFFFF] leading-[20px] rounded-[100px]">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        function refreshCaptcha() {
            $.ajax({
                url: '{{ route('captcha.refresh') }}',
                type: 'GET',
                success: function(data) {

                    $('#captcha').text(data.captcha);
                },
                error: function() {
                    alert('Error refreshing CAPTCHA. Please try again.');
                }
            });
        }
    </script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            centeredSlides: true,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                if (type === 'password') {
                    togglePassword.setAttribute('src', '{{ asset('admin-assets/images/EYE.svg') }}');
                } else {
                    togglePassword.setAttribute('src', '{{ asset('admin-assets/images/EYE 1.svg') }}');
                }
            });
        });
    </script>
</body>

</html>
