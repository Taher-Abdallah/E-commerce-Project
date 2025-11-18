
@extends('admin.master')
@section('title','Brands')
<body class="vertical-layout vertical-menu-modern content-left-sidebar email-application  menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
@section('content')
  <div class="app-content content">
    <div class="sidebar-left">
      <div class="sidebar">
        <div class="sidebar-content email-app-sidebar d-flex">
            {{-- contact sidebar --}}
        @livewire('admin.contact.contact-sidebar')
          {{-- contact message --}}
        @livewire('admin.contact.contact-message')
        </div>
      </div>
    </div>
  <livewire:admin.contact.replay-contact />
    {{-- contact show --}}
    @livewire('admin.contact.contact-show')
  </div>
  @endsection

@push('js')
<script>
  document.addEventListener('livewire:init', function () {
    Livewire.on('message-deleted', (event) => {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: event,
        text: 'Message Deleted Successfully',
        showConfirmButton: false,
        timer: 1500
      });
    });
    
  });
  </script>

 {{-- عشان تبعت الايفنت  --}}
  <script>
  document.addEventListener('livewire:init', function () {
    Livewire.on('contact-replayed', (event) => {
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: event,
        text: 'Message Sent Successfully',
        showConfirmButton: false,
        timer: 1500
      });
    });
    
  });
  </script>
@endpush