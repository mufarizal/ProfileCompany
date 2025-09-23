<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Stitch Design</title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1173d4",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Manrope"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <div class="relative flex h-auto min-h-screen w-full flex-col justify-between overflow-x-hidden">
        <div>
            <header
                class="sticky top-0 z-10 flex items-center justify-between border-b border-gray-200/50 dark:border-gray-700/50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm p-4">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white flex-1 text-center">Company Name</h1>
                <button
                    class="flex items-center justify-center rounded-full h-10 w-10 text-gray-600 dark:text-gray-400 hover:bg-primary/10 dark:hover:bg-primary/20">
                    <svg fill="currentColor" height="24" viewBox="0 0 256 256" width="24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z">
                        </path>
                    </svg>
                </button>
            </header>
            <main class="pb-24">
                <div class="p-4">
                    <div class="relative bg-cover bg-center flex flex-col justify-end overflow-hidden rounded-lg min-h-[280px]"
                        style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 40%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuAnH1_q3FQA8RDkg1jSvIB8I--sHc6vUm9gi8rh-NK2XGLJMDlPQPMXzPjHjY-oWaUIKVaui3zyf_TiWf_g_1aali2zYrY9O2Ml0023vwDzUlKtIgzBds3pu7DDot2Nbudiz36fW4l6C1CO7r-D7v5TZqL-p5fxLapdvcF_x0pfrOxfb3gQFm4s1Te9K-cbcNeOcMtBRyNiTrw1eRkDPpK-AQib01mW8wR0PNlxQlf4Dy4l05UdJBQtH_3HKT_qReBs-Iz9Ji7Now");'>
                        <div class="p-6">
                            <h2 class="text-white text-3xl font-bold">Company Name</h2>
                        </div>
                    </div>
                </div>
                <section class="px-4 space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-2 mb-3">Vision</h3>
                        <p class="text-gray-700 dark:text-gray-300 px-2 leading-relaxed">To be the leading provider of
                            innovative solutions, empowering businesses to thrive in a dynamic world.</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-2 mb-3">Mission</h3>
                        <p class="text-gray-700 dark:text-gray-300 px-2 leading-relaxed">We are committed to delivering
                            exceptional value through cutting-edge technology, fostering long-term partnerships, and
                            driving sustainable growth.</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-2 mb-3">About Us</h3>
                        <p class="text-gray-700 dark:text-gray-300 px-2 leading-relaxed">Company Name is a dynamic and
                            innovative technology company dedicated to providing cutting-edge solutions to businesses
                            across various industries. With a team of highly skilled professionals and a passion for
                            excellence, we strive to empower our clients with the tools and expertise they need to
                            succeed in todays rapidly evolving digital landscape.</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-2 mb-3">Slogan</h3>
                        <p class="text-gray-700 dark:text-gray-300 px-2 leading-relaxed italic">"Innovate. Transform.
                            Succeed."</p>
                    </div>
                </section>
                <section class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-6 mb-4">Our Partners</h3>
                    <div class="flex overflow-x-auto no-scrollbar pl-4">
                        <div class="flex items-stretch gap-4 p-2">
                            <div class="flex flex-col gap-3 min-w-40">
                                <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuClcfBnSAtGIui12PANshdHF6-E9tyUIa39lHzpitkTW5IG6eiDa9wewWXQ0ZBMntYe9ZLE0kwNBgu-p7Uc15C1h9mSj4ED-cQD_6kn5khOxXxgsuoQU-dsYUwtLzyDkP9v_W6P42Exnat6Rs_OvZIj4YeAJcODIZexWTffN-qCTDrtfBBJqJoTE2JAGxEjKhM8ahlSzF2z5UH18MjJjvEI_96fcVCT_7WIuUaAIQHfqJn-WHp-xIajt7OTmFyvKLEAvwl5iorS_w");'>
                                </div>
                                <p class="text-gray-800 dark:text-gray-200 text-center text-sm font-semibold">Partner 1
                                </p>
                            </div>
                            <div class="flex flex-col gap-3 min-w-40">
                                <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBYN6fFEq0cVAOOs8ShvxZEjghuyLQpXz7oL3y1vhO1r-bSQN2DMHkcCk_I8CZneMPOBxCY30ejnNTcjnxHEVdIyMzBUeUDzYL-MphyTiOp3pvr70Dbbl2UmW5EGXsvRAd2cfTBWRRngu8Umluwe5auwsuYm01Ol1LIfxjh3K_27R-k8JBXw58MpoZaj7-qqmE4iOdupzkgqQjKpOyOylUKCoG017jAUWcJ3duR7rqVEWCKJuyMf9lkckik1e9bhmnJBfMQjaUE7A");'>
                                </div>
                                <p class="text-gray-800 dark:text-gray-200 text-center text-sm font-semibold">Partner 2
                                </p>
                            </div>
                            <div class="flex flex-col gap-3 min-w-40">
                                <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBOzYmriQE81trw72JVgGsGYhOrPm-c8LTUhucB9lWs4dymxcB3XkJ4yYi4FNZ8_tqyHXISQpOHSOUGU5z4CvK2LZtekYm7pVsxV8u2mM5NdNApnbRn-EBQsUjIEXCKQcib475N9NwImQiw2ZnknhApn3aCgK298cCx1lhqL2-e8fkZwHvpnwq4_eF-tJHPC9HwM5YGm94Gx9tYxeA5zj3CtjAEi4MpkWdp0T87CNE8NKFVtmKD0_U4ip1LhhkVidwBHu7qYbCYSw");'>
                                </div>
                                <p class="text-gray-800 dark:text-gray-200 text-center text-sm font-semibold">Partner 3
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
        <footer
            class="fixed bottom-0 left-0 right-0 border-t border-gray-200/50 dark:border-gray-700/50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
            <div class="flex justify-around items-center px-2 py-1">
                <a class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg w-full text-primary"
                    href="#">
                    <div class="h-6">
                        <svg fill="currentColor" height="24" viewBox="0 0 256 256" width="24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224,115.55V208a16,16,0,0,1-16,16H168a16,16,0,0,1-16-16V168a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v40a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V115.55a16,16,0,0,1,5.17-11.78l80-75.48.11-.11a16,16,0,0,1,21.53,0,1.14,1.14,0,0,0,.11.11l80,75.48A16,16,0,0,1,224,115.55Z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-semibold">Home</p>
                </a>
                <a class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg w-full text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors"
                    href="#">
                    <div class="h-6">
                        <svg fill="currentColor" height="24" viewBox="0 0 256 256" width="24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium">About Us</p>
                </a>
                <a class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg w-full text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors"
                    href="#">
                    <div class="h-6">
                        <svg fill="currentColor" height="24" viewBox="0 0 256 256" width="24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M80,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H88A8,8,0,0,1,80,64Zm136,56H88a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,64H88a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16ZM44,52A12,12,0,1,0,56,64,12,12,0,0,0,44,52Zm0,64a12,12,0,1,0,12,12A12,12,0,0,0,44,116Zm0,64a12,12,0,1,0,12,12A12,12,0,0,0,44,180Z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium">Services</p>
                </a>
                <a class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg w-full text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors"
                    href="#">
                    <div class="h-6">
                        <svg fill="currentColor" height="24" viewBox="0 0 256 256" width="24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-xs font-medium">Contact</p>
                </a>
            </div>
            <div class="h-safe-area-bottom bg-background-light/80 dark:bg-background-dark/80"></div>
        </footer>
    </div>

</body>

</html>
