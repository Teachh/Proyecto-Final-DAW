@extends('layouts.logged')
<style>
 @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
body {
  font-family: "Open Sans", sans-serif;
  background: #eeeeee;
}

.container {
  margin: 0 auto;
  margin-top: 50px;
  width: 980px;
}

header {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  font-size: 1em;
  font-weight: 600;
  color: #bdbdbd;
  padding: 20px;
  box-sizing: border-box;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  text-align: center;
}
header .button-col {
  width: 240px;
  text-align: left;
}
header .status-col {
  width: 145px;
}
header .progress-col {
  width: 190px;
}
header .dates-col {
  width: 150px;
}
header .priority-col {
  width: 170px;
}
header .icon-col {
  width: 30px;
  text-align: right;
}
header button {
  color: #bdbdbd;
  outline: none;
  border: none;
  background: #d5d5d5;
  padding: 10px 20px;
  border-radius: 2.5px;
  margin-right: 20px;
  font-size: 1em;
  font-weight: 600;
}
header button:hover {
  cursor: pointer;
  background: #3d3d44;
}
header label {
  display: inline-block;
  margin: 0 20px;
  text-align: center;
}
header .icon-col {
  padding-right: 20px;
}

ul.name-items li.item {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  margin: 20px 0;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.1);
}
ul.name-items li.item.type1 .name .icon {
  background: #9575cd;
}
ul.name-items li.item.type2 .name .icon {
  background: #f48fb1;
}
ul.name-items li.item.type3 .name .icon {
  background: #9575cd;
}
ul.name-items li.item.type4 .name .icon {
  background: #4fc3f7;
}
ul.name-items li.item .name {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  width: 240px;
}
ul.name-items li.item .name .icon {
  background: #bdbdbd;
  width: 50px;
  height: 50px;
  border-radius: 5px;
}
ul.name-items li.item .name .name {
  background: #eeeeee;
  margin-left: 20px;
  width: 180px;
  height: 25px;
  border-radius: 15px;
}
ul.name-items li.item .status {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  font-size: 1em;
  color: #2e7d32;
  width: 145px;
  margin-left: 30px;
}
ul.name-items li.item .status .icon {
  background: #2e7d32;
  margin-right: 10px;
  width: 14px;
  height: 14px;
  border-radius: 50%;
}
ul.name-items li.item .status .icon.risk {
  background: red;
}
ul.name-items li.item .status .icon.warning {
  background: #ffa000;
}
ul.name-items li.item .status .icon.off {
  background: #bf360c;
}
ul.name-items li.item .progress {
  width: 190px;
}
ul.name-items li.item .progress progress {
  display: block;
  margin-left: 0;
  -webkit-appearance: none;
  height: 12.5px;
  width: 142.5px;
}
ul.name-items li.item .progress progress::-webkit-progress-bar {
  background-color: #eeeeee;
  border-radius: 5px;
}
ul.name-items li.item .progress ::-webkit-progress-value {
  background-color: #4dd0e1;
  border-radius: 5px;
}
ul.name-items li.item .dates {
  width: 150px;
}
ul.name-items li.item .dates .bar,
ul.name-items li.item .priority .bar {
  background: #eeeeee;
  width: 100px;
  height: 25px;
  border-radius: 15px;
}
ul.name-items li.item .priority {
  width: 144.5px;
}
ul.name-items li.item .priority .bar {
  background: #ffcdd2;
}
ul.name-items li.item .user {
  width: 30px;
}
ul.name-items li.item .user img {
  border-radius: 50%;
}


</style>
@section('content2')
<div id="colorlib-main">

    <div class="m-3">
        <a class="back" href="{{url()->previous()}}"><i class="fas fa-arrow-left"></i> Volver al perfil</a>
    </div>
    

<section class="container">

	

	<!-- List Items -->
	<ul class="name-items">
        @foreach($draws as $draw)
		
		<!-- List Item -->
		<li class="item type1 row">
			<div class="name col-12 col-md-4">
				<div class="h-100 p-2"><h3><a href="{{action('DrawController@show', $draw->id)}}">{{$draw->title}}</a></h3> </div>
			</div>

			<div class="name col-12 col-md-4">
				<div class="h-100 p-2">{{\Illuminate\Support\Str::limit($draw->description, 100, $end='...')}} </div>
			</div>

			<div class="user col-12 col-md-4">
				<a href="{{action('DrawController@show', $draw->id)}}"><img src="{{url($draw->image)}}" alt="Image 001"/></a>
			</div>
		</li>
        @endforeach           
	</ul>

</section>
@endsection
