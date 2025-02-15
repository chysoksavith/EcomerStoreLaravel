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
                <li>
                    <span class="NavHead StyleSmall">
                        <a href="{{ url('/') }}" style="text-decoration: none; color: black;">
                            Home
                        </a>
                    </span>
                </li>

                {{-- mega dropdown --}}
                @foreach ($categories as $category)
                    <li class="headerLi">
                        <div class="dropdown" data-dropdown>
                            <span class="link StyleSmall MainCategory capitalize" data-dropdown-button>
                                {{ $category->category_name }}
                            </span>
                            <div class="dropdown-memu">
                                @if (count($category->subCategories))
                                    <div class="mainsubcategory">
                                        @foreach ($category->subCategories as $subcategory)
                                            <div class="subcategory">
                                                <div class="dropdown-heading">
                                                    <a href="{{ url($subcategory->url) }}" class="subtxt capitalize">
                                                        {{ $subcategory->category_name }}
                                                    </a>
                                                </div>
                                                @if (count($subcategory->subCategories))
                                                    <div class="dropdown-links">
                                                        @foreach ($subcategory->subCategories as $subsubcategory)
                                                            <a href="{{ url($subsubcategory->url) }}"
                                                                class="subsubtxt capitalize">
                                                                {{ $subsubcategory->category_name }}
                                                            </a>
                                                           
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
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
            <img src="{{ asset('logoopng.png') }}" alt="">
        </a>
        <nav class="NavREs">
            <ul>
                {{-- search --}}
                <li class="row_1">
                    <form action="{{ url('search-product') }}" method="get" autocomplete="off">
                        @csrf
                        <div class="dropdown" data-dropdown>
                            <span class="fa-solid fa-magnifying-glass icoHead link " id="onClickBg"
                                data-dropdown-button></span>
                            <div class="dropdown-memu">
                                <div class="divSearchdiv">
                                    <input type="search" class="searchHeader" id="searchHeader" name="query"
                                        placeholder="Search for products" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');">
                                    <button type="submit" class="btnSearch">
                                        <i class="fa-solid fa-magnifying-glass icoHead "></i>
                                    </button>
                                </div>
                                <div class="content_search card__live">
                                    {{-- conttent search --}}
                                </div>
                            </div>

                        </div>
                    </form>
                </li>
                {{-- wishList --}}
                <li class="row_2">
                    <a href="{{ url('/wishlist') }}" class="Ico icon_dn"><i
                            class="fa-regular   fa-heart  icoHead "></i>

                    </a>
                </li>
                {{-- cart --}}
                <li class="row_4">
                    <span class="Ico sideBarCart" id="bagIcon"><i
                            class="fa-solid fa-bag-shopping icoHead dropbtnminiCart"></i>
                        <span class="bagg totalCartItems">
                            <p>{{ $totalCartItems }}</p>
                        </span>
                    </span>

                    <div class="mini-cart" id="appendHeaderCartItems">
                        @include('client.layouts.Header_smallCart')
                    </div>
                    {{-- <div class="mini-cart dropdownminiCart" id="appendHeaderCartItems">
                        @include('client.layouts.Header_smallCart')
                    </div> --}}
                </li>
                {{-- user account --}}
                <li class="row_3">
                    <i class="fa-regular fa-user icoHead dropbtnAccount icon_dn" id="myDropdownAccount"> </i>

                    {{-- if auth login it show account and signout if not it show signup and signin --}}
                    @include('client.layouts.sidebar_account')

                </li>

            </ul>
        </nav>
    </div>

    @include('client.layouts.aside')
</header>
