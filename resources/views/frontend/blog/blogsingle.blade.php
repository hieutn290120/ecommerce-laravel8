@extends('frontend.layouts.app')
@section('content')
<div class="col-sm-9">
    <div class="blog-post-area">
        @csrf
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">
            @foreach($blogSingle as $value)
            <h3>{{$value->title}}</h3>
            <div class="post-meta" id="{{$value->id}}">
                <ul>
                    <li><i class="fa fa-user"></i> Mac Doe</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
                <div class="rate">
                    <div class="vote">
                        <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                        <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                        <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                        <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                        <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                        <span class="rate-np"><?php echo $roundRating ?></span>
                    </div>
                </div>
            </div>
            <a href="">
                <img src="{{ asset('upload/image_blog') }}/{{$value->image}}" alt="">
            </a>
            <p>{{$value->description}}</p>
            @endforeach
        </div>
    </div>
    <!--/blog-post-area-->
    <a href="{{ URL::to( 'blog-details/' . $previous ) }}">Previous</a>
    <a href="{{ URL::to( 'blog-details/' . $next ) }}">Next</a>

    <div class="rating-area" id="{{$value->id}}">
        <ul class="ratings">
            <li class="rate-this">Rate this item:</li>
            <div class="rate">
                <div class="vote">
                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                    <span class="rate-np"></span>
                </div>
            </div>
            <li class="color">(6 votes)</li>
        </ul>
        <ul class="tag">
            <li>TAG:</li>
            <li><a class="color" href="">Pink <span>/</span></a></li>
            <li><a class="color" href="">T-Shirt <span>/</span></a></li>
            <li><a class="color" href="">Girls</a></li>
        </ul>
    </div>
    <div class="socials-share">
        <a href=""><img src="images/blog/socials.png" alt=""></a>
    </div>
    <!--/socials-share-->

    <div class="media commnets">
        <a class="pull-left" href="#">
            <img class="media-object" src="images/blog/man-one.jpg" alt="">
        </a>
        <div class="media-body">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div class="blog-socials">
                <ul>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <a class="btn btn-primary" href="">Other Posts</a>
            </div>
        </div>
    </div>
    <!--Comments-->
    <div class="response-area">
        <h2>3 RESPONSES</h2>
        <ul class="media-list">
            @foreach($comment as $value)
            @if($value->level==0)
                <li class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('upload/image_register')}}/{{$value->avatar}}" style="width:100px" alt="">
                    </a>
                    <div class="media-body">
                        <ul class="sinlge-post-meta">
                            <li><i class="fa fa-clock-o"></i>{{$value->created_at}}</li>
                        </ul>
                        <h4 class="media-heading">{{$value->name}}</h4>
                        <p>{{$value->cmt}}</p>
                        <input name="id_user" class="level_id" hidden>
                        <a id="{{$value->id}}" class="btn btn-primary reply" href="#cmt"><i class="fa fa-reply"></i>Replay</a>
                    </div>
                </li>
            @endif
            @foreach($comment as $comment_child)
                @if($comment_child->level == $value->id)
                    <li class="media second-media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{asset('upload/image_register')}}/{{$comment_child->avatar}}" style="width:100px" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-clock-o"></i>{{$comment_child->created_at}}</li>
                            </ul>
                            <h4 class="media-heading">{{$comment_child->name}}</h4>
                            <p>{{$comment_child->cmt}}</p>
                            <input name="id_user" class="level_id" hidden>
                            <a id="{{$value->id_user}}" class="btn btn-primary reply" href="#cmt"><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li>
                @endif
            @endforeach
        @endforeach
        </ul>

    </div>
    <!--/Response-area-->
    <div class="replay-box">
        <div class="row">
            <form action="{{url('blog-cmt')}}" method="post" id="cmt">
                @csrf
                @foreach($blogSingle as $value)
                <div class="col-sm-8">
                    <div class="text-area">
                        <div class="blank-arrow">
                            <label>Your Name</label>
                        </div>
                        <span>*</span>
                        <input type="hidden" name="level" class="level_default" value="0">
                        <input type="hidden" name="id_blog" class="level" value="{{$value->id}}">
                        <textarea name="message" class="comment" rows="11" id="cmt"></textarea></br><br>
                        <button type="submit" name="submit" class="btn btn-danger">Post Comment</button>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
    <!--/Repaly Box-->
</div>
<script>
    $(document).ready(function() {

        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                var hover = $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote'); 
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

        $('.ratings_stars').click(function() {
            var values = $(this).find("input").val();
            var id_blog = $(this).closest('div.single-blog-post').find('div.post-meta').attr('id');
            if ($(this).hasClass('ratings_over')) {
                $('.ratings_stars').removeClass('ratings_over');
                $(this).prevAll().andSelf().addClass('ratings_over');
            } else {
                $(this).prevAll().andSelf().addClass('ratings_over');
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('rating')}}",
                method: 'post',
                data: {
                    values: values,
                    id_blog: id_blog
                },
                success: function(data) {
                    if (data == 'Done') {
                        alert('Bạn đã đánh giá' + values + 'sao');
                    } else {
                        alert('Vui lòng đăng nhập để đánh giá');
                    }
                }
            })
        });
    });
</script>
<script>
    	$(document).ready(function(){
			$('form#cmt').submit(function(){
				const checklogin = "{{Auth::check()}}";
				const comment = $('textarea.comment').val();
				const id_blog = $('col-sm-8').attr('id');
				if(checklogin){
					if(cmt){
						return true;
					}else{
						alert('Vui lòng nhập bình luận ');
					}
				}else{
					alert('Vui lòng đăng nhập để bình luận!');
				}
			})
			$('a.reply').click(function(){
				var level_cmtchildren = $(this).attr('id');
				$('input.level_default').val(level_cmtchildren);
			})
        });
    </script>
@endsection