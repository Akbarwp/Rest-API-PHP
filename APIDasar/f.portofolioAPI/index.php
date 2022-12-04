<?php

    // API Youtube menggunakan PHP cURL
    function get_CURL($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        // Melihat hasil API dengan JSON
        return json_decode($result, true);
        // var_dump($result);
    }

    // Youtube Channel API --> {part, key_api, id/channel_Id, parameter} 
    $url = 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id={channel_Id}&key={key_api}';
    $youtuberURL = get_CURL($url);

    $channelName = $youtuberURL['items'][0]['snippet']['title'];
    $subscriber = $youtuberURL['items'][0]['statistics']['subscriberCount'];

    // Youtube Videos
    $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&key={key_api}&channelId={channel_Id}&maxResults=1&order=date';
    $youtuberURL = get_CURL($url);

    $lastestVideo = $youtuberURL['items'][0]['id']['videoId'];


    // API Instagram menggunakan PHP cURL
    $clientID = '{app_id}';
    $accessToken = '{user_token}';

    // Otorisasi
    $otorisasi = 'https://api.instagram.com/oauth/authorize
    ?client_id={app_id}
    &redirect_uri={web_url}
    &scope=user_profile,user_media
    &response_type=code';

    // Username
    $url = 'https://graph.instagram.com/me?fields=id,username,account_type,media_count&access_token={user_token}';
    $instagramURL = get_CURL($url);
    
    $username = $instagramURL['username'];
    
    // Membaca Semua Postingan
    $url = 'https://graph.instagram.com/me/media?fields=id,username,media_url&access_token={user_token}';
    $mediaURL = get_CURL($url);

    $media = [];
    foreach ($mediaURL['data'] as $post) {
        $media[] = $post['media_url'];
    }

    // Membatasi jumlah postingan
    $photo = [];
    for ($index = 0; $index <= 5; $index++) {
        $photo[] = $media[$index];
    }

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Tailwind CSS</title>
    <link rel="stylesheet" href="dist/output.css">
    <!-- <link rel="stylesheet" href="dist/css/final.css"> -->

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');

        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body>

    <!-- Awal Navbar -->
    <header class="bg-transparent fixed top-0 left-0 w-full flex items-center z-20 transition-colors">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#hero" class="font-bold text-lg text-dark block py-6 dark:text-darkPrimary">UcupBS</a>
                </div>

                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>

                    <nav id="navbar" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] md:max-w-[300px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-darkBG dark:shadow-slate-700 lg:dark:bg-transparent">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#hero" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Beranda</a>
                            </li>

                            <li class="group">
                                <a href="#about" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Profil</a>
                            </li>

                            <li class="group">
                                <a href="#social" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Sosial</a>
                            </li>

                            <li class="group">
                                <a href="#portofolio" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Portofolio</a>
                            </li>

                            <li class="group">
                                <a href="#keterampilan" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Keterampilan</a>
                            </li>

                            <li class="group">
                                <a href="#pengalaman" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Pengalaman</a>
                            </li>

                            <li class="group">
                                <a href="#kontak" class="text-base text-dark py-2 mx-8 flex group-hover:text-third dark:text-white">Kontak</a>
                            </li>

                            <!-- Awal toggle Dark Mode -->
                            <li class="flex items-start pl-8 mt-3 lg:mt-2">
                                <div class="flex">
                                    <span class="mr-2 text-sm text-amber-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"/></svg>
                                    </span>
                                    <input type="checkbox" class="hidden" id="dark-toggle">
                                    <label for="dark-toggle">
                                        <div class="flex w-9 h-5 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out"></div>
                                        </div>
                                    </label>
                                    <span class="ml-2 text-sm text-[#313131] dark:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981z"/></svg>
                                    </span>
                                </div>
                            </li>
                            <!-- Akhir toggle Dark Mode -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Akhir Navbar -->

    <!-- Awal Hero section -->
    <section id="hero" class="pt-36 dark:bg-darkBG transition-colors">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-primary lg:text-xl dark:text-darkPrimary">Hai, apa kabar kalian? 👋 Saya <span class="block font-bold text-dark text-4xl mt-1 lg:text-5xl dark:text-white">Ucup bin Slamet</span>
                    </h1>
                    <h2 class="font-medium text-secondary text-lg mb-5 dark:text-third"><span class="text-dark lg:text-2xl dark:text-white">Mahasiswa</span> | Pemancing Handal</h2>
                    <p class="font-medium text-secondary mb-10 leading-relaxed dark:text-third">Aku mahasiswa dari Universitas Bikini Bottom. Saat ini aku tertarik dengan memancing ikan, dan juga sedang belajar menjadi <span class="text-[#f55247] font-bold">Peniup Gelembung Handal</span>.</p>

                    <a href="" target="_blank" class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-500 ease-in-out dark:bg-darkPrimary dark:shadow-slate-700 hover:dark:bg-[#ff7eff] hover:dark:opacity-100">Hubungi Saya</a>
                </div>

                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:mt-9 lg:right-0">
                        <div class="relative z-10 max-w-full mx-auto text-[#3DDC84]">
                            <svg role="img" viewBox="0 0 24 24" class="fill-current" width="612" height="612" xmlns="http://www.w3.org/2000/svg"><title>Android</title><path d="M17.523 15.3414c-.5511 0-.9993-.4486-.9993-.9997s.4483-.9993.9993-.9993c.5511 0 .9993.4483.9993.9993.0001.5511-.4482.9997-.9993.9997m-11.046 0c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4483.9993.9993 0 .5511-.4483.9997-.9993.9997m11.4045-6.02l1.9973-3.4592a.416.416 0 00-.1521-.5676.416.416 0 00-.5676.1521l-2.0223 3.503C15.5902 8.2439 13.8533 7.8508 12 7.8508s-3.5902.3931-5.1367 1.0989L4.841 5.4467a.4161.4161 0 00-.5677-.1521.4157.4157 0 00-.1521.5676l1.9973 3.4592C2.6889 11.1867.3432 14.6589 0 18.761h24c-.3435-4.1021-2.6892-7.5743-6.1185-9.4396"/></svg>
                        </div>
                        <span class="absolute bottom-20 left-1/2 -translate-x-1/2 scale-125 md:scale-150 text-primary dark:text-darkPrimary">
                            <svg width="400" height="400" class="fill-current" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><path d="M43.8,-35.8C58.1,-17.1,71.7,1.2,69.6,18C67.4,34.9,49.5,50.3,32.3,53.2C15.1,56.2,-1.4,46.8,-19.2,38.7C-37,30.6,-56,23.9,-63.5,9.3C-71,-5.3,-66.9,-27.7,-54.4,-46.1C-41.9,-64.4,-21,-78.6,-3.1,-76.2C14.8,-73.7,29.6,-54.6,43.8,-35.8Z" transform="translate(100 100)" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Hero section -->

    <!-- Awal About -->
    <section id="about" class="pt-36 pb-32 dark:bg-darkBG transition-colors">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold text-primary text-lg mb-3 dark:text-darkPrimary">Tentang Saya</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl dark:text-white">Tak Kenal Maka Tak Tahu</h2>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg dark:text-third">Biasanya dipanggil teman-teman saya dengan nama <span class="text-third font-bold text-lg lg:text-xl dark:text-darkPrimary">Ucup</span>. Saya sangat tertarik dengan memancing sejak SD, ketika saya sering menonton Youtube dan browsing di website dan muncul pertanyaan, <span class="my-2 ml-5 lg:ml-10 italic font-semibold text-lg text-dark block lg:text-xl lg:my-3 dark:text-white">"Kok bisa SpongeBob membuat api dalam laut? Bagaimana ya caranya?"</span>Dari situlah saya ingin mempelajari tentang SpongeBob.</p>
                </div>

                <div class="w-full px-4 lg:w-1/2">
                    <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-3xl lg:pt-10 dark:text-white">Mari Berteman</h3>
                    <p class="font-medium text-base text-secondary mb-6 lg:text-lg dark:text-third">Selain hobi memancing, saya juga bisa dibilang seorang gamer. Saya senang bermain game sejak kecil. Dan game yang aku mainkan yaitu peniup karang, menangkap ubur-ubur, dan bermain Rubik 4x4. Jadi kalau mau mabar bisa hubungi saya di media sosial bawah ini ya <span class="text-rose-500">❤</span></p>

                    <div class="flex items-center">
                        <!-- Instagram -->
                        <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:dark:border-third hover:dark:bg-third">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>

                        <!-- Linkedin -->
                        <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:dark:border-third hover:dark:bg-third">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>

                        <!-- GitHub -->
                        <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:dark:border-third hover:dark:bg-third">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a>

                        <!-- Showwcase -->
                        <a href="" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third hover:border-secondary hover:bg-secondary transition duration-300 lg:scale-110 dark:text-white hover:dark:border-third hover:dark:bg-third">
                            <img src="https://assets.showwcase.com/landing-page/svg/logo.svg" alt="showwcase-logo" width="20" title="Showwcase">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir About -->

    <!-- Awal Youtube & Instagram -->
    <section id="social" class="pt-36 pb-32 bg-slate-800 dark:bg-slate-400 transition-colors">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2 dark:text-darkPrimary">Media Sosial</h4>
                    <h2 class="font-bold text-white text-3xl mb-4 lg:text-4xl dark:text-dark">Apa saja yang aku punya</h2>
                    <p class="font-medium text-md text-third lg:text-lg dark:text-white">Berikut merupakan media sosial Instagram & Youtube aku</p>
                </div>
            </div>

            <div class="flex flex-wrap">
                <!-- Youtube -->
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold text-[#FF0000] text-lg mb-3">
                        <svg role="img" viewBox="0 0 24 24" width="33" class="inline fill-current" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        Youtube
                    </h4>
                    <h2 class="font-bold text-white text-3xl mb-4 lg:text-4xl dark:text-dark"><a href="" target="_blank"><?= $channelName; ?></a></h2>
                    <div class="flex">
                        <h3 class="font-medium text-white text-lg mb-4 mr-3 lg:text-xl dark:text-dark"><?= $subscriber; ?> Subscribers</h3>
                        <div class="g-ytsubscribe" data-channelid="UCErb18JLBspmK4czd-xMHPQ" data-layout="default" data-count="hidden"></div>
                    </div>
                    <p class="mb-3 font-medium text-md text-third lg:text-lg dark:text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, ea.</p>
                    <iframe class="w-full aspect-video rounded-lg shadow-lg shadow-slate-700" src="https://www.youtube.com/embed/<?= $lastestVideo; ?>?rel=0" allowfullscreen></iframe>
                </div>

                <!-- Instagram -->
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold text-[#E4405F] text-lg mb-3">
                        <svg role="img" viewBox="0 0 24 24" width="33" class="inline fill-current" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        Instagram
                    </h4>
                    <h2 class="font-bold text-white text-3xl mb-4 lg:text-4xl dark:text-dark"><a href="" target="_blank">@<?= $username; ?></a></h2>
                    <h3 class="font-medium text-white text-lg mb-4 lg:text-xl dark:text-dark">1 juta followers</h3>
                    <p class="mb-3 font-medium text-md text-third lg:text-lg dark:text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, ea.</p>
                    <div class="flex flex-wrap gap-5 justify-center">
                        <?php foreach ($photo as $post): ?>
                        <div class="ig-thumbnail">
                            <img src="<?= $post; ?>" alt="" class="w-36 h-36 bg-white rounded-lg shadow-lg shadow-slate-700">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    </section>
    <!-- Akhir Youtube & Instagram -->

    <!-- Awal Portofolio -->
    <section id="portofolio" class="pt-36 pb-32 bg-slate-100 dark:bg-darkSecondary transition-colors">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2 dark:text-darkPrimary">Portofolio</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 lg:text-4xl dark:text-white">Proyek Pernah Saya Buat</h2>
                    <p class="font-medium text-md text-secondary lg:text-lg dark:text-third">Berikut merupakan proyek-proyek yang pernah saya buat, baik itu proyek kuliah ataupun proyek individu.</p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center text-justify xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <a href="" target="_blank"><div class="w-full h-96 bg-rose-500"></div></a>
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">Proyek Kuliah</h3>
                    <p class="font-medium text-base text-secondary dark:text-third">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis vitae omnis quibusdam aspernatur tempora minima in soluta tenetur temporibus qui doloremque iusto suscipit odit, cumque ipsum eligendi praesentium error alias et non nostrum vel aperiam. Animi, labore beatae laborum dolorum doloribus unde aspernatur quibusdam mollitia nemo dolore accusamus vel esse!</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <a href="" target="_blank"><div class="w-full h-96 bg-rose-500"></div></a>
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">Proyek Individu</h3>
                    <p class="font-medium text-base text-secondary dark:text-third">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis vitae omnis quibusdam aspernatur tempora minima in soluta tenetur temporibus qui doloremque iusto suscipit odit, cumque ipsum eligendi praesentium error alias et non nostrum vel aperiam. Animi, labore beatae laborum dolorum doloribus unde aspernatur quibusdam mollitia nemo dolore accusamus vel esse!</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <a href="" target="_blank"><div class="w-full h-96 bg-rose-500"></div></a>
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">Proyek Kuliah</h3>
                    <p class="font-medium text-base text-secondary dark:text-third">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis vitae omnis quibusdam aspernatur tempora minima in soluta tenetur temporibus qui doloremque iusto suscipit odit, cumque ipsum eligendi praesentium error alias et non nostrum vel aperiam. Animi, labore beatae laborum dolorum doloribus unde aspernatur quibusdam mollitia nemo dolore accusamus vel esse!</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <a href="" target="_blank"><div class="w-full h-96 bg-rose-500"></div></a>
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">Proyek Individu</h3>
                    <p class="font-medium text-base text-secondary dark:text-third">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis vitae omnis quibusdam aspernatur tempora minima in soluta tenetur temporibus qui doloremque iusto suscipit odit, cumque ipsum eligendi praesentium error alias et non nostrum vel aperiam. Animi, labore beatae laborum dolorum doloribus unde aspernatur quibusdam mollitia nemo dolore accusamus vel esse!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Portofolio -->

    <!-- Awal Skills -->
    <section id="keterampilan" class="pt-36 pb-32 bg-slate-800 dark:bg-slate-400 transition-colors">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2 dark:text-darkPrimary">Keterampilan</h4>
                    <h2 class="font-bold text-white text-3xl mb-4 lg:text-4xl dark:text-dark">Apa saja yang pernahku pelajari</h2>
                    <p class="font-medium text-md text-third lg:text-lg dark:text-white">Berikut merupakan hal-hal yang pernahku pelajari</p>
                </div>
            </div>

            <div class="w-full px-4">
                <div class="flex flex-wrap items-center justify-center">
                    <img src="dist/skill/hmtl5.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/css3.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/javascript.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/php.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/java.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/oracle.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/mysql.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/laravel.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/git.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/github.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/bootstrap.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">

                    <img src="dist/skill/tailwindcss.svg" alt=""
                        class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition duration-300 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Skills -->

    <!-- Awal Pengalaman -->
    <section id="pengalaman" class="pt-36 pb-32 bg-slate-100 dark:bg-darkSecondary transition-colors">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2 dark:text-darkPrimary">Pengalaman</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 lg:text-4xl dark:text-white">Apa saja yang pernahku ikuti</h2>
                    <p class="font-medium text-md text-secondary lg:text-lg dark:text-third">Berikut merupakan organisasi yang pernahku ikuti</p>
                </div>
            </div>

            <div class="flex flex-wrap justify-center">
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-darkBG">
                        <img src="dist/skill/hmtl5.svg" alt="pengalaman" class="w-1/2 mx-auto mt-3">
                        <div class="py-8 px-6">
                            <h3 class="mb-3 font-semibold text-xl text-dark dark:text-white">Judul Pengalaman</h3>
                            <h4 class="font-medium text-lg text-dark dark:text-white">Bagian pengalaman</h4>
                            <p class="font-light text-base text-slate-400 mb-4">Angkatan Tahun Berapa?</p>
                            <div class="flex items-center">
                                <!-- Instagram -->
                                <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:hover:dark:bg-third">
                                    <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                    </svg>
                                </a>

                                <!-- Linkedin -->
                                <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:hover:dark:bg-third">
                                    <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>

                                <!-- GitHub -->
                                <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:hover:dark:bg-third">
                                    <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-darkBG">
                        <img src="dist/skill/css3.svg" alt="pengalaman" class="w-1/2 mx-auto mt-3">
                        <div class="py-8 px-6">
                            <h3 class="mb-3 font-semibold text-xl text-dark dark:text-white">Judul Pengalaman</h3>
                            <h4 class="font-medium text-lg text-dark dark:text-white">Bagian pengalaman</h4>
                            <p class="font-light text-base text-slate-400 mb-4">Angkatan Tahun Berapa?</p>
                            <div class="flex items-center">
                                <!-- Instagram -->
                                <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:hover:dark:bg-third">
                                    <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                    </svg>
                                </a>

                                <!-- Linkedin -->
                                <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:hover:dark:bg-third">
                                    <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>

                                <!-- GitHub -->
                                <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-dark hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110 dark:text-white hover:hover:dark:bg-third">
                                    <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Pengalaman -->

    <!-- Awal Kontak -->
    <section id="kontak" class="pt-36 pb-32 dark:bg-darkBG transition-colors">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2 dark:text-darkPrimary">Kontak</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 lg:text-4xl dark:text-white">Hubungi Saya</h2>
                    <p class="font-medium text-md text-secondary lg:text-lg dark:text-third">Dapat hubungi saya dengan mengisi form di bawah ini</p>
                </div>

                <form action="">
                    <div class="w-full lg:w-2/3 lg:mx-auto">
                        <div class="w-full px-4 mb-8">
                            <label for="nama" class="text-base font-bold text-primary dark:text-darkPrimary">Nama</label>
                            <input type="text" id="nama" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary">
                        </div>

                        <div class="w-full px-4 mb-8">
                            <label for="email" class="text-base font-bold text-primary dark:text-darkPrimary">Email</label>
                            <input type="email" id="email" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary">
                        </div>

                        <div class="w-full px-4 mb-8">
                            <label for="pesan" class="text-base font-bold text-primary dark:text-darkPrimary">Pesan</label>
                            <textarea type="text" id="pesan" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary h-32"></textarea>
                        </div>

                        <div class="w-full px-4">
                            <button class="text-base font-semibold text-dark bg-primary py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-300 dark:bg-darkPrimary dark:shadow-slate-700 hover:dark:bg-[#ff7eff] hover:dark:opacity-100 dark:text-white">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Akhir Kontak -->

    <!-- Awal Footer -->
    <footer class="bg-dark pt-24 pb-12">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-12 text-slate-300 md:w-1/3">
                    <h2 class="font-bold text-4xl text-white mb-5">Ucup</h2>
                    <h3 class="font-bold text-2xl mb-2">Mabar Kuyy...</h3>
                    <div class="flex flex-wrap">
                        <button class="w-10 h-10 mr-3 rounded-full flex justify-center items-center border boder-third text-slate-300 hover:border-secondary hover:bg-secondary hover:text-[#FA4454] transition duration-300 lg:scale-110" id="valorant">
                            <svg role="img" width="23" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Valorant</title><path d="M23.792 2.152a.252.252 0 0 0-.098.083c-3.384 4.23-6.769 8.46-10.15 12.69-.107.093-.025.288.119.265 2.439.003 4.877 0 7.316.001a.66.66 0 0 0 .552-.25c.774-.967 1.55-1.934 2.324-2.903a.72.72 0 0 0 .144-.49c-.002-3.077 0-6.153-.003-9.23.016-.11-.1-.206-.204-.167zM.077 2.166c-.077.038-.074.132-.076.205.002 3.074.001 6.15.001 9.225a.679.679 0 0 0 .158.463l7.64 9.55c.12.152.308.25.505.247 2.455 0 4.91.003 7.365 0 .142.02.222-.174.116-.265C10.661 15.176 5.526 8.766.4 2.35c-.08-.094-.174-.272-.322-.184z" />
                            </svg>
                        </button>

                        <button class="w-10 h-10 mr-3 rounded-full flex justify-center items-center border boder-third text-slate-300 hover:border-secondary hover:bg-secondary transition duration-300 lg:scale-110 grayscale hover:grayscale-0" id="honkai">
                            <img src="dist/games/HI3.webp" alt="Honkai Impact 3" width="50" title="Honkai Impact 3" class="fill-current">
                        </button>
                    </div>
                </div>

                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Thanks For</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="https://code.visualstudio.com/" target="_blank" class="inline-block text-base hover:text-[#007ACC] mb-3">Visual Studio Code</a>
                        </li>
                        <li>
                            <a href="https://simpleicons.org/" target="_blank" class="inline-block text-base hover:text-[#111111] mb-3">Simple Icons</a>
                        </li>
                        <li>
                            <a href="https://remixicon.com/" target="_blank" class="inline-block text-base hover:text-[#006aff] mb-3">Remix Icon</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com/" target="_blank" class="inline-block text-base hover:text-[#06B6D4] mb-3">Tailwind CSS</a>
                        </li>
                        <li>
                            <p class="inline-block text-base hover:text-primary mb-3 cursor-pointer">dll.</p>
                        </li>
                    </ul>
                </div>

                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Tautan</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#hero" class="inline-block text-base hover:text-primary mb-3">Beranda</a>
                        </li>
                        <li>
                            <a href="#about" class="inline-block text-base hover:text-primary mb-3">Tentang Saya</a>
                        </li>
                        <li>
                            <a href="#portofolio" class="inline-block text-base hover:text-primary mb-3">Portofolio</a>
                        </li>
                        <li>
                            <a href="#keterampilan"
                                class="inline-block text-base hover:text-primary mb-3">Keterampilan</a>
                        </li>
                        <li>
                            <a href="#pengalaman" class="inline-block text-base hover:text-primary mb-3">Pengalaman</a>
                        </li>
                        <li>
                            <a href="#kontak" class="inline-block text-base hover:text-primary mb-3">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full pt-10 border-t border-secondary">
                <div class="flex justify-center items-center mb-5">
                    <!-- Instagram -->
                    <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-white hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg>
                    </a>

                    <!-- Linkedin -->
                    <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-white hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>

                    <!-- GitHub -->
                    <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border boder-third text-white hover:border-secondary hover:bg-secondary hover:text-white transition duration-300 lg:scale-110">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                        </svg>
                    </a>
                </div>

                <p class="font-medium text-xs text-third text-center">Dibuat dengan <span class="text-red-500">❤</span> oleh <a href="https://www.instagram.com/akbarwp002" target="_blank" class="font-bold text-primary">Ucup bin Slamet</a> menggunakan <a href="https://tailwindcss.com/" target="_blank" class="font-bold text-[#06B6D4]">Tailwind CSS</a>.</p>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Awal back to top -->
    <section class="bg-transparent h-14 w-14">
        <a href="#hero" id="to-top" class="fixed z-[99999] bottom-4 right-4 p-4 h-12 w-12 bg-primary rounded-full hidden justify-center items-center hover:animate-bounce md:h-14 md:w-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="scale-125 fill-current text-white" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"/></svg>
        </a>
    </section>
    <!-- Akhir back to top -->


    <script src="dist/js/script.js"></script>
    <script src="dist/js/sweetalert2.all.min.js"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>