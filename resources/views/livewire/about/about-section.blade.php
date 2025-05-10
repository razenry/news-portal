<section class="bg-white dark:bg-gray-900 mt-8" id="about">
    <div class="py-12 px-4 mx-auto max-w-screen-xl text-center lg:py-20 lg:px-12 transition duration-300 ease-in-out">

        <h1
            class="mb-4 text-3xl font-extrabold tracking-tight leading-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white transition-all duration-300">
            {{ $about->title??'Halo' }}
        </h1>

        <p class="mb-8 text-lg font-medium text-gray-600 lg:text-xl sm:px-12 xl:px-48 dark:text-gray-300 transition-opacity duration-300">
            {{ $about->description??'Halo, selamat datang di website kami.' }}
        </p>
    </div>
</section>
