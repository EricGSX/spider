
	<style type="text/css">
.main-timeline{
	width: 80%;
	margin: 20px auto;
	position: relative;
}
.main-timeline:before{
	content: "";
	display: block;
	width: 2px;
	height: 100%;
	background: #337ab7;
	margin: 0 0 0 -1px;
	position: absolute;
	top: 0;
	left: 50%;
}
.main-timeline .timeline{
	width: 100%;
	margin-bottom: 20px;
	position: relative;
}
.main-timeline .timeline:after{
	content: "";
	display: block;
	clear: both;
}
.main-timeline .timeline-content{
	width: 40%;
	float: left;
	margin: 5px 0 0 0;
	border-radius: 6px;
}
.main-timeline .date{
	display: block;
	width: 70px;
	height: 70px;
	border-radius: 50%;
	background: #58b25e;
	padding: 5px 0;
	margin: 0 0 0 -36px;
	position: absolute;
	top: 0;
	left: 50%;
	font-size: 12px;
	font-weight: 900;
	text-transform: uppercase;
	color: white;
	border: 2px solid rgba(255,255,255,0.2);
	box-shadow: 0 0 0 7px #58b25e;
}
.main-timeline .date span{
	display: block;
	text-align: center;
}
.main-timeline .day,
.main-timeline .year{
	font-size: 10px;
}
.main-timeline .month{
	font-size: 18px;
}
.main-timeline .title{
	padding: 15px;
	margin: 0;
	font-size: 20px;
	color: #fff;
	text-transform: uppercase;
	letter-spacing: -1px;
	border-radius: 6px 6px 0 0;
	position: relative;
}
.main-timeline .title:after{
	content: "";
	width: 10px;
	height: 10px;
	position: absolute;
	top: 20px;
	right: -5px;
	transform: rotate(-45deg);
}
.main-timeline .description{
	padding: 15px;
	margin: 0;
	font-size: 14px;
	color: #656565;
	background: #fff;
	border-radius: 0 0 6px 6px;
}
.main-timeline .timeline:nth-child(2n+2) .timeline-content{
	float: right;
}
.main-timeline .timeline:nth-child(2n+2) .title:after{
	left: -5px;
}
.eric-1 .title,
.eric-1 .title:after{
	background: #9f84c4;
}
.eric-2 .title,
.eric-2 .title:after{
	background: #02a2dd;
}
.eric-3 .title,
.eric-13 .title:after{
	background: #58b25e;
}
.eric-4 .title,
.eric-4 .title:after{
	background: #eab715;
}
.eric-5 .title,
.eric-5 .title:after{
    background: #8cc63e;
}
@media only screen and (max-width: 990px){
	.main-timeline{ width: 100%; }
}
@media only screen and (max-width: 767px){
	.main-timeline:before,
	.main-timeline .date{
		left: 6%;
	}
	.main-timeline .timeline-content{
		width: 85%;
		float: right;
	}
	.main-timeline .title:after{
		left: -5px;
	}
}
@media only screen and (max-width: 480px){
	.main-timeline:before,
	.main-timeline .date{
		left: 12%;
	}
	.main-timeline .timeline-content{
		width: 75%;
	}
	.main-timeline .date{
		width: 60px;
		height: 60px;
		margin-left: -30px;
	}
	.main-timeline .month{
		font-size: 14px;
	}
}
	</style>
    @auth
	@if(\Auth::user()->id == 1)
		<a href="/tottles/create" class="btn btn-primary">吐槽</a>
	@endif
    @endauth
					<div class="main-timeline">
						@if($tottles)
						@foreach($tottles as $tottle)
						<div class="timeline eric-{{rand(1, 5)}}">
							<div class="timeline-content">
								<span class="date">
									<span class="day">{{$tottle->created_at->day}}<sup>th</sup></span>
									<span class="month">{{$tottle->created_at->month}}</span>
									<span class="year">{{$tottle->created_at->year}}</span>
								</span>
								<h2 class="title">{{$tottle->title}}</h2>
								<p class="description">{{$tottle->content}}</p>
							</div>
						</div>
						@endforeach
						@endif

					</div>