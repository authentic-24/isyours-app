<div class="column col-lg-12 col-md-12 col-sm-12">
    @if($errors->any())
        <div class="message-box error">
        <p>{{$errors->first()}}</p>
        <button class="close-btn"><span class="close_icon"></span></button>
    </div>
    @endif
    @if(session('message'))
        <div class="message-box success">
        <p>{{ session('message') }}</p>
        <button class="close-btn"><span class="close_icon"></span></button>
    </div>
    @endif
    <!-- <div class="message-box info">
        <p>Info: User pending action</p>
        <button class="close-btn"><span class="close_icon"></span></button>
    </div>

    <div class="message-box warning">
        <p>Warning: User has to be admin</p>
        <button class="close-btn"><span class="close_icon"></span></button>
    </div>

    <div class="message-box error">
        <p>Error: Internal Server Error</p>
        <button class="close-btn"><span class="close_icon"></span></button>
    </div>

    <div class="message-box success">
        <p>Success: Updated members status</p>
        <button class="close-btn"><span class="close_icon"></span></button>
    </div> -->
</div>