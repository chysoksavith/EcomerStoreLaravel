@if ($rating && count($rating) > 0)
    @foreach ($rating as $feedBackRating)
        <div class="box_comment">
            <div class="name_iconUser">
                {{-- icon --}}
                <div class="iconUserProf">
                    <img src="https://imgs.search.brave.com/vwimYLUDcAbT_ZWKjz9DlBVRoovzdUlB7dl-L8ZFB78/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/ZnJlZS1waG90by91/c2VyLXByb2ZpbGUt/ZnJvbnQtc2lkZV8x/ODcyOTktMzk1OTUu/anBnP3NpemU9NjI2/JmV4dD1qcGc"
                        alt="dc">
                </div>
                {{-- verify --}}
                <div class="verifyUser">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M15.418 5.643a1.25 1.25 0 0 0-1.34-.555l-1.798.413a1.25 1.25 0 0 1-.56 0l-1.798-.413a1.25 1.25 0 0 0-1.34.555l-.98 1.564c-.1.16-.235.295-.395.396l-1.564.98a1.25 1.25 0 0 0-.555 1.338l.413 1.8a1.25 1.25 0 0 1 0 .559l-.413 1.799a1.25 1.25 0 0 0 .555 1.339l1.564.98c.16.1.295.235.396.395l.98 1.564c.282.451.82.674 1.339.555l1.798-.413a1.25 1.25 0 0 1 .56 0l1.799.413a1.25 1.25 0 0 0 1.339-.555l.98-1.564c.1-.16.235-.295.395-.395l1.565-.98a1.25 1.25 0 0 0 .554-1.34L18.5 12.28a1.25 1.25 0 0 1 0-.56l.413-1.799a1.25 1.25 0 0 0-.554-1.339l-1.565-.98a1.25 1.25 0 0 1-.395-.395zm-.503 4.127a.5.5 0 0 0-.86-.509l-2.615 4.426l-1.579-1.512a.5.5 0 1 0-.691.722l2.034 1.949a.5.5 0 0 0 .776-.107z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="textverifyUser">Verified Customer</span>
                </div>
                <div class="nameUserReview">
                    <span class="textNameReiview">
                        {{ $feedBackRating->user->name }}
                    </span>
                </div>
            </div>
            <div class="cmmtingUser">
                <?php
                $count = 0;
                while ($count < $feedBackRating->rating) {
                    echo '<div class="clip-star starCmt"></div>';
                    $count++;
                }
                ?>

                {{-- name item review --}}
                <div class="nameItemUserReview">
                    <span class="textNameiteREview">
                        {{ $feedBackRating->product->product_name }}
                    </span>
                </div>
                {{-- descroption user cmt --}}
                <div class="nameItemUserReview">
                    <p class="textDesiteREview">
                        {{ $feedBackRating->review }}
                    </p>
                </div>
                {{-- date --}}
                <div class="nameItemUserReview dateReview">
                    <span class="date">
                        {{ $feedBackRating->created_at ? $feedBackRating->created_at->diffForHumans() : 'Unknown' }}

                    </span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <span>No feedback</span>
@endif
{{ $rating->links() }}
        