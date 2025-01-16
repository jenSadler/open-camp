<div class="hold-hero">
    <div class="hero-img left-comp"></div>
    <div class="hold-animations">
        <div class="hero-img banana"></div>
        <div class="hero-img maze"></div>
        <div class="hero-img ball"></div>
    </div>
    <div class="hero-img right-comp"></div>
</div>

<style>
    .hold-hero{
        background-color:var(--primary-dark);
    }
    .left-comp{
        background:
        /* top, transparent red */
        linear-gradient(
            rgba(79, 38, 132, 0.5),
            rgba(79, 38, 132, 0.5)
        ),
        /* bottom, image */
        url("<?php echo get_template_directory_uri(); ?>/assets/img/left-comp.jpg");

    }

    .right-comp{
        background:
        /* top, transparent red */ 
        linear-gradient(
            rgba(206, 151, 50, 0.5), 
            rgba(206, 151, 50, 0.5)
        ),
        /* bottom, image */
        url("<?php echo get_template_directory_uri(); ?>/assets/img/right-comp.jpg");
    }

    .banana{
        background:
        /* top, transparent red */ 
        linear-gradient(
            rgba(206, 79, 49, 0.5), 
            rgba(206, 79, 49, 0.5)
        ),
        /* bottom, image */
        url("<?php echo get_template_directory_uri(); ?>/assets/img/bananas.gif");
    }

    .maze{
        background:
        /* top, transparent red */ 
        linear-gradient(
            rgba(206, 79, 49, 0.5), 
            rgba(206, 79, 49, 0.5)
        ),
        /* bottom, image */
        url("<?php echo get_template_directory_uri(); ?>/assets/img/maze.gif");
    }

    .ball{
        background:
        /* top, transparent red */ 
        linear-gradient(
            rgba(206, 79, 49, 0.5), 
            rgba(206, 79, 49, 0.5)
        ),
        /* bottom, image */
        url("<?php echo get_template_directory_uri(); ?>/assets/img/ball.gif");
    }
/* General Styles */
.hold-hero {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    position: relative;
}

.hold-hero > div {
    flex: 1;
    position: relative; /* Ensure child absolute elements are positioned correctly */
}

/* Hero Images */
.hero-img {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    width: 100%;
    height: 100%;
    position: absolute;
}




/* Central Animations */
.hold-animations {
    position: relative;
    overflow: hidden; /* Prevent images from spilling out */
}

.maze, .banana, .ball {
    position: absolute;
    top: 0; /* Position images at the same spot */
    width: 100%;
    height: 100%;
    opacity: 0; /* Initially hidden */
    animation: fade-sequence 15s infinite; /* Cycle through images */
}

/* GIF Timing Delays */
.maze {
    animation-delay: 0s; /* Maze starts immediately */
}

.banana {
    animation-delay: 5s; /* Banana starts after Maze fades out */
}

.ball {
    animation-delay: 10s; /* Ball starts after Banana fades out */
}

/* Keyframes for Fade-In Sequence */
@keyframes fade-sequence {
    0%, 25% {
        opacity: 0; /* Hidden */
    }
    30%, 60% {
        opacity: 1; /* Fully visible */
    }
    65%, 100% {
        opacity: 0; /* Hidden again */
    }
}

@keyframes slide-in-from-bottom {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-100%);
    }
}

@keyframes slide-in-from-top {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(100%);
    }
}

@keyframes slide-in-from-left{
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(100%);
    }
}

@keyframes slide-in-from-right{
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}

@media only screen and (min-width:601px){
   /* Left and Right Columns */
.left-comp {
    bottom:-100%;
    animation: slide-in-from-bottom 2s forwards; /* Increased sliding time */
}

.right-comp {
    top:-100%;
    animation: slide-in-from-top 2s forwards; /* Increased sliding time */
    animation-delay: 1s;
} 
}
@media only screen and (max-width:600px){

    .hold-hero {
        flex-direction:column;
    }
/* Left and Right Columns */
.left-comp {
    left:-100%;
    animation: slide-in-from-left 2s forwards; /* Increased sliding time */
}

.right-comp {
    right:-100%;
    animation: slide-in-from-right 2s forwards; /* Increased sliding time */
    animation-delay: 1s;
}
}


</style>