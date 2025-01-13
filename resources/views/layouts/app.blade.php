<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/gentalmanlogo.png') }}" type="image/x-icon">

    {{-- tailwind cdn --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    {{-- build tailwind cdn npm  --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Google Fonts - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }



        nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 70px;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
        }

        nav .logo {
            display: flex;
            align-items: center;
        }

        .logo .menu-icon {

            font-size: 24px;
            margin-right: 14px;
            cursor: pointer;
        }



        nav .sidebar {
            position: fixed;
            top: 0;
            left: -100%;
            height: 100%;
            width: 260px;
            padding: 10px 0;
            box-shadow: 0 5px 1px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        nav.open .sidebar {
            left: 0;
        }

        .sidebar .sidebar-content {
            display: flex;
            height: 100%;
            flex-direction: column;
            justify-content: space-around;
            padding: 0px 16px;
        }

        .sidebar-content .list {
            list-style: none;
        }

        .lists .nav-link:hover {
            background-color: #4070f4;
        }

        .list .nav-link {
            display: flex;
            align-items: center;
            margin: 2px 0;
            padding: 10px 12px;
            border-radius: 8px;
            text-decoration: none;
        }

        .nav-link .link {
            font-size: 14px;
            font-weight: 400;
        }



        .nav-link .icon {
            margin-right: 14px;
            font-size: 20px;

        }


        .overlay {
            position: fixed;
            top: 0;
            left: -100%;
            height: 1000vh;
            width: 200%;
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s ease;
            background: rgba(0, 0, 0, 0.3);
        }

        nav.open~.overlay {
            opacity: 1;
            left: 260px;
            pointer-events: auto;
        }


        @media screen and (max-width: 768px) {
            nav .sidebar {
                width: 300px;
                /* Set a reasonable width to fit both */
                overflow-y: auto;
                /* Allow scrolling if content overflows */
            }

            .sidebar-content .lists .list {
                padding: 5px 10px;
                /* Adjust padding for better spacing */
                display: flex;
                /* Use flexbox for horizontal alignment */
                align-items: left;
                /* Center align icon and text */
            }

            .nav-link .icon {
                font-size: 20px;
                /* Adjust icon size */
                margin-right: 10px;
                /* Space between icon and text */
            }

            .nav-link .link {
                font-size: 16px;
                /* Keep the text readable */
            }

            .sidebar .logo img {
                width: 50px;
                /* Adjust logo size */
                height: 50px;
                /* Maintain aspect ratio */
            }

            /* Ensure content does not overflow */
            .content {
                margin-left: 220px;
                /* Keep space for the sidebar */
                padding: 20px;
                /* Add some padding around content */
            }

            /* Optional: Use a toggle button for mobile view */
            .toggle-sidebar {
                display: block;
                /* Show toggle button on small screens */
                margin: 10px;
                /* Add some margin */
                cursor: pointer;
                /* Change cursor to indicate clickability */
            }
        }
    </style>
</head>

<body>

    <div class="flex h-auto mx-1 my-16 bg-white ">

        <nav class="z-10 w-full ">
            @yield('headerofadmin')
            <div class="sidebar bg-[#051923]">
                <div class="-mb-5 logo">
                    <img src="{{ asset('images/gentalmanlogo.png') }}" alt="Logo" class="w-16 h-16">
                    <span class="text-white">Gentleman Admin</span>
                </div>


                <div class="overflow-y-auto text-white sidebar-content">
                    <ul class="lists">
                        <li class="list ">
                            <a href="/dashboard" class="nav-link">
                                <i class="bx bx-home-alt icon"></i>
                                <span class="link">Dashboard</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="{{ route('appointment.adminviewappointment') }}" class="nav-link">
                                <i class=" bx bx-calendar-check icon"></i>
                                <span class="link">Appointments</span>
                            </a>
                        </li>

                        <li class="list">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="bx bx-briefcase icon"></i>
                                <span class="link">Categories</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="bx bx-cart icon"></i>
                                <span class="link">Products</span>
                            </a>
                        </li>

                        <li class="list">
                            <a href="{{ route('order.index') }}" class="nav-link">
                                <i class='bx bxs-store icon'></i>
                                <span class="link">Orders</span>
                            </a>
                        </li>

                        <li class="list">
                            <a href="{{ route('course.index') }}" class="nav-link">
                                <i class="bx bxs-book icon"></i>
                                <span class="link">Courses</span>
                            </a>
                        </li>


                        <li class="list">
                            <a href="{{ route('servicecategory.index') }}" class="nav-link">
                                <i class='bx bx-briefcase icon'></i>
                                <span class="link">Services Category</span>
                            </a>
                        </li>


                        <li class="list">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <i class='bx bxs-analyse icon'></i>
                                <span class="link">Services</span>
                            </a>
                        </li>

                        <li class="list">
                            <a href="{{ route('staff.index') }}" class="nav-link">
                                <i class="bx bx-group icon"></i>
                                <span class="link">Staff Oversight</span>
                            </a>
                        </li>

                        <li class="list">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="bx bx-user icon"></i>
                                <span class="link">Customers</span>
                            </a>
                        </li>

                        <li class="list">
                            <a href="{{ route('gallery.index') }}" class="nav-link">
                                <i class="bx bx-image icon"></i>
                                <span class="link">Gallery</span>
                            </a>
                        </li>


                        <li class="z-30 list">
                            <div class="relative group">
                                <a class="nav-link">
                                    <i class="bx bx-envelope icon"></i>
                                    <span class="link">Bulletin</span>
                                </a>

                                <div
                                    class="absolute z-10 hidden w-32 transition-all duration-300 ease-in-out bg-[#051923] border rounded-md shadow group-hover:block top-2 -right-1">
                                    <div class="collar"></div> <!-- Collar Indicator -->
                                    <a href="{{ route('contact.index') }}"
                                        class="block p-4 py-2 transition-colors duration-200 border rounded-md border-l-stone-100 ">Enquiry</a>
                                    <a href="{{ route('notice.index') }}"
                                        class="block p-4 py-2 transition-colors duration-200 rounded-md ">Notice</a>
                                </div>
                            </div>
                        </li>



                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class="bx bx-cog icon"></i>
                                <span class="link">Settings</span>
                            </a>
                        </li>

                        <li class="list">
                            <form action="{{ route('logout') }}" method="POST" class="nav-link">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure to logout?')">
                                    <i class="bx bx-log-out icon"></i> <span class="link">Logout</span></button>
                            </form>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>

        {{-- alert box --}}
        @include('layouts.alert')

        <section class="overlay"></section>

        @yield('content')
    </div>
    <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
    </script>
</body>

</html>
