<script setup>
const imageUrl = new URL('../../jarom-piano.JPG', import.meta.url).href;
</script>

<template>
    <div id="about" className="mt-12 md:mt-24 mb-8 overflow-hidden">
        <div className="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div className="mx-auto text-base grid md:grid-cols-2 md:gap-16 md:items-center md:max-w-none">
                <div className="relative col-span-1 order-2 mt-8 md:mt-0 md:order-1">
                    <div className="relative text-base mx-auto max-w-prose lg:max-w-none">
                        <figure>
                            <div className="aspect-w-12 aspect-h-7 lg:aspect-none">
                                <img className="rounded-lg shadow-lg object-cover object-center" :src="imageUrl" alt="Jarom sitting in front of a piano" />
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-span-1 order-1 md:order-2">
                    <h2 className="text-base text-blue-600 font-semibold tracking-wide uppercase">About</h2>
                    <h3 className="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Meet Jarom
                    </h3>
                    <div className="mt-8">
                        <div className="prose-lg prose-green space-y-2 text-gray-600 mx-auto lg:max-w-none">
                            <p>A fairly new resident to Colorado Springs, Jarom has been familiar with the piano for over 25 years. At the age of 5, his mother began teaching him how to play the piano. When he was 11, he began learning to play percussion instruments.</p>
                            <p>In college, while studying to receive a degree in Information Technology, Jarom also completed his minor studies in music. </p>
                            <p>As a piano tuner, Jarom is committed to excellence and professionalism. You will be happy with his results and competence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>