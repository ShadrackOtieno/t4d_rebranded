@extends('front.Projects.master')

@section('title', 'Home')
@section('position', 'fixed')
@section('opacity', 'bg-opacity-0')
@section('display', 'hidden')
@section('textColor', 'text-white')

@section('css')

<style>
  .error {
    background-color: rgb(51, 51, 51);
    width: 100vw;
    height: 100vh;
    color: white;
    font-family: 'Poppins', sans-serif;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
    box-sizing: border-box;
  }
  
  .error-content {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 20px;
  }
  
  .error-num {
    font-size: 8em;
    font-weight: bold;
    margin-right: 20px;
  }
  
  .eye {
    background: #fff;
    border-radius: 50%;
    display: inline-block;
    height: 100px;
    position: relative;
    width: 100px;
    margin: 10px;
  }
  
  .eye::after {
    background: #333333;
    border-radius: 50%;
    bottom: 56.1px;
    content: '';
    height: 33px;
    position: absolute;
    right: 33px;
    width: 33px;
  }
  
  .sub-text {
    margin-bottom: 2em;
    font-size: 1.2em;
    padding: 0 20px;
  }
  
  .btn {
    padding: 10px 20px;
    font-size: 1em;
    margin-bottom: 2em;
  }
  
  @media (max-width: 768px) {
    .error-num {
      font-size: 5em;
      margin-right: 10px;
    }
    .eye {
      height: 70px;
      width: 70px;
    }
    .eye::after {
      height: 20px;
      width: 20px;
      bottom: calc(50% - 10px); /* Center the black part */
      right: calc(50% - 10px);  /* Center the black part */
    }
    .sub-text {
      font-size: 1em;
    }
    .btn {
      padding: 10px 20px;
      font-size: 0.9em;
    }
  }
  
  @media (max-width: 480px) {
    .error-content {
      flex-direction: column;
    }
    .error-num {
      font-size: 3em;
      margin-right: 0;
    }
    .eye {
      height: 50px;
      width: 50px;
    }
    .eye::after {
      height: 15px;
      width: 15px;
      bottom: calc(50% - 7.5px); /* Center the black part */
      right: calc(50% - 7.5px);  /* Center the black part */
    }
    .sub-text {
      font-size: 0.9em;
    }
    .btn {
      padding: 8px 15px;
      font-size: 0.8em;
    }
  }
  </style>

@endsection

@section('content')

<div class="error">
  <div class="error-content">
    <span class='error-num'>5</span>
    <div class='eye'></div>
    <div class='eye'></div>
  </div>
  <p class='sub-text'>Oh eyeballs! Something went wrong. We're <i><strong>looking</strong></i> to see what happened.</p>
  <button class="ires-pri-btn px-8 py-1" onclick="history.back()">Go Back</button>
</div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.error').mousemove(function(event) {
      var e = $('.eye');
      var x = (e.offset().left) + (e.width() / 2);
      var y = (e.offset().top) + (e.height() / 2);
      var rad = Math.atan2(event.pageX - x, event.pageY - y);
      var rot = (rad * (180 / Math.PI) * -1) + 180;
      e.css({
        '-webkit-transform': 'rotate(' + rot + 'deg)',
        'transform': 'rotate(' + rot + 'deg)'
      });
    });
  });
</script>

<script src="{{ asset('front/Projects/js/header_scroll.js')}}"></script>

@endpush