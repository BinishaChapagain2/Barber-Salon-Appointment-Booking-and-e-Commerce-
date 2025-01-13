@if (Session::has('success'))
    <div class="fixed z-50 flex items-center p-2 space-x-3 text-white bg-green-600 rounded-lg shadow-lg bottom-5 right-5"
        id="message">
        <i class='text-2xl bx bx-check-circle'></i> <!-- Success Icon -->
        <p class="text-sm font-semibold">{{ session('success') }}</p>
        <button onclick="document.getElementById('message').style.display='none';" class="ml-4 text-white">
            <i class='text-2xl bx bx-x'></i> <!-- Close Icon -->
        </button>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
@endif
