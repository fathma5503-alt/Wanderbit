
@include('layout.head')
@include('layout.header')

  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
           <h1 class="pagetitle-heading">Our Blog</h1>
          <p class="pagetitle-desc">Latest articles and updates.</p>
        </div>
        </div>
      </div>
    </div>
  </div>

   <!-- BLOG GRID SECTION -->

<div class="blog">
              @foreach($blogs as $blog)
              <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="service-item serviceheight">

                      <div class="service-img">
                        <img src="{{ asset('public/uploads/blog/'.$blog->cover_image) }}" height="330px" width="350px" alt="Blog">
                      </div>

                      <div class="service-body">
                          <h4 class="service-title">
                              <a href="{{ url('blogs/'.$blog->slug) }}">{{ $blog->title }}</a>
                          </h4>

                          <p class="service-desc">
                              {{ Str::limit($blog->description, 120) }}
                          </p>

                          <a href="{{ url('blogs/'.$blog->slug) }}"
                             class="btn btn-primary btn-contact">
                              Read More
                          </a>
                      </div>
                  </div>
              </div>
              @endforeach
</div>
@include('layout.footer')
@include('layout.script')
