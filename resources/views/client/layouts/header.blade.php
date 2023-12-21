<?php
use App\Models\Category;
$categories = Category::getCategories();
// $categoryId = 15; // Replace with the specific category ID you want to retrieve

// $categories = Category::getCategories()->where('id', $categoryId);

// foreach ($categories as $category) {
//     echo "Category ID: " . $category->id . "<br>";
//     echo "Category Name: " . $category->name . "<br>";
//     // Add more fields as needed

//     echo "<hr>";
// }

// // If you want to convert the filtered categories to an array
// $filteredCategoriesArray = $categories->toArray();
// echo "<pre>"; print_r($filteredCategoriesArray); die;
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
                                                <a href="{{ url($subcategory->url) }}">{{ $subcategory->category_name }}</a>
                                            </div>
                                            @if (count($subcategory->subCategories))
                                                <div class="dropdown-links">
                                                    @foreach ($subcategory->subCategories as $subsubcategory)
                                                    <a href="{{ url($subcategory->url) }}">{{ $subsubcategory->category_name }}</a>
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
                <li class="NavLiRes"><a href="" class="Ico"><i
                            class="fa-solid fa-magnifying-glass icoHead"></i></a></li>
                <li class="NavLiRes"><a href="" class="Ico"><i class="fa-regular fa-user icoHead"> </i></a>
                </li>
                <li class="NavLiRes"><a href="" class="Ico"><i class="fa-solid fa-bag-shopping icoHead"></i>
                        <span class="bagg">
                            <p>1</p>
                        </span> </a></li>
            </ul>
        </nav>
    </div>
    @include('client.layouts.aside')
</header>
@section('scripts')
@endsection