<div class="components-share mb-4">
  <h5 class="mb-1 bold text-uppercase">Share This Property</h5>
  <ul class="list-inline mb-0">
    {{-- <li class="list-inline-item">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&amp;src=sdkpreparse" target="_blank" rel="nofollow,noindex">
        <i class="fab fa-3x fa-facebook-square text-facebook" aria-hidden></i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ $property->name }}&amp;url={{ request()->fullUrl() }}&amp;hashtags={{ $property->keywords }}&amp;in-reply-to={{ config('custom.twitter_reply_to') }}" target="_blank" rel="nofollow,noindex">
        <i class="fab fa-3x fa-twitter-square text-twitter" aria-hidden></i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ request()->fullUrl() }}&amp;title={{ $property->name }}&amp;summary={{ strip_tags($property->description) }}&amp;source={{ config('custom.linkedin_source') }}" target="_blank" rel="nofollow,noindex">
        <i class="fab fa-3x fa-linkedin text-linkedin" aria-hidden></i>
      </a>
    </li> --}}
    <li class="list-inline-item">
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_inline_share_toolbox"></div>
    </li>
  </ul>
</div><!-- /.components-share -->
