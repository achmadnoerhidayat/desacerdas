<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Desa Cerdas</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                        <span class="text-white text-lg ml-3"> Desa Cerdas Dev </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Beberapa klik lagi untuk 
                            <br>
                            masuk ke akun anda.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Kelola desa kini menjadi sangat mudah</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->

                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Pengguna Masuk
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
				<form method="post" action="cek_login.php">
                        <div class="intro-x mt-8">
                            <input type="text" name="txtemail" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email/Username" autocomplete="off">
                            <input type="password" name="txtpass" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Ingat saya</label>
                            </div>

                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-center">
                            <button class="button button--lg w-full xl:w-80 text-white bg-theme-1 xl:mr-3">Masuk</button>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-center">
							
                            <a href="https://accounts.google.com/ServiceLogin/signinchooser?hl=en&passive=true&continue=https%3A%2F%2Fwww.google.com%2F&ec=GAZAmgQ&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Masuk via Google</a>
							&nbsp;Atau&nbsp;

							<a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fcampaign%2Flanding.php%3F%26campaign_id%3D1661741489%26extra_1%3Ds%257Cc%257C513502597352%257Ce%257Cfacebook%257C%26placement%26creative%3D513502597352%26keyword%3Dfacebook%26partner_id%3Dgooglesem%26extra_2%3Dcampaignid%253D1661741489%2526adgroupid%253D65609010858%2526matchtype%253De%2526network%253Dg%2526source%253Dnotmobile%2526search_or_content%253Ds%2526device%253Dc%2526devicemodel%253D%2526adposition%253D%2526target%253D%2526targetid%253Dkwd-541132862%2526loc_physical_ms%253D1007700%2526loc_interest_ms%253D%2526feeditemid%253D%2526param1%253D%2526param2%253D%26gclid%3DEAIaIQobChMIrY2Y99rH9gIVjgkrCh1QUQzDEAAYASAAEgLoh_D_BwE">Masuk via Facebook</a>

                        </div>                        						
                    </div>
                </div>
				</form>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>