<style>
@import compass;

/* -------------------------------------
 * Set to false if you are not using Chrome
 * ------------------------------------- */
$chrome: true;

/* -------------------------------------
 * Styles
 * ------------------------------------- */

// Colours
$bg: #3f9cca;
$white: #eee9dc;
$red: #f98262;

/* @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro) */

body{
  max-width: 1200px;
  margin: 50px auto 0;
  padding: 0 5%;
  font: 16px/1.5 'Poppins', sans-serif;
  color: $white;
  background: $bg;
}
h2, #note {
  margin: 0;
}
#timeline{
  margin-top: 480px;
  padding: 0;
  border-top: 8px solid $white;
  list-style: none;
}
  @if $chrome{
    display: flex;
}
  li{
    padding-top: 30px;
    position: relative;
}
    @if $chrome {
      flex: 1;
      transition: all 0.4s ease-in-out;
    }
    @else{
      width: 20%;
      float: left;
    }
    &:hover{
      padding-bottom: 80px; //for hover effects
    }
      @if $chrome{
        flex: 2;
    }
      label{
        opacity: 1;
        transform: translateY(10px);
    }
label{
  @if $chrome{
    max-width: 200px;
}
  @else{
    width: 80%;
}
  margin: 0 auto;
  padding: 5px 10px;
  border-width: 2px;
  border-style: solid;
  border-color: $white;
  border-radius: 5px;
  position: absolute;
  left: 0;
  right: 0;
  cursor: pointer;
  opacity: 0;
  transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out;
}
  &:before, &:after {
    content: "";
    width: 0;
    height: 0;
    border: solid transparent;
    position: absolute;
    bottom: 100%;
    pointer-events: none;
}
  &:before{
    border-bottom-color: $white;
    border-width: 15px;
    left: 52%;
    margin-left: -15px;
}
  &:after {
    border-bottom-color: $bg;
    border-width: 12px;
    left: 52%;
    margin-left: -12px;
}
  span{
    text-align: center;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    display: block;
}

.date {
  width: 100%;
  padding-bottom: 30px; //for hover effects
  text-align: center;
  position: absolute;
  top: -60px;
  display: block;
}
.circle{
  width: 10px;
  height: 10px;
  margin-left: -5px;
  background: $bg;
  border: 5px solid $white;
  border-radius: 50%;
  position: absolute;
  top: -14px;
  left: 50%;
}

.content {
  width: 800px;
  height: 240px;
  margin: 0 auto;
  border: 2px solid $white;
  border-radius: 8px;
  position: fixed;
  top: 200px;
  left: 0;
  right: 0;
  z-index: 100;
  background: $bg;
  transform: perspective(1000px) rotateY(20deg);
  animation: switching_back 0.8s;
}
  h3, p{
    margin: 0 20px 10px;
    text-align: justify;
    opacity: 0;
}
  h3{
    margin-top: 20px;
}
.radio{
  display: none;
}
.radio:checked
  & + label {
    opacity: 1;
    transform: translateY(10px);
    transition: opacity 0.4s ease-in-out 0.25s, transform 0.3s ease-in-out 0.25s;
  & ~ .circle{
    background: $red;
}
  & ~ .content{
    z-index: 999;
    transform: perspective(1000px) rotateY(15deg) translate(40px,25px);
    animation: switching 1s ease;
}
    h3, p{
      opacity: 1;
      transition: opacity 0.4s ease-in-out 0.4s;
    }

@keyframes switching
  0%
    transform: perspective(1000px) rotateY(20deg)
  40%
    transform: perspective(1000px) rotateY(15deg) translate(100px,35px)
  100%
    transform: perspective(1000px) rotateY(15deg) translate(40px,25px)


@keyframes switching_back
  0%;
    transform: perspective(1000px) rotateY(15deg) translate(40px,25px)
    z-index: 200;
  40%;
    transform: perspective(1000px) rotateY(15deg) translate(0px,0px) scale(1.08)
  100%;
    transform: perspective(1000px) rotateY(20deg)
    z-index: 100;
</style>

<h2>CSS3 Horizontal Timeline</h2>
<p id="note">Since the flex property only works in Chrome, if your are using other browers please set the $chrome variable to false. <br/> It seems there is a CSS3 transform bug in Safari.</p>
<ul id='timeline'>
  <li class='entry'>
    <input checked='checked' class='radio' id='trigger5' name='trigger' type='radio'>
    <label for='trigger5'>
      <span>
        Lorem ipsum dolor sit amet
      </span>
    </label>
    <span class='date'>16 May 2013</span>
    <span class='circle'></span>
    <div class='content'>
      <h3>Lorem ipsum dolor sit amet (16 May 2013)</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui non ipsam ullam tempore reprehenderit illum temporibus! qui est optio rerum.
      </p>
    </div>
  </li>
  <li class='entry'>
    <input class='radio' id='trigger4' name='trigger' type='radio'>
    <label for='trigger4'>
      <span>
        Lorem ipsum dolor sit amet
      </span>
    </label>
    <span class='date'>15 May 2013</span>
    <span class='circle'></span>
    <div class='content'>
      <h3>Lorem ipsum dolor sit amet (15 May 2013)</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
      </p>
    </div>
  </li>
  <li class='entry'>
    <input class='radio' id='trigger3' name='trigger' type='radio'>
    <label for='trigger3'>
      <span>
        Lorem ipsum dolor sit amet
      </span>
    </label>
    <span class='date'>14 May 2013</span>
    <span class='circle'></span>
    <div class='content'>
      <h3>Lorem ipsum dolor sit amet (14 May 2013)</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt!
      </p>
    </div>
  </li>
  <li class='entry'>
    <input class='radio' id='trigger2' name='trigger' type='radio'>
    <label for='trigger2'>
      <span>
        Lorem ipsum dolor sit amet
      </span>
    </label>
    <span class='date'>13 May 2013</span>
    <span class='circle'></span>
    <div class='content'>
      <h3>Lorem ipsum dolor sit amet (13 May 2013)</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt!
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
      </p>
    </div>
  </li>
  <li class='entry'>
    <input class='radio' id='trigger1' name='trigger' type='radio'>
    <label for='trigger1'>
      <span>
        Lorem ipsum dolor sit amet
      </span>
    </label>
    <span class='date'>12 May 2013</span>
    <span class='circle'></span>
    <div class='content'>
      <h3>Lorem ipsum dolor sit amet (12 May 2013)</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt!
      </p>
    </div>
  </li>
</ul>

{{-- <script>
    var viewportWidth, divWidth, tb;
	$(function() {
		
		viewport = $('#container').innerWidth();
		tb = $('#thumbs');
		divWidth = tb.outerWidth();
    
		$('#container').mousemove(function(e)
		{
      tb.css({left: ((viewport - divWidth)*((e.pageX / viewport).toFixed(3))).toFixed(1) +"px" });
 		});
    
    $('.history-block').on('click', function(){
      $('.history-block').css('width', '300px');
      $('.history-block').find('.title').css('width', '260px');
       $('.history-block .timeline').hide(300);
        $(this).css('width', '600px');
        $(this).find('.title').css('width', '500px');
       $(this).find('.timeline').show(800);
      $('#container').mousemove(function(e)
        {
          tb.css({left: ((viewport - divWidth-300)*((e.pageX / viewport).toFixed(3))).toFixed(1) + 300 + "px" });
          });
    });
    
    $('.timeline ul li').on('click', function(){
        $(this).parent().blink();
    });
});
</script> --}}