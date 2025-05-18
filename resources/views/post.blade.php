<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
      <div class="text-base">
        {{-- pakai dateformat --}}
        {{-- <a href="#">{{ $post['author'] }}</a> | {{ $post['created_at']->format('D, d F Y') }} --}}
        {{-- pakai diffForHumans --}}
        <a href="/authors/{{ $post->author->username }}" class="hover:underline text-gray-500">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->id }}" class="hover:underline text-gray-500">{{ $post->category->name }}</a> | {{ $post['created_at']->diffForHumans() }}
      </div>
      <p class="my-4 font-light">
        {{ $post['body']}}
      </p>
      <a href="/posts" class="font-medium text-blue-500 hover:underline">Back to all post &laquo;</a>
    </article>

</x-layout>