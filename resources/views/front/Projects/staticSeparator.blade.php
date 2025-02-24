
<style>
    .editorial {
        display: block;
        width: 100%;
        height: 60px;
        max-height: 60px;
        margin: 0;
        z-index: 0;
        border-bottom: solid white 1px;
        box-sizing: border-box;
    }
/* 
    .parallax1 > use {
        animation: move-forever1 10s linear infinite;
        &:nth-child(1) {
            animation-delay: -2s;
        }
    }
    .parallax2 > use {
        animation: move-forever2 8s linear infinite;
        &:nth-child(1) {
            animation-delay: -2s;
        }
    }
    .parallax3 > use {
        animation: move-forever3 6s linear infinite;
        &:nth-child(1) {
            animation-delay: -2s;
        }
    }
    .parallax4 > use {
        animation: move-forever4 4s linear infinite;
        &:nth-child(1) {
            animation-delay: -2s;
        }
    } */
    @keyframes move-forever1 {
        0% {
            transform: translate(85px, 0%);
        }
        100% {
            transform: translate(-90px, 0%);
        }
    }
    @keyframes move-forever2 {
        0% {
            transform: translate(-90px, 0%);
        }
        100% {
            transform: translate(85px, 0%);
        }
    }
    @keyframes move-forever3 {
        0% {
            transform: translate(85px, 0%);
        }
        100% {
            transform: translate(-90px, 0%);
        }
    }
    @keyframes move-forever4 {
        0% {
            transform: translate(-90px, 0%);
        }
        100% {
            transform: translate(85px, 0%);
        }
    }
</style>
<div class="w-full bg-transparent hidden md:block">
    <svg class="editorial"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 100 28 "
        preserveAspectRatio="none">
    <defs>
    <path id="gentle-wave"
    d="M-160 44c30 0 
    58-18 88-18s
    58 18 88 18 
    58-18 88-18 
    58 18 88 18
    v44h-352z" />
    </defs>
    <g class="">
        <use class="translate-x-2/3" xlink:href="#gentle-wave" x="50" y="3" fill="#0096FF"/>
    </g>
    <g class="">
        <use class="translate-x-1/3" xlink:href="#gentle-wave" x="50" y="0" fill="#a11e22e5"/>
    </g>
    <g class="">
        <use class="translate-x-3/4" xlink:href="#gentle-wave" x="50" y="9" fill="#a11e22"/>
    </g>
    <g class="">
        <use class="translate-x-[30px]" xlink:href="#gentle-wave" x="50" y="6" fill="#fff"/>  
    </g>
    </svg>
</div>