@extends('layouts.public')

@section('content-company')

<style>

/* =========================
   BLOG HERO
========================= */

.blog-hero {
    position: relative;
    overflow: hidden;
}

.blog-hero-image {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
}

.blog-hero-image img {
    width: 100%;
    max-height: 650px;
    object-fit: cover;
}

.blog-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.8),
        rgba(0,0,0,0.2),
        transparent
    );
}

.blog-hero-content {
    position: absolute;
    left: 60px;
    bottom: 60px;
    max-width: 900px;
}

.blog-hero-content h1 {
    font-size: 58px;
    line-height: 1.1;
    margin-bottom: 20px;
    color: #fff;
    font-weight: 700;
}

.blog-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    color: rgba(255,255,255,0.7);
    font-size: 15px;
}

.blog-meta span {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* =========================
   BLOG CONTENT
========================= */

.blog-wrapper {
    max-width: 1000px;
    margin: auto;
}

.blog-content {
    margin-top: 70px;
}

/* Paragraph */

.blog-content p {
    color: #d2d2d2;
    font-size: 18px;
    line-height: 1.9;
    margin-bottom: 30px;
}

/* Headings */

.blog-content h1,
.blog-content h2,
.blog-content h3,
.blog-content h4,
.blog-content h5,
.blog-content h6 {
    color: #fff;
    margin-top: 60px;
    margin-bottom: 24px;
    line-height: 1.3;
    font-weight: 700;
}

.blog-content h2 {
    font-size: 42px;
}

.blog-content h3 {
    font-size: 32px;
}

/* Lists */

.blog-content ul,
.blog-content ol {
    padding-left: 25px;
    margin-bottom: 30px;
}

.blog-content li {
    color: #d2d2d2;
    margin-bottom: 14px;
    line-height: 1.8;
}

/* Images */

.blog-content img {
    width: 100%;
    border-radius: 24px;
    margin: 50px 0;
}

/* Blockquote */

.blog-content blockquote {
    border-left: 4px solid #1ca084;
    padding: 25px 30px;
    margin: 40px 0;
    background: rgba(255,255,255,0.03);
    border-radius: 0 18px 18px 0;
}

.blog-content blockquote p {
    margin: 0;
    font-size: 22px;
    color: #fff;
}

/* Links */

.blog-content a {
    color: #1ca084;
    text-decoration: underline;
}

/* Table */

.blog-content table {
    width: 100%;
    margin: 40px 0;
    border-collapse: collapse;
}

.blog-content table th,
.blog-content table td {
    border: 1px solid rgba(255,255,255,0.1);
    padding: 16px;
    color: #d2d2d2;
}

/* iframe */

.blog-content iframe {
    width: 100%;
    min-height: 500px;
    border: none;
    border-radius: 24px;
    margin: 40px 0;
}

/* =========================
   GALLERY
========================= */

.blog-gallery {
    margin-top: 80px;
}

.gallery-item img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 18px;
    transition: 0.3s;
}

.gallery-item:hover img {
    transform: scale(1.03);
}

/* =========================
   RELATED BLOGS
========================= */

.related-section {
    margin-top: 120px;
}

.related-card {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    overflow: hidden;
    transition: 0.3s;
    height: 100%;
}

.related-card:hover {
    transform: translateY(-6px);
    border-color: #1ca084;
}

.related-card img {
    width: 100%;
    height: 240px;
    object-fit: cover;
}

.related-content {
    padding: 24px;
}

.related-content h5 {
    color: #fff;
    margin-bottom: 14px;
    line-height: 1.5;
}

.related-content p {
    color: #aaa;
    font-size: 14px;
    line-height: 1.8;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .blog-hero-content {
        left: 25px;
        right: 25px;
        bottom: 25px;
    }

    .blog-hero-content h1 {
        font-size: 32px;
    }

    .blog-content p {
        font-size: 16px;
    }

    .blog-content h2 {
        font-size: 30px;
    }

    .blog-content iframe {
        min-height: 240px;
    }

}

</style>






<!-- =========================
     HERO
========================= -->

<section class="pt-120">

    <div class="container">

        <div class="blog-hero">

            <div class="blog-hero-image">

                <img
                    src="{{ asset('uploads/blogs/'.$blog->image) }}"
                    alt="{{ $blog->title }}"
                >

                <div class="blog-overlay"></div>

                <div class="blog-hero-content">

                    <div class="links mb-4">
                        <a href="/">Home</a>
                        <a href="{{ route('blog') }}">Blogs</a>
                        <span>{{ $blog->title }}</span>
                    </div>

                    <h1>
                        {{ $blog->title }}
                    </h1>

                    <div class="blog-meta">

                        <span>
                            <i class="far fa-calendar"></i>
                            {{ $blog->created_at->format('d M Y') }}
                        </span>

                        <span>
                            <i class="far fa-clock"></i>
                            5 min read
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     CONTENT
========================= -->

<section class="pb-120 pt-80">

    <div class="container">

        <div class="blog-wrapper">

            <div class="blog-content">

                {!! $blog->description !!}

            </div>

            <!-- GALLERY -->

            @if($blog->gallery && count($blog->gallery))

                <div class="blog-gallery">

                    <h2 class="mb-5">
                        Gallery
                    </h2>

                    <div class="row g-4">

                        @foreach($blog->gallery as $image)

                            <div class="col-lg-4 col-md-6">

                                <div class="gallery-item">

                                    <img
                                        src="{{ asset('uploads/blogs/gallery/'.$image) }}"
                                    >

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

            <!-- RELATED BLOGS -->

            @if($relatedBlogs->count())

                <div class="related-section">

                    <h2 class="mb-5">
                        Related Blogs
                    </h2>

                    <div class="row">

                        @foreach($relatedBlogs as $item)

                            <div class="col-lg-4 mb-4">

                                <a href="{{ route('blog.single', $item->slug) }}">

                                    <div class="related-card">

                                        <img
                                            src="{{ asset('uploads/blogs/'.$item->image) }}"
                                        >

                                        <div class="related-content">

                                            <h5>
                                                {{ $item->meta_title }}
                                            </h5>

                                            <p>
                                                {{ \Illuminate\Support\Str::limit(strip_tags($item->meta_description), 100) }}
                                            </p>

                                        </div>

                                    </div>

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection