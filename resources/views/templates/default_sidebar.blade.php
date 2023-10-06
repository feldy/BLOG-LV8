<div class="col-md-3">
    <!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
    <div class="c-content-ver-nav">
        <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
            <h3 class="c-font-bold c-font-uppercase"><i class="fa fa-archive"></i> Dosir</h3>
            <div class="c-line-left c-theme-bg">
            </div>
        </div>
        <ul class="c-menu c-arrow-dot1 c-theme">
            @foreach($data->list_dosir as $item)
                <li>
                    <a href="{{ url('kategori?kategori='.$item->category) }}">Dosir {{ $item->category }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="c-content-tab-1 c-theme c-margin-t-30">
        <div class="nav-justified">
            <ul class="nav nav-tabs nav-justified">
                <li class="active">
                    <a href="#blog_recent_posts" data-toggle="tab">Recent Posts</a>
                </li>
                <li>
                    <a href="#blog_popular_posts" data-toggle="tab">Popular Posts</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="blog_recent_posts">
                    <ul class="c-content-recent-posts-1">
                        @foreach($data->list_recent_post as $item)
                        <li>
                            <div class="c-post">
                                <a href="{{ url('detail?id='.$item->id) }}" class="c-title">{{ $item->judul }}</a>
                                <div class="c-date">
                                    <small><i class="fa fa-calendar"></i> {{ date_format($item->created_at, 'd/m/Y') }}</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane" id="blog_popular_posts">
                    <ul class="c-content-recent-posts-1">
                        @foreach($data->list_popular_post as $item)
                            <li>
                                <div class="c-post">
                                    <a href="{{ url('detail?id='.$item->id) }}" class="c-title">{{ $item->judul }}</a>
                                    <div class="c-date">
                                        <small><i class="fa fa-eye"></i> Viewed {{ number_format($item->viewed) }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
</div>