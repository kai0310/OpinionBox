<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Guide
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <section class="text-center">
            <h3 class=" title-font  mb-4 text-4xl font-extrabold leading-10 tracking-tight sm:text-5xl sm:leading-none md:text-6xl">
                Our mission
            </h3>
            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                Our mission is to provide a place for people to voice their opinions and to incorporate those opinions
                into school improvement.
            </p>
            <div class="flex mt-6 justify-center">
                <div class="w-32 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
        </section>
        <div class="flex items-center justify-center mt-16">
            <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg max-w-lg">
                <div class="flex mb-4 items-center">
                    <div class="p-1 border-2 border-blue-400 rounded-full">
                        <img
                            class="w-12 h-12 rounded-full"
                            src="{{ config('opinion-box.github.author_icon') }}"
                            rel="author icon"
                            loading="lazy"
                            onmousedown="return false;"
                        />
                    </div>
                    <div class="ml-2 mt-0.5">
                        <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">
                          <a href="https://github.com/kai0310" target="_blank">
                              kai0310<i class="fab fa-github ml-1"></i>
                          </a>
                        </span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">
                            Creator, Development manager
                        </span>
                    </div>
                </div>
                <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">
                    I hope OpinionBox will be used by many more people and that our students will make
                    our school a better place!<br/>
                    I'm very honored to be able to develop this OpinionBox.
                    Programming is a very powerful way to solve problems around us.
                    Let's feel the joy of creating and solving together.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
