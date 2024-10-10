
@extends('index')
@section('content')


@push('style')

<style>
    .nav-pills .nav-link.active{
        background-color: red
    }
    .sticky-wrapper {
        position: -webkit-sticky;
        position: sticky;
        top: 0; /* or any offset */
        z-index: 1000; /* Make sure it stays on top */
    }
    
    .scrollable-container {
        max-height: 300px; /* Adjust based on your needs */
        overflow-y: auto;
    }
    
    .topics-detail-block-image {
        max-width: 100%; /* Responsive image */
    }
</style>

@endpush

<style>
    #navbar-example3 .nav .nav-pills .flex-column .nav-link .active{
        background-color: red
    }
</style>

<section class="hero-section d-flex justify-content-center align-items-center" id="section_0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12 mx-auto">
                <h1 class="text-white text-center">Prosedur Pendaftaran Penerbit & ISBN</h1>
            </div>
        </div>
    </div>
</section>

<section class="explore-section section-padding">
    <div class="container" style="margin-top: -200px">
        <div class="row justify-content-center">
  
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card bg-white shadow-lg" style=" position: -webkit-sticky; position: sticky; top: 20px; z-index: 1000;">
                    <div class="card-body">
                        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                            <nav class="nav nav-pills flex-column">
                                @foreach($grouped_data as $k => $group)
                                <a class="nav-link" href="#item-{{ $k }}">{{ $group['header'] }}</a>
                                @endforeach
                            </nav>
                        </nav>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12">
                <div class="card bg-white shadow-lg">
                    <div class="card-body">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                            @foreach($grouped_data as $index => $group)
                                <div class="content-section" id="item-{{ $index }}">
                                    <center><h5 class="mb-3">{{ $group['header'] }}</h5></center>
                                    <div class="row my-4">
                                    <hr>
                                    @foreach($group['items'] as $item)
                                        @if(!empty($item['HREF']))
                                        <div class="col-lg-4 col-md-6 col-12" >
                                            <img src="{{ config('app.url').'/prosedur/'.$item['HREF']}}" class="topics-detail-block-image img-fluid">
                                            <br>
                                            <center><p>{{ $item['NOMOR']. ' ' }} {{ $item['TITLE'] }}</p></center>
                                        </div>
                                        @endif
                                    @endforeach 
                                    </div>
                                </div>
                            @endforeach
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
     document.addEventListener('DOMContentLoaded', () => {
        const navLinks = document.querySelectorAll('#navbar-example3 .nav-link');
        const sections = document.querySelectorAll('.content-section');

        // Function to remove active class from all nav links
        function removeActiveClass() {
            navLinks.forEach(link => link.classList.remove('active'));
        }

        // Function to add active class to the clicked nav link
        function setActiveLink(index) {
            removeActiveClass();
            navLinks[index].classList.add('active');
        }

        //buat scroll up
        const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = Array.from(sections).indexOf(entry.target);
                    setActiveLink(index);
                }
            });
        }, {
            threshold: 0.5 // Adjust this value to trigger earlier or later
        });
        // Observe each section
        sections.forEach(section => observer.observe(section));

        // Add click event listeners to each nav link (ketika di klik)
        navLinks.forEach((link, index) => {
            console.log(index, 'index foreach')
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default anchor behavior

                // Smooth scroll to the target section
                const targetId = link.getAttribute('href').substring(1); // Remove the '#'
                const targetSection = document.getElementById(targetId);

                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }

                // Update the active link
                setActiveLink(index);
            });
        });
    });
</script>