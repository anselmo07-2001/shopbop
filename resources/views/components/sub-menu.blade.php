

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand d-lg-none" href="index.html">Menu</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-start" id="mainNav">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-white" href="{{ route('home') }}">Home</a></li>
                
                @foreach ($subMenu as $topCategory)
                    <li class="nav-item dropdown position-static d-flex align-items-center">
                        <!-- Top category link -->
                        <a class="nav-link text-white pe-2"
                            href="{{ route('category.index', ['top_category', $topCategory->id, $topCategory->name ]) }}">
                                {{ $topCategory->name }}
                        </a>

                        <!-- Dropdown toggle -->
                        <a class="nav-link dropdown-toggle text-white ps-0" href="#" role="button" data-bs-toggle="dropdown"></a>

                        @if ($topCategory->midCategories->count())
                            <div class="dropdown-menu mt-0 p-4 border-0 rounded-0 shadow">
                                <div class="container">
                                    <div class="row">                  
                                        @foreach ($topCategory->midCategories as $midCategories)
                                            <div class="col-md-3">
                                                <a href="{{ route('category.index', ['mid_category', $midCategories->id, $midCategories->name ]) }}" 
                                                class="fw-bold border-bottom pb-1 d-block h6 text-dark text-decoration-none">
                                                    <h6>{{ $midCategories->name }}</h6>
                                                </a>
                                                @foreach ($midCategories->endCategories as $endCategories)
                                                    <a class="dropdown-item" 
                                                    href="{{ route('category.index', ['end_category', $endCategories->id, $endCategories->name ]) }}">
                                                        {{ $endCategories->name }}
                                                    </a>           
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach

                <li class="nav-item"><a class="nav-link text-white" href="{{ route('aboutUs') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('contactUs') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
