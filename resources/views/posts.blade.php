<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title> {{-- kirim title ke layout --}}

  @foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-400">
      <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
      </a>
      <div class="text-base ">
        {{-- pakai dateformat --}}
        {{-- <a href="#">{{ $post['author'] }}</a> | {{ $post['created_at']->format('D, d F Y') }} --}}
        {{-- pakai diffForHumans --}}
        <a href="/authors/{{ $post->author->username }}" class="hover:underline text-gray-500">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->id }}" class="hover:underline text-gray-500">{{ $post->category->name }}</a> | {{ $post['created_at']->diffForHumans() }}
      </div>
      <p class="my-4 font-light">
        {{ Str::limit($post['body'], 150) }}
      </p>
      <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline"> Read more &raquo;</a>
    </article>
  @endforeach

</x-layout>