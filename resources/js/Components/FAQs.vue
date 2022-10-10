<script setup>
const faqs = [
    {
        question: 'How much does a tuning cost?',
        answer: 'A tuning is $100.',
    },
    {
        question: 'How long does a tuning take?',
        answer: 'A tuning takes about 1 hour to complete.',
    },
    {
        question: 'How often should I get my piano tuned?',
        answer: 'You should get your piano tuned at least once a year. Every six months is recommended. Regular tuning helps maintain stability, mitigate the risk of physical damage to the piano (including strings breaking), and the soundboard losing its shape. Additionally, it may prevent expensive piano repairs in the future.',
    },
]
</script>

<template>
    <div id="faqs" class="relative mt-4 bg-gray-50">
        <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">Frequently asked questions</h2>
                    <p class="mt-4 text-lg text-gray-500">Can't find the answer you're looking for? Reach out to our <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">customer support</a> team.</p>
                </div>
                <div class="mt-12 lg:col-span-2 lg:mt-0">
                    <dl class="space-y-12">
                        <div v-for="faq in faqs" :key="faq.question">
                            <dt class="text-lg font-medium leading-6 text-gray-900">{{ faq.question }}</dt>
                            <dd class="mt-2 text-base text-gray-500">{{ faq.answer }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>