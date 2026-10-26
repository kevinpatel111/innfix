@extends('layouts.public')

@section('content-company')
<section class="tc-innerheader-st6">
    <div class="container-fluid">

        <h1 class="title">
            Blogs
        </h1>

        <div class="links">
            <a href="/">Home</a>
            <a href="{{ route('blog') }}"></a>
            <span>Blog</span>
        </div>

    </div>

    <div class="lines-st2">
        <span></span>
        <span></span>
    </div>
</section>
<section class="tc-blog-st4 pt-120 pb-120">
    <div class="container">

        <div class="row">

            @forelse($blogs as $blog)

                <div class="col-lg-4 mb-4">

                    <div class="blog-card">

                        <a href="{{ route('blog.single', $blog->slug) }}">

                            <div class="img">
                                <img
                                    src="{{ asset('uploads/blogs/'.$blog->image) }}"
                                    class="img-cover"
                                >
                            </div>

                            <div class="info p-4">

                                <h4>
                                    {{ $blog->meta_title }}
                                </h4>

                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->meta_description), 120) }}
                                </p>

                                <span class="read-more">
                                    Read More →
                                </span>

                            </div>

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <h4>Blogs Coming Soon</h4>
                </div>

            @endforelse

        </div>

        <div class="mt-5">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>

@endsection
