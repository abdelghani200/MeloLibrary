<style>
    body {
        margin: 0;
        padding: 0;
    }

    #myVideo {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        object-fit: cover;
        z-index: -2;
    }

    #videoDarkOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.65);
        z-index: -1;
    }

    #centerCallToAction {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
    }

    #centerCallToAction h1 {
        font-size: 3em;
        margin-bottom: 1em;
    }

    #centerCallToAction p {
        font-size: 1.5em;
        margin-bottom: 2em;
    }

    #centerCallToAction a {
        display: inline-block;
        padding: 1em 2em;
        font-size: 1.5em;
        background-color: #fff;
        color: #333;
        text-decoration: none;
        border-radius: 3em;
        transition: all 0.3s ease;
    }

    #centerCallToAction a:hover {
        background-color: transparent;
        color: white;
        border: 2px solid white;
    }
</style>

<div>
    <video autoplay muted loop id="myVideo">
        <source src="{{ asset('Concert.mp4') }}" type="video/mp4">
    </video>
    <div id="videoDarkOverlay"></div>
    <div id="centerCallToAction">
        <h1>Music Social Network</h1>
        <p>Login or Register now and join other like-minded people from all around the world who want to share their music! Let the music be your guide...</p>
        <div>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</div>
