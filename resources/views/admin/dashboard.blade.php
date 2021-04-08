@extends('layouts.app2')
@section('title', 'Dashboard | Admin')
@section('judul', 'Dashboard')
@section('content')
<section class="section">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Dashboard</h4>
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-md-6">
                <img src="{{url('hello.svg')}}" width="100%">
              </div>
              <div class="col-md-6">
                  <h3>TeenaBimbel</h3>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, laborum saepe! Eaque quis eius soluta quae adipisci non tempora consectetur.</p>
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate numquam modi aspernatur, amet pariatur vero.</p>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection