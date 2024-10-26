<script src="https://cdn.tailwindcss.com"></script>

<!-- Page level plugins toster code -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css">
<!-- Page level custom scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function getDefaults() {
        return {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    }

    function getOptions() {
        return $.extend({}, getDefaults(), toastr.options);
    }

    $(document).ready(function() {
        toastr.options = getOptions();

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menu-button');
        const closeButton = document.getElementById('close-button');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        if (menuButton) {
            menuButton.addEventListener('click', function() {
                console.log('Menu button clicked');
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('xl:-translate-x-full');
                mainContent.classList.toggle('shifted');
            });
        } else {
            console.error('Menu button not found');
        }

        if (closeButton) {
            closeButton.addEventListener('click', function() {
                console.log('Close button clicked');
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('xl:-translate-x-full');
                mainContent.classList.toggle('shifted');
            });
        } else {
            console.error('Close button not found');
        }

        const currentLocation = window.location.href;
        const sidebarLinks = document.querySelectorAll('#sidebar a');

        sidebarLinks.forEach(link => {
            if (link.href === currentLocation) {
                link.classList.add('bg-[#FFE4CD]', '');
                link.closest('div').classList.remove('hidden');
            }
        });
    });
</script>

<script>
    function toggleMenu() {
        var menu = document.getElementById('menu');

        menu.classList.toggle('hidden');

    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            const arrow = item.querySelector('.faq-arrow');

            question.addEventListener('click', () => {
                answer.classList.toggle('hidden');
                arrow.classList.toggle('rotate-90');
            });
        });
    });
</script>
<script>
    function toggleMenu() {
        var menu = document.getElementById('menu');

        menu.classList.toggle('hidden');

    }
</script>
