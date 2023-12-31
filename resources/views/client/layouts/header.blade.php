<?php
use App\Models\Category;
$categories = Category::getCategories();
$totalCartItems = totalCartItems();

?>
<header>
    <div class="header_nav" id="headerNav">
        <nav class="MenuREs">
            <ul>
                <li>
                    <span class="LogoAside" id="menuBtn">
                        <img class="logo" src="{{ asset('icons8-menu-50.png') }}" alt="">
                    </span>

                </li>
            </ul>
        </nav>
        <nav class="CollectionNav">
            <ul class="nav-links">
                <li><span class="NavHead StyleSmall">Collection</span></li>
                {{-- mega dropdown --}}
                @foreach ($categories as $category)
                    <li>
                        <div class="dropdown" data-dropdown>
                            <span class="link StyleSmall" data-dropdown-button>{{ $category->category_name }}</span>
                            <div class="dropdown-memu infomation-grid">
                                @if (count($category->subCategories))
                                    <div class="subcategory">
                                        @foreach ($category->subCategories as $subcategory)
                                            <div class="dropdown-heading">
                                                <a href="{{ url($subcategory->url) }}">
                                                    {{ $subcategory->category_name }}
                                                </a>
                                            </div>
                                            @if (count($subcategory->subCategories))
                                                <div class="dropdown-links">
                                                    @foreach ($subcategory->subCategories as $subsubcategory)
                                                        <a href="{{ url($subsubcategory->url) }}">
                                                            {{ $subsubcategory->category_name }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </nav>
        <a class="LogoHeader" href="{{ route('HomePage') }}">
            <img src="{{ asset('pngwing.com.png') }}" alt="">
        </a>

        <nav class="NavREs">
            <ul>
                {{-- search --}}
                <li class="NavLiRes"><a href="" class="Ico"><i
                            class="fa-solid fa-magnifying-glass icoHead"></i>
                    </a>
                </li>

                {{-- wishList --}}
                <li class="NavLiRes">
                    <a href="" class="Ico"><i class="fa-regular   fa-heart  icoHead"></i>
                        <span class="bagg">
                            <p>1</p>
                        </span>
                    </a>
                </li>
                {{-- cart --}}
                <li class="NavLiRes">
                    <span class="Ico" id="bagIcon"><i class="fa-solid fa-bag-shopping icoHead dropbtnminiCart"
                            onclick="myFunction()"></i>
                        <span class="bagg totalCartItems">
                            <p>{{ $totalCartItems }}</p>
                        </span>
                    </span>
                    <div class="mini-cart dropdownminiCart" id="appendHeaderCartItems">
                        @include('client.layouts.Header_smallCart')
                    </div>
                </li>
                {{-- user --}}
                <li class="NavLiRes">
                    <i class="fa-regular fa-user icoHead dropbtnAccount" onclick="FunctionLoginUser()"> </i>
                    <div class="dropdownAccount">
                        <div class="dropdown-contentAccount" id="myDropdownAccount">
                            {{-- if auth login it show account and signout if not it show signup and signin --}}
                            <div class="contentUserAccount">
                                <ul>
                                    @if (Auth::check())
                                        <li>
                                            <a href="{{ url('user/account') }}">
                                                account
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('user/logout') }}">
                                                sign out
                                            </a>
                                        </li>
                                    @else
                                    <li>
                                        <a href="{{ url('user/register') }}">
                                            Sign up
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/login') }}">
                                            Sign in
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
    {{-- side bar add to cart --}}

    {{-- aside menu --}}
    @include('client.layouts.aside')
</header>
@section('scripts')
@endsection
