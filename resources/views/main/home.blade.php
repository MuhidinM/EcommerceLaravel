@include('includes.header1')
<div class="container flex flex-col px-6 py-4 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
    <div class="flex flex-col items-center w-full lg:flex-row lg:w-1/2">

        <div class="max-w-lg lg:mx-12 lg:order-2">
            <h1 class="text-3xl font-medium tracking-wide text-gray-800 dark:text-white lg:text-4xl">The
                best Stores in one place</h1>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Lorem ipsum, dolor sit amet consectetur
                adipisicing elit. Aut quia asperiores alias vero magnam recusandae adipisci ad vitae
                laudantium quod rem voluptatem eos accusantium cumque.</p>

        </div>
    </div>

    <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
        <img class="object-cover w-full h-full max-w-2xl rounded-md"
            src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80"
            alt="apple watch photo">
    </div>
</div>
</header>

<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <div class="lg:flex lg:-mx-2">
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($stores as $store)
                    <div class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <div class="px-4 py-2">
                            <a href="{{ url('store/' . $store->id) }}">
                                <h1 class="text-3xl text-gray-800 uppercase dark:text-white">
                                    {{ $store->name }}</h1>
                            </a>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $store->address }}</p>
                        </div>
                        <a href="{{ url('store/' . $store->id) }}"><img class="object-cover w-full h-70 mt-2"
                                src="/uploads/stores/{{ $store->image }}" alt="Image">
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
        {{ $stores->links() }}
    </div>
    </div>
</section>

@include('includes.footer')
