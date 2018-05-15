<div>
    @if($profile->social)
        @foreach($profile->social as $sociable)
        
        <div>
                @if($sociable->network == 'facebook')
                <a href="{{ $sociable->url }}">
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-facebook"></i>
                        </button>
                </a>
                @endif
                @if($sociable->network == 'twitter')
                <a href="{{ $sociable->url }}">
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-twitter"></i>
                        </button>
                </a>
                @endif
                @if($sociable->network == 'googleplus')
                <a href="{{ $sociable->url }}">
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-google-plus"></i>
                        </button>
                </a>
                @endif
                @if($sociable->network == 'linkedin')
                
                <a href="{{ $sociable->url }}">
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-linkedin"></i>
                    </button>
                </a>
                @endif
                @if($sociable->network == 'instagram')
                    <a href="{{ $sociable->url }}">
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-instagram"></i>
                        </button>
                    </a>
                @endif
                @if($sociable->network == 'flickr')
                    <a href="{{ $sociable->url }}">
                        <button class="btn btn-sm btn-success"></button><i class="fa fa-flickr"></i></button>
                    </a>
                @endif
            </div>
        @endforeach
    @endif
</div>