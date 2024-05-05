   {{-- relate product --}}
   @if (count($relatedProducts) > 0)
   <div class="RelateProdTitle">
       <span class="youMayAlsolike">You might also like</span>
   </div>
   <div class="MainContainerFirstPage">
       @foreach ($relatedProducts as $product)
           <div class="ContainerFirstPage">
               <a href="{{ url('product/' . $product->id) }}" class="AherfItemProduct">
                   <div class="ImageFirstPage">
                       @if (isset($product->images[0]->image) && !empty($product->images[0]->image))
                           <img src="{{ asset('front/images/products/' . $product->images[0]->image) }}"
                               alt="">
                       @else
                           <img src="https://www.designscene.net/wp-content/uploads/2023/11/Fear-of-God-Athletics-2023-14.jpg"
                               alt="">
                       @endif
                   </div>
                   <div class="TitleFirstPage">
                       <span class="NameProFirstPage">{{ $product->product_name }}</span>
                       <span class="NameProFirstPageColor">{{ $product->brand->brand_name }}</span>
                       <div class="fial_price">
                           <span class="PriceFirstPage">{{ $product->final_price }}$</span>
                           @if ($product->discount_type != '')
                               <span class="PriceFirstPageoG">{{ $product->product_price }}$</span>
                           @endif

                       </div>
                   </div>
               </a>
           </div>
       @endforeach

   </div>
@endif

{{-- customer view product --}}
@if (count($recentProducts) > 0)
   <div class="RelateProdTitle">
       <span class="youMayAlsolike">Cutomers also view products</span>
   </div>
   <div class="MainContainerFirstPage">
       @foreach ($recentProducts as $product)
           <div class="ContainerFirstPage">
               <a href="{{ url('product/' . $product->id) }}" class="AherfItemProduct">
                   <div class="ImageFirstPage">
                       @if (isset($product->images[0]->image) && !empty($product->images[0]->image))
                           <img src="{{ asset('front/images/products/' . $product->images[0]->image) }}"
                               alt="">
                       @else
                           <img src="https://www.designscene.net/wp-content/uploads/2023/11/Fear-of-God-Athletics-2023-14.jpg"
                               alt="">
                       @endif
                   </div>
                   <div class="TitleFirstPage">
                       <span class="NameProFirstPage">{{ $product->product_name }}</span>
                       <span class="NameProFirstPageColor">{{ $product->brand->brand_name }}</span>
                       <div class="fial_price">
                           <span class="PriceFirstPage">{{ $product->final_price }}$</span>
                           @if ($product->discount_type != '')
                               <span class="PriceFirstPageoG">{{ $product->product_price }}$</span>
                           @endif

                       </div>
                   </div>
               </a>
           </div>
       @endforeach

   </div>
@endif
