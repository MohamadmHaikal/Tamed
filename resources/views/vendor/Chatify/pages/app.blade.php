@include('Chatify::layouts.headLinks')
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView" style="bottom: 150px">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <div class="own-details">
                    <img
                        src="{{ asset('/storage/' . config('chatify.user_avatar.folder') . '/' . get_current_user_data()->avatar) }}" />
                    <h3> {{ get_current_user_data()->name }}</h3>
                    <p> {{ get_current_user_data()->email }}</p>

                    <div class="dropdown chat-own-setting mt-1">

                        <nav class="m-header-right">
                            <a href="#"><i class="fa fa-cog fa-spin settings-btn font-20" style="color: gray;"></i></a>

                        </nav>

                    </div>
                </div> {{-- header buttons --}}

            </nav>

            {{-- Tabs --}}

        </div>

        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
            {{-- Lists [Users/Group] --}}
            {{-- ---------------- [ User Tab ] ---------------- --}}
            <div class="@if ($type == 'user') show @endif messenger-tab users-tab app-scroll"
                data-view="users">

                {{-- Favorites --}}
                <div class="favorites-section">
                    <p class="messenger-title">Favorites</p>
                    <div class="messenger-favorites app-scroll-thin"></div>
                </div>

                {{-- Saved Messages --}}
                {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                {{-- Search input --}}
                <div class="search">
                    <i class="las la-search toggle-search"></i>
                    <input type="text" class="form-control messenger-search" placeholder="{{ __('Search') }}"
                        style="border-radius: 25px" />
                </div>

                {{-- Contact --}}
                <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

            </div>

            {{-- ---------------- [ Group Tab ] ---------------- --}}
            <div class="@if ($type == 'group') show @endif messenger-tab groups-tab app-scroll"
                data-view="groups">
                {{-- items --}}
                <p style="text-align: center;color:grey;margin-top:30px">
                    <a target="_blank" style="color:{{ $messengerColor }};"
                        href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                </p>
            </div>

            {{-- ---------------- [ Search Tab ] ---------------- --}}
            <div class="messenger-tab search-tab app-scroll" app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav>
                {{-- header back button, avatar and user name --}}
                <div style="display: inline-flex;">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar"
                        style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="/"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll" style="background-image: url(assets/img/chat-bg.png);">
            <div class="messages">
                <p class="" style="    position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fff;
                color: #2f44b2;
                padding: 0.5rem 1rem;
                font-weight: 500;
                border-radius: 5px;
                font-size: 13px;"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
